<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizCourse;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($id, $course_id)
    {
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        $course = Course::findOrFail($course_id);
        if ($attendance->is_accepted == null) {
            return view("invitation.index", compact("attendance", "course"));
        } elseif ($attendance->is_accepted == 1) {
            return view("invitation.second", compact("attendance", "course"));
        }else{
            return view("invitation.index", compact("attendance", "course"));
        }
    }

    public function storeReply(Request $request)
    {

        $attendance =   Attendance::find($request->attendance_id);
        $attendance->is_accepted = $request->is_accepted == true ? 1 : 0;
        $attendance->save();
        return response()->json(['redirect' => route('invitation.second', [$attendance->id, $request->course_id])]);
    }

    public function second($id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        return view("invitation.second", compact("attendance", "course"));
    }




    public function third($id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        $quiz = QuizCourse::where('course_id',$course_id)->first();
        return view("invitation.third", compact("attendance", "course",'quiz'));
    }
    public function backInvetaion($id, $auizId)
    {
        $course = QuizCourse::where('quiz_id',$auizId)->first();
        $course_id = $course->id;
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        $quiz = QuizCourse::where('course_id',$course_id)->first();
        return view("invitation.third", compact("attendance", "course",'quiz'));
    }
     public function quiz($id,$clientId){
        $questions = Question::with('options')->where('quiz_id',$id)->get();
        return response()->json(['questions' => $questions]);
    }
    public function quizView($id,$clientId){
        return view('invitation.quiz');
    }

    public function saveAnswer(Request $request)
    {
        // Validate the incoming request data (you can customize this based on your needs)
        $request->validate([
            'question_id' => 'required|integer',
            'user_id' => 'required|integer',
            'chosen_option' => 'required|string',
        ]);
        // Save the user's chosen answer to the database
        $question = Question::find($request->input('question_id'));
        $userAnswer = new UserAnswer();
        $userAnswer->question_id = $request->input('question_id');
        $userAnswer->question_option_id = $request->input('chosen_option');
        $userAnswer->quiz_id = $question->quiz_id;
        $userAnswer->attendance_id = $request->user_id;
        $userAnswer->save();
        return response()->json(['message' => 'Answer saved successfully']);
    }
}
