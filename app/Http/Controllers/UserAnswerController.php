<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
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

    public function userAswers($id)
    {
        $course = Course::find($id);
        $quiz = Quiz::where('course_id', $course->id)->where('type', 'befor')->first();
        $responseAnswers = UserAnswer::where('quiz_id', $quiz);
         $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
        $responseAnswersFalse = $responseAnswers->where('is_true', 0)->count();
        $responseAnswers = $responseAnswers->get();
        $questions = Question::where('quiz_id', $quiz->id)->with('userAswes', 'optionTrue')->get();
        $total = ($responseAnswersTrue / $responseAnswers->count()) * 100;
        return view('dashboard.answers.index', compact('responseAnswers', 'responseAnswersTrue', 'responseAnswersFalse', 'questions','total'));
    }
}
