<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCourse;
use App\Models\AttendanceLogin;
use App\Models\Course;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuizCourse;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = null;
        $course = null;
        $attendanceLogin = null;
        $attendance = Attendance::orderBy('created_at', 'desc')->when($request->name_search, function ($q) use ($request) {
            $q->where('seacrh_name', 'like', '%' . $request->name . '%');
        })->paginate(10);
        return view("dashboard.attendance.index", compact("attendance", 'id', 'course', 'attendanceLogin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'phone_number' => 'required',
            // 'work_place' => 'required',
            // 'id_number' => 'required',
            // 'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }

        $attendance = Attendance::create($data);

        if ($request->course_id) {

            $qrImage = 'images' .  $attendance->id . '.svg';
            $url =  'https://giaelites.com/dashboard/admin/' . $attendance->id . '/' . $request->course_id . '/login';
            QrCode::format('svg');
            QrCode::generate($url, $qrImage);
            $attendance->qr = $qrImage;
            $attendance->update();
            $attendance->courses()->attach($request->course_id);
        }
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $attendance ? 201 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'phone_number' => 'required',
            // 'work_place' => 'required',
            // 'id_number' => 'required',
            // 'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $attendance->update($data);
        $attendanceCourse = AttendanceCourse::where('attendance_id', $attendance->id)->where('course_id', $request->course_id)->first();
        if ($request->hasFile('certficate')) {
            $adminImage = $request->file('certficate');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $attendanceCourse->certficate = '/images/' . 'program' . '/' . $imageName;
            $attendanceCourse->update();
        }
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $attendance ? 201 : 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attendance = Attendance::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'تم الحذف  بنجاح'], $attendance ? 200 : 400);
    }

    public function sendInv()
    {
    }
    public function changeStatus(Request $request)
    {
        $company = Attendance::find($request->id);
        $company->status = $request->get('unit_toggle_value');
        $isSave = $company->save();
        return response()->json(['icon' => 'success', 'title' => 'تم التعديل  بنجاح'], $isSave ? 200 : 400);
    }
    public function attendanceXlsx(Request $request, $id)
    {

        $courses = Course::with('attendances')->find($id);

        foreach ($courses->attendances as $course) {

            $data[] = [
                'الاسم' => $course->name,
                'رقم الهاتف' => $course->phone_number,
                'مكان العمل' => $course->work_place ?? '',
                'رقم الوظيفي' => $course->id_number,
                'البريد الالكتروني' => $course->email,
            ];
        }
        if (empty($data))
            return back();
        $list = collect($data);
        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('file.xlsx');
    }
    public function QuizXlsx(Request $request, $courseId, $id)
    {

        $attendance = Attendance::find($id);

        $quiz = QuizCourse::where('course_id', $courseId)->with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'befor');
        })->first();
        // $questions
        if ($quiz) {
            $quizId = $quiz->quiz_id;
            $responseAnswers = UserAnswer::where('quiz_id', $quiz->quiz_id)->where('attendance_id', $attendance->id)->get();
            $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
            $responseAnswersFalse = $responseAnswers->where('is_true', 0)->count();
            $questions = Question::where('quiz_id', $quiz->quiz_id)->with('userAswes', 'optionTrue')->get();
        } else {
            $quizId = null;
            $responseAnswers = null;
            $responseAnswersTrue = 0;
            $responseAnswersFalse = 0;
            $questions = [];
        }
        if ($responseAnswersTrue != 0) {
            $total = ($responseAnswersTrue / $questions->count()) * 100;
        } else {
            $total = 0;
        }

        foreach ($questions as $question) {
            $userAnswer = UserAnswer::where('attendance_id', $attendance->id)->where('question_id', $question->id)->where('quiz_id', $quizId)->first();
            if ($userAnswer) {
                $option = QuestionOption::find($userAnswer->question_option_id);
            }
            $data[] = [
                'الاسم' => $attendance->name,
                'الاختبار' => $quiz->quiz->name,
                ' السؤال' =>  $question->name ?? '',
                ' الاجابه الصحيحه' => $question->optionTrue->answer,
                'الاجابه المشترك' => $$option->answer ?? '',
            ];
        }

        if (empty($data))
            return back();
        $list = collect($data);
        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('file.xlsx');
    }
    public function QuizAfterXlsx(Request $request, $courseId, $id)
    {

        $attendance = Attendance::find($id);

        $quiz = QuizCourse::where('course_id', $courseId)->with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'after');
        })->first();
        // $questions
        if ($quiz) {
            $quizId = $quiz->quiz_id;
            $responseAnswers = UserAnswer::where('quiz_id', $quiz->quiz_id)->where('attendance_id', $attendance->id)->get();
            $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
            $responseAnswersFalse = $responseAnswers->where('is_true', 0)->count();
            $questions = Question::where('quiz_id', $quiz->quiz_id)->with('userAswes', 'optionTrue')->get();
        } else {
            $quizId = null;
            $responseAnswers = null;
            $responseAnswersTrue = 0;
            $responseAnswersFalse = 0;
            $questions = [];
        }
        if ($responseAnswersTrue != 0) {
            $total = ($responseAnswersTrue / $questions->count()) * 100;
        } else {
            $total = 0;
        }

        foreach ($questions as $question) {
            $userAnswer = UserAnswer::where('attendance_id', $attendance->id)->where('question_id', $question->id)->where('quiz_id', $quizId)->first();
            if ($userAnswer) {
                $option = QuestionOption::find($userAnswer->question_option_id);
            }
            $data[] = [
                'الاسم' => $attendance->name,
                'الاختبار' => $quiz->quiz->name,
                ' السؤال' =>  $question->name ?? '',
                ' الاجابه الصحيحه' => $question->optionTrue->answer,
                'الاجابه المشترك' => $$option->answer ?? '',
            ];
        }

        if (empty($data))
            return back();
        $list = collect($data);
        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('file.xlsx');
    }

    public function upload(Request $request, $id)
    {
        $file = $request->file('excel_file');
        $rows = (new FastExcel)->sheet()->import($file);
        foreach ($rows as $row) {
            $name = $row['name'];
            $phone = $row['phone_number'];
            $attendance =  Attendance::create(['name' => $name, 'phone_number' => $phone]);
            $attendance->courses()->attach($id);
        }
        return redirect()->back();
    }

    public function attendCourse(Request $request)
    {
        $course = Course::find($request->course_id);
        $start = $course->start;
        $courseStartDate = Carbon::parse($course->start);
        $courseStartDay =  $courseStartDate
            ->copy()
            ->addDays($request->day)
            ->startOfDay();
        $attendanceLogin = new AttendanceLogin();
        $attendanceLogin->attendance_id = $request->attendance_id;
        $attendanceLogin->course_id = $request->course_id;
        $attendanceLogin->created_at = $courseStartDay;
        $attendanceLogin->save();
    }
    public function deleteAttendCourse(Request $request)
    {
        $course = Course::find($request->course_id);
        $start = $course->start;
        $courseStartDate = Carbon::parse($course->start);
        $courseStartDay =  $courseStartDate
            ->copy()
            ->addDays($request->day)
            ->startOfDay();
        $attendanceLogin =   AttendanceLogin::where([['course_id',$request->course_id],['attendance_id',$request->attendance_id],['created_at',$courseStartDay]])->delete();

    }

}
