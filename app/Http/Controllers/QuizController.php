<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceLogin;
use App\Models\Course;
use App\Models\Program;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizCourse;
use App\Models\Rate;
use App\Models\RateAttendance;
use App\Models\UserAnswer;
use Carbon\Carbon;
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
        $quizes = Quiz::all();
        $rates = Quiz::orderBy("created_at", "desc")->where('type', 'rate')->withCount('courses')->paginate(10);
        return view("dashboard.quiz.index", compact("quizesBefor", 'quizesAfter', 'quizesInteractive', 'programs', 'quizes', 'rates'));
    }
    public function drepIn($id)
    {
        $quizesBefor = Quiz::orderBy("created_at", "desc")->where('type', 'befor')->withCount('courses')->get();
        $quizesAfter = Quiz::orderBy("created_at", "desc")->where('type', 'after')->withCount('courses')->get();
        $quizesInteractive = Quiz::orderBy("created_at", "desc")->where('type', 'interactive')->withCount('courses')->get();
        $quizesRate = Quiz::orderBy("created_at", "desc")->where('type', 'rate')->withCount('courses')->get();

        $course = Course::find($id);
        return view("dashboard.quiz.drepIn", compact("quizesBefor", 'quizesAfter', 'quizesInteractive', 'id', 'course','quizesRate'));
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
        } elseif ($request->rate == 'true') {
            $data['type'] = 'rate';
        }

        $quiz = Quiz::create($data);
        if ($request->rate == 'true') {
            return response()->json(['redirect' => route('get.rate', [$quiz->id])]);
        }
        if ($request->rate == 'true') {
            return response()->json(['redirect' => route('get.rate', [])]);
        }
        if ($request->rate == 'true') {
            return response()->json(['redirect' => route('get.rate', [$quiz->id])]);
        }
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
        $quiz = Quiz::find($id);
        if ($quiz->type != 'rate') {
            $questions = Question::where('quiz_id', $id)->get();
        } else {
            $questions = Rate::where('quiz_id', $id)->get();
            return view('dashboard.quiz.detales', compact('questions', 'id','quiz'));
        }
        return view('dashboard.quiz.detales', compact('questions', 'id','quiz'));
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
    public function update(Request $request,  $id)
    {
        if ($request->rate == 'true') {
            return response()->json(['redirect' => route('get.rate', [$id])]);
        }
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
        ], [
            'name.required' => ' اسم  مطلوب',
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
        $quiz =   Quiz::find($id);
        $quiz->update($data);
        if ($request->how_attend == 'questions') {
            return response()->json(['redirect' => route('quizes.index')]);
        } elseif ($request->how_attend == 'link') {
            return response()->json(['redirect' => route('quizes.index')]);
        }
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
                $rate = intval(($attendanceLogin / $course->duration) * 100);
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
                if ($totalAfter > 100) {
                    $totalAfter = $totalAfter - 100;
                } else {
                    $totalAfter;
                }
            } else {
                $totalAfter = 0;
            }

            $quizAttendInteractiveAv = RateAttendance::where('attendance_id', $attendance->id)
                ->with('rate')->avg('rate');
            $quizAttendInteractiveAvF = number_format($quizAttendInteractiveAv, 1);
            $attendanceRow['نسبه الاجتياز'] = $rate;
            $attendanceRow["الحصول على الشهاده"] = $certif;
            $attendanceRow["نسبه الاختبار القبلي"] = $totalBefor  . "٪";
            $attendanceRow["نسبه الاختبار البعدي"] = $totalAfter  . "٪";
            $attendanceRow["نسبه تقيم الحدث"] = $quizAttendInteractiveAvF;
            $attendanceRow["نسبه التحسن "] = $totalAfter == 0 ? 0 . '%' : $totalAfter -  $totalBefor . "٪";


            // Add the attendance record to the pivoted data array
            $pivotedData[] = $attendanceRow;
        }

        // Create a collection from the pivoted data
        $pivotedCollection = collect($pivotedData);

        // Generate and download the Excel file
        return (new \Rap2hpoutre\FastExcel\FastExcel($pivotedCollection))->download('file.xlsx');


        // Now $data contains attendance data for each day in separate rows


    }

    public function quizBefor(Request $request, $id)
    {
        $attendances = Attendance::with('courses')->whereHas('courses', function ($q) use ($id) {
            $q->where('course_id', $id);
        })->get();
        $course = Course::find($id);
        $quizBefor = Quiz::where('type', 'befor')->with('courses')->whereHas('courses', function ($q) use ($id) {
            $q->where('course_id', $id);
        })->first();
        $data = [];
        $pivotedData = [];
        foreach ($attendances as $attendance) {
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
            $attendanceRow = [
                'رقم الهاتف' => $attendance->phone_number,
                'الاسم' => $attendance->name,
                'النتيجه' => $totalBefor

            ];
            foreach ($quizBefor->questions as $question) {
                $attendanceAnswer = UserAnswer::where([['quiz_id', $quizBefor->id], ['question_id', $question->id], ['attendance_id', $attendance->id]])->first();
                if ($attendanceAnswer) {
                    $attendanceRow[' ' . $question->name] = $attendanceAnswer->is_true;
                } else {
                    $attendanceRow[' ' . $question->name] = 0;
                }
            }
            $pivotedData[] = $attendanceRow;
        }
        $pivotedCollection = collect($pivotedData);
        // Generate and download the Excel file
        return (new \Rap2hpoutre\FastExcel\FastExcel($pivotedCollection))->download('file.xlsx');
    }

    public function quizAfter(Request $request, $id)
    {
        $attendances = Attendance::with('courses')->whereHas('courses', function ($q) use ($id) {
            $q->where('course_id', $id);
        })->get();
        $course = Course::find($id);
        $quizBefor = Quiz::where('type', 'after')->with('courses')->whereHas('courses', function ($q) use ($id) {
            $q->where('course_id', $id);
        })->first();
        $data = [];
        $pivotedData = [];
        foreach ($attendances as $attendance) {
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
                $totalBefor = ($responseAnswersTrue / $questions->count()) * 100;
            } else {
                $totalBefor = 0;
            }
            $attendanceRow = [
                'رقم الهاتف' => $attendance->phone_number,
                'الاسم' => $attendance->name,
                'النتيجه' => $totalBefor

            ];
            foreach ($quizBefor->questions as $question) {
                $attendanceAnswer = UserAnswer::where([['quiz_id', $quizBefor->id], ['question_id', $question->id], ['attendance_id', $attendance->id]])->first();
                if ($attendanceAnswer) {
                    $attendanceRow[' ' . $question->name] = $attendanceAnswer->is_true;
                } else {
                    $attendanceRow[' ' . $question->name] = 0;
                }
            }
            $pivotedData[] = $attendanceRow;
        }
        $pivotedCollection = collect($pivotedData);
        // Generate and download the Excel file
        return (new \Rap2hpoutre\FastExcel\FastExcel($pivotedCollection))->download('file.xlsx');
    }

    public function quizRate(Request $request, $id)
    {
        $attendances = Attendance::with('courses')->whereHas('courses', function ($q) use ($id) {
            $q->where('course_id', $id);
        })->get();
        $data = [];
        $pivotedData = [];
        foreach ($attendances as $attendance) {
            $attendanceRow = [
                'رقم الهاتف' => $attendance->phone_number,
                'الاسم' => $attendance->name,
            ];

            $rates = Rate::where('course_id', $id)->get();
            foreach ($rates as $question) {
                $userRate = RateAttendance::where([['attendance_id', $attendance->id], ['rate_id', $question->id]])->first();
                if ($userRate) {
                    $attendanceRow[$question->question] = $userRate->rate;
                } else {
                    $attendanceRow[$question->name] = 0;
                }
            }
            $pivotedData[] = $attendanceRow;
        }
        $pivotedCollection = collect($pivotedData);
        // Generate and download the Excel file
        return (new \Rap2hpoutre\FastExcel\FastExcel($pivotedCollection))->download('file.xlsx');
    }
    public function duplicate($id)
    {
        $quiz = Quiz::find($id);
        $newQuiz = $quiz->replicate();
        $newQuiz->type = 'after';
        $newQuiz->created_at = Carbon::now();
        $save = $newQuiz->save();
        $questions = Question::where('quiz_id', $id)->get();;
        foreach ($questions as $question) {
            $newQuestion = $question->replicate();
            $newQuestion->quiz_id = $newQuiz->id;
            $save = $newQuestion->save();
            foreach ($question->options as $options) {
                $newOptions = $options->replicate();
                $newOptions->question_id = $newQuestion->id;
                $save = $newQuestion->save();
            }
        }
        return redirect()->route('quizes.index');
    }
    public function drepInStore(Request $request, $id)
    {
        // dd($request->all());
        $course = Course::find($id);
        $course->status_interactive = $request->status_interactive;
        $course->status_befor = $request->status_befor;
        $course->status_after = $request->status_after;
        $course->status_rate = $request->status_rate;
        $course->update();
        $quizbefCheck = QuizCourse::with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'befor');
        })->where('course_id', $id)->first();
        if ($request->quiz_befor_id) {
            if ($quizbefCheck) {
                $quizBef = $quizbefCheck->delete();
                $quizBef = new QuizCourse();
                $quizBef->quiz_id = $request->quiz_befor_id;
                $quizBef->course_id = $course->id;
                $quizBef->save();
            } else {
                $quizBef = new QuizCourse();
                $quizBef->quiz_id = $request->quiz_befor_id;
                $quizBef->course_id = $course->id;
                $quizBef->save();
            }
        }
        $quizAftCheck = QuizCourse::with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'after');
        })->where('course_id', $id)->first();
        if ($request->quiz_after_id) {
            if ($quizAftCheck != null) {
                $quizAft = $quizAftCheck->delete();
                $quizAft = new QuizCourse();
                $quizAft->course_id = $course->id;
                $quizAft->quiz_id = $request->quiz_after_id;
                $quizAft->save();
            } else {
                $quizAft = new QuizCourse();
                $quizAft->course_id = $course->id;
                $quizAft->quiz_id = $request->quiz_after_id;
                $quizAft->save();
            }
        }
        $quizInterCheck = QuizCourse::with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'after');
        })->where('course_id', $id)->first();
        if ($request->quiz_interactive_id) {
            if ($quizInterCheck != null) {
                $quizInter = $quizInterCheck->delete();
                $quizInter = new QuizCourse();
                $quizInter->course_id = $course->id;
                $quizInter->quiz_id = $request->quiz_interactive_id;
                $quizInter->save();
            } else {
                $quizInter = new QuizCourse();
                $quizInter->course_id = $course->id;
                $quizInter->quiz_id = $request->quiz_interactive_id;
                $quizInter->save();
            }
        }
        $quizRateCheck = QuizCourse::with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'rate');
        })->where('course_id', $id)->first();
        // dd($quizRateCheck);
        if ($request->quiz_rate_id) {
            if ($quizRateCheck != null) {
                $quizRate= $quizRateCheck->delete();
                $quizRate = new QuizCourse();
                $quizRate->course_id = $course->id;
                $quizRate->quiz_id = $request->quiz_rate_id;
                $quizRate->save();
            } else {
                $quizRate = new QuizCourse();
                $quizRate->course_id = $course->id;
                $quizRate->quiz_id = $request->quiz_rate_id;
                $quizRate->save();
            }
        }
              $course->date_befor = $request->date_befor;
        // dd($request->all());
        $course->date_after = $request->date_after;

        $course->date_interactive = $request->date_interactive;

        $course->update();


        return response()->json(['redirect' => route('quizes.index')]);
    }
}
