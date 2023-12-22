<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
      return view("dashboard.question.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       return $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'type' => 'required',
            'answer' => 'required',
            'is_corect' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $question = Question::create($data);
        $option = new QuestionOption();
        $option->question_id = $question->id;
        $option->answer = $request->answer;
        $option->is_corect = $request->is_corect;
        $option->save();
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $question ? 201 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
