<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceLogin;
use App\Models\Course;
use App\Models\Program;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizCourse;
use App\Models\RateAttendance;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        $quizesBefor = Quiz::orderBy("created_at", "desc")->where('type', 'befor')->withCount('courses')->paginate(10);
        $quizesAfter = Quiz::orderBy("created_at", "desc")->where('type', 'after')->withCount('courses')->paginate(10);
        $quizesInteractive = Quiz::orderBy("created_at", "desc")->where('type', 'interactive')->withCount('courses')->paginate(10);

        return view("dashboard.quiz.index", compact("quizesBefor", 'quizesAfter', 'quizesInteractive', 'programs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function question($id)
    {
        return view("dashboard.question.create", compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'course_id' => 'required|string',
        ], [
            'name.required' => ' اسم  مطلوب',
            'course_id.required' => ' الدوره  مطلوبة',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        if ($request->befor == 'true') {
            $data['type'] = 'befor';
        } elseif ($request->after == 'true') {
            $data['type'] = 'after';
        } elseif ($request->interactive == 'true') {
            $data['type'] = 'interactive';
        }
        $quiz = Quiz::create($data);
        if ($request->how_attend == 'questions') {
            return response()->json(['redirect' => route('quiz.questions', [$quiz->id])]);
        } elseif ($request->how_attend == 'link') {
            return response()->json(['redirect' => route('quizes.index')]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $questions = Question::where('quiz_id', $id)->get();
        return view('dashboard.quiz.detales', compact('questions', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $qu = Quiz::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'تم الحذف  بنجاح'], $qu ? 200 : 400);
    }

    public function report(Request $request, $id)
    {
        $attendances = Attendance::with('courses')->whereHas('courses', function ($q) use ($id) {
            $q->where('course_id', $id);
        })->get();
        $course = Course::find($id);
        $data = [];

        // Initialize an empty array to hold the pivoted data
        $pivotedData = [];

        // Loop through each attendance record
        foreach ($attendances as $attendance) {
            $attendanceRow = [
                'الاسم' => $attendance->name
            ];

            // Loop through each day of the course
            for ($day = 1; $day <= $course->duration; $day++) {
                $courseStartDate = \Carbon\Carbon::parse($course->start);

                // Determine the date range for the current day
                $startDate = $courseStartDate->copy()->addDays($day - 1)->startOfDay();
                $endDate = $courseStartDate->copy()->addDays($day)->startOfDay();
                $attendanceLogin = AttendanceLogin::where([['attendance_id', $attendance->id], ['course_id', $course->id]])->count();

                // Check if there's a login record within the date range for the current day
                $log = $attendance->attendance_logins
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->where('course_id', $course->id)
                    ->first();

                // Set the attendance status for the current day
                $attendanceRow['اليوم ' . $day] = $log ? 'حاضر' : 'لم يحضر';
            }
            if ($attendanceLogin != 0) {
                $rate = ($attendanceLogin / $course->duration) * 100;
            } else {
                $rate = 0;
            }
            if ($rate >= $course->percentage_certificate) {
                $certif  = 'نعم';
            } else {
                $certif  = 'لا';
            }

            // quiz befor perc
            $quiz = QuizCourse::where('course_id', $course->id)
                ->with('quiz')
                ->whereHas('quiz', function ($q) {
                    $q->where('type', 'befor');
                })
                ->first();
            if ($quiz) {
                $responseAnswers = UserAnswer::where('quiz_id', $quiz->quiz_id)
                    ->where('attendance_id', $attendance->id)
                    ->get();
                $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
                $questions = Question::where('quiz_id', $quiz->quiz_id)
                    ->with('userAswes', 'optionTrue')
                    ->get();
            } else {
                $responseAnswersTrue = 0;
            }

            if ($responseAnswersTrue != 0) {
                $totalBefor = ($responseAnswersTrue / $questions->count()) * 100;
            } else {
                $totalBefor = 0;
            }

            // quiz after perc
            $quiz = QuizCourse::where('course_id', $course->id)
                ->with('quiz')
                ->whereHas('quiz', function ($q) {
                    $q->where('type', 'after');
                })
                ->first();
            if ($quiz) {
                $responseAnswers = UserAnswer::where('quiz_id', $quiz->quiz_id)
                    ->where('attendance_id', $attendance->id)
                    ->get();
                $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
                $questions = Question::where('quiz_id', $quiz->quiz_id)
                    ->with('userAswes', 'optionTrue')
                    ->get();
            } else {
                $responseAnswersTrue = 0;
            }
            if ($responseAnswersTrue != 0) {
                $totalAfter = ($responseAnswersTrue / $questions->count()) * 100;
            } else {
                $totalAfter = 0;
            }

            $quizAttendInteractiveAv = RateAttendance::where('attendance_id', $attendance->id)
                ->with('rate')->avg('rate');
            $quizAttendInteractiveAvF = number_format($quizAttendInteractiveAv, 1);
            $attendanceRow['نسبه الاجتياز'] = $rate;
            $attendanceRow["الحصول على الشهاده"] = $certif;
            $attendanceRow["نسبه الاختبار القبلي"] = $totalBefor;
            $attendanceRow["نسبه الاختبار البعدي"] = $totalAfter;
            $attendanceRow["نسبه تقيم المدرب"] = $quizAttendInteractiveAvF;


            // Add the attendance record to the pivoted data array
            $pivotedData[] = $attendanceRow;
        }

        // Create a collection from the pivoted data
        $pivotedCollection = collect($pivotedData);

        // Generate and download the Excel file
        return (new \Rap2hpoutre\FastExcel\FastExcel($pivotedCollection))->download('file.xlsx');


        // Now $data contains attendance data for each day in separate rows


    }
}
