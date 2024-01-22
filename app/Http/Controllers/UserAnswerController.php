<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Quiz;
use App\Models\QuizCourse;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswer $userAnswer)
    {
        //
    }

    public function userAswers($id, $attendanceId)
    {
        $course = Course::find($id);
        $quiz = QuizCourse::where('course_id', $course->id)->with('quiz')->whereHas('quiz', function ($q) {
            $q->where('type', 'befor');
        })->first();
        // $questions
        if ($quiz) {
            $quizId = $quiz->quiz_id;
            $responseAnswers = UserAnswer::where('quiz_id', $quiz->quiz_id)->where('attendance_id', $attendanceId)->get();
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
        return view('dashboard.answers.index', compact('responseAnswers', 'responseAnswersTrue', 'responseAnswersFalse', 'questions', 'total', 'attendanceId', 'quizId'));
    }
}
