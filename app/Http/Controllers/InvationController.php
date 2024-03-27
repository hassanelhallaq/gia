<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCourse;
use App\Models\Course;
use App\Models\CourseFile;
use App\Models\CourseLink;
use App\Models\Program;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Quiz;
use App\Models\QuizAttendance;
use App\Models\QuizCourse;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\RateAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class InvationController extends Controller
{
    public function redirectToLogin($id, $course_id)
    {
        if (Auth::user()) {
            $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
                $q->where('course_id', $course_id);
            })->first();
            $course = Course::findOrFail($course_id);
            if ($attendance->status = 'active') {
                if ($attendance) {
                    if ($attendance->is_accepted == null) {
                        return view("invitationV2.invition", compact("attendance", "course"));
                    } elseif ($attendance->is_accepted == 1) {
                        return view("invitationV2.course", compact("attendance", "course"));
                    } else {
                        return view("invitationV2.0404", compact("attendance", "course"));
                    }
                } else {
                    return view("invitationV2.0404", compact("attendance", "course"));
                }
            }
        } else {
            return redirect()->route('invitationV2.login', ['id' => $id, 'course_id' => $course_id]);
        }
    }
    public function index($id, $course_id)
    {
        if (Auth::user()) {
            $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
                $q->where('course_id', $course_id);
            })->first();
            $course = Course::findOrFail($course_id);
            if ($attendance->status = 'active') {
                if ($attendance) {
                    if ($attendance->is_accepted == null) {
                        return view("invitationV2.invition", compact("attendance", "course"));
                    } elseif ($attendance->is_accepted == 1) {
                        return view("invitationV2.course", compact("attendance", "course"));
                    } else {
                        return view("invitationV2.0404", compact("attendance", "course"));
                    }
                } else {
                    return view("invitationV2.0404", compact("attendance", "course"));
                }
            }
        } else {
            return redirect()->route('invitationV2.login', ['id' => $id, 'course_id' => $course_id]);
        }
    }

    public function storeReply(Request $request)
    {
        // dd($request->is_accepted);
        $attendance =   Attendance::find($request->attendance_id);
        $attendance->is_accepted = $request->is_accepted;
        $attendance->save();
        if ($request->is_accepted == 1) {
            return response()->json(['redirect' => route('invitationV2.second', [$attendance->id, $request->course_id])]);
        } else {
            return response()->json(['redirect' => route('invitationV2.index', [$attendance->id, $request->course_id])]);
        }
    }
    public function inviation($id, $course_id)
    {

        $svgPaths = [
            "inv/assets/one.svg",
            "inv/assets/two.svg",
            "inv/assets/three.svg",
            "inv/assets/four.svg",
            "inv/assets/five.svg"
        ];
        $titles = [
            "الألتزام بنسبة الحضور",
            "تقديم الأختبار القبلي",
            "تقديم الأختبار البعدي",
            "الحصول على الشهادة",
            "تقييم الحدث"
        ];
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        return view("invitationV2.accept_invivation", compact("attendance", "course", 'svgPaths', 'titles'));
    }
    public function second($id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        if (!$attendance) {
            return view("invitationV2.0404", compact("attendance", "course"));
        }
        if ($attendance->status = 'active') {
            return view("invitationV2.course", compact("attendance", "course"));
        } else {
            return view("invitationV2.0404", compact("attendance", "course"));
        }
    }


    public function certificateIssuance($id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        return view("invitation.Certificate_Issuance_form", compact("attendance", "course"));
    }

    public function third($id, $course_id)
    {

        $course = Course::findOrFail($course_id);

        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();

        $quiz = QuizCourse::where('course_id', $course_id)->with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'befor');
        })->first();
        $quizAfter = QuizCourse::where('course_id', $course_id)->with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'after');
        })->first();

        if ($quiz) {
            $quizAtten = QuizAttendance::where('quiz_id', $quiz->quiz_id)->where('attendance_id', $id)->first();
        } else {
            $quizAtten = null;
        }

        if ($quizAfter) {
            $quizAttenAfter = QuizAttendance::where('quiz_id', $quizAfter->quiz_id)->where('attendance_id', $id)->first();
        } else {
            $quizAttenAfter = null;
        }

        $quizInteractive = QuizCourse::where('course_id', $course_id)->with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'interactive');
        })->first();
        $rates = Rate::where('course_id', $course_id)->get();

        if ($quizInteractive) {
            $quizAttenInteractive = QuizAttendance::where('quiz_id', $quizInteractive->quiz_id)->where('attendance_id', $id)->first();
        } else {
            $quizAttenInteractive = null;
        }
        return view("invitationV2.exams", compact("attendance", "course", 'quiz', 'quizAtten', 'quizAfter', 'quizAttenAfter', 'quizInteractive', 'quizAttenInteractive', 'rates'));
    }

    public function thirdContact($id, $course_id)
    {

        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();


        return view("invitation.third_connect", compact("attendance", "course"));
    }
    public function rate($id, $course_id)
    {

        $course = Course::findOrFail($course_id);

        $quizRateCheck = QuizCourse::with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'rate');
        })->where('course_id', $course_id)->first();
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        if ($quizRateCheck) {
            $rates = Rate::where('course_id', $quizRateCheck->quiz_id)->get();
        } else {
            $rates = [];
        }
        return view("invitation.rate", compact("attendance", "course", 'rates'));
    }
    public function backInvetaion($id, $auizId)
    {
        $courses = QuizCourse::where('quiz_id', $auizId)->first();
        $course_id = $courses->course_id;

        return redirect()->route('invitation.third', ['id' => $id, 'course_id' => $course_id]);
        // return view("invitation.third", compact("attendance", "course", 'quiz','quizAtten'));
    }
    public function quiz($id, $clientId)
    {
        $questions = Question::with('options')->where('quiz_id', $id)->with('quiz')->get();
        return response()->json(['questions' => $questions]);
    }
    public function quizView($id, $clientId)
    {
        $quizAtend = QuizAttendance::where('quiz_id', $id)->where('attendance_id', $clientId)->first();
        // if ($quizAtend == null) {
        return view('invitation.quiz', compact('id', 'clientId'));
        // } else {
        //     return redirect()->back();
        // }
    }

    public function saveAnswer(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data (you can customize this based on your needs)
        $request->validate([
            'question_id' => 'required|integer',
            'user_id' => 'required|integer',
            'chosen_option' => 'required|string',
        ]);
        // Save the user's chosen answer to the database
        $question = Question::find($request->input('question_id'));
        $quzAtte = QuizAttendance::where('attendance_id', $request->user_id)->where('quiz_id', $question->quiz_id)->first();
        if ($quzAtte == null) {
            $quzAtte = new QuizAttendance();
        }
        $quzAtte->quiz_id = $question->quiz_id;
        $quzAtte->attendance_id = $request->user_id;
        $quzAtte->save();
        $option = QuestionOption::find($request->chosen_option);
        $userAnswer = new UserAnswer();
        $userAnswer->question_id = $request->input('question_id');
        $userAnswer->question_option_id = $request->input('chosen_option');
        $userAnswer->quiz_id = $question->quiz_id;
        $userAnswer->attendance_id = $request->user_id;
        if ($option->is_corect == 1) {
            $userAnswer->is_true = 1;
        } else {
            $userAnswer->is_true = 0;
        }
        $userAnswer->save();
        return response()->json(['message' => 'Answer saved successfully']);
    }

    public function files($id, $course_id)
    {
        $files = CourseFile::where('course_id', $course_id)->get();
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        $links = CourseLink::where('course_id', $course_id)->get();
        $course = Course::findOrFail($course_id);

        return view('invitationV2.download', compact('files', 'attendance', 'links', 'course'));
    }

    public function ateendanceUpdate(Request $request, $id, $course_id)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'phone_number' => 'required',
            'work_place' => 'required',
            'email' => 'required',
            'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $attendance = Attendance::find($id);
        $attendance->name = $request->name;
        $attendance->phone_number = $request->phone_number;
        $attendance->work_place = $request->work_place;
        $attendance->email = $request->email;
        $attendance->job = $request->job;
        $isSave =  $attendance->update();

        return response()->json(['redirect' => route('invitation.second', [$attendance->id, $course_id])]);
    }

    public function submitRating(Request $request, $id, $course_id)
    {
        // Validate the request
        $request->validate([
            'ratings' => 'required|array',
        ]);

        // Get the ratings from the request
        $ratings = $request->input('ratings');

        // Process and store the ratings in the database
        foreach ($ratings as $questionId => $ratingValue) {
            $rating = new RateAttendance([
                'rate_id' => $questionId,
                'rate' => $ratingValue,
                'attendance_id' => $id,

            ]);
            $rating->save();
        }

        // You can send a response back to the JavaScript if needed
        return response()->json(['message' => 'All ratings submitted successfully']);
    }

    public function sendSms(Request $request)
    {

        $attendance = Attendance::where('phone_number', $request->phone)->first();
        $newCode =  mt_rand(1000, 9999);
        $attendance->password = Hash::make($newCode);
        $attendance->update();
        $massege = $request->massege;
        // Retrieve POST parameters from the request
        $sender = urlencode(request()->input('sender'));
        $apikey = request()->input('api_key');
        $username = request()->input('username');
        $numbers = request()->input('numbers');
        $response = request()->input('response');

        // Process message for Unicode characters
        if (request()->input('unicode') == 1) {
            $mssg = request()->input('message');
            $msg = str_replace("061B", "Ø", $mssg);
            // ... (continue with your Unicode character replacements)
        } else {
            $msg = request()->input('massege');
        }

        $lmsg = urlencode($msg);

        // Make the HTTP request using Laravel HTTP client
        $response = Http::post('https://www.mora-sa.com/api/v1/sendsms', [
            'api_key' => "7d937a772bb38892581c72408e3e0146ba57454d",
            'username' => "gialearning",
            'message' => $newCode . "رمز تفعيلك هو ",
            'sender' => "GiaLearning",
            'numbers' => '966' . $request->phone,
            'response' => $response,
        ]);
        // Get the server response
        $server_output = $response->body();
        // Further processing...
        // if ($server_output == "OK") { echo "1"; } else { echo "0"; }

    }
    public function courses($id, $course_id)
    {
        // dd(Auth::user()->phone_number);
        $attendance = Attendance::where('phone_number', Auth::user()->phone_number)->get();
        $attendanceIds = $attendance->pluck('id')->toArray(); // Extracting IDs from collection
        $courses = AttendanceCourse::whereIn('attendance_id', $attendanceIds)->get();
        $programs = Program::whereIn('id',$courses->pluck('program_id'))->get();
        return view("invitationV2.courses", compact('courses','programs'));
    }
    public function login($id, $course_id)
    {

        return view("invitationV2.login", compact('id', 'course_id'));
    }
    public function submitOtp(Request $request)
    {
        // dd($request->is_accepted);
        $code =   $request->fourth . '' .
            $request->third . '' .
            $request->sec  . '' .
            $request->ist;
        $attendance = Attendance::where('phone_number', $request->phone)->first();
        $credentials = [
            'phone_number' => $request->get('phone'),
            'password' => $code,
        ];
        if (Auth::guard('attendance')->attempt($credentials)) {
            // Authentication successful
            return response()->json(['redirect' => route('invitationV2.courses', [$request->id, $request->course_id])]);
        } else {
            // Authentication failed
            return response()->json(['icon' => 'error', 'title' => 'Login Failed'], 400);
        }
    }
}
