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
        if (!empty($request->all())) {
            $validator = Validator($request->all(),
            [
                'name' => 'required|string|min:3',
                'type' => 'required|string',
                'option_one' => 'required|string|min:3',
                'option_two' => 'required|string|min:3',
                'option_three' => 'required|string|min:3',
            ], [
                'name.required' => 'name is required',
                'type.required' => 'type is required',
                'option_one.required' => 'option 1 is required',
                'option_two.required' => 'option 2 is required',
                'option_three.required' => 'option 3 is required',
            ]);
            if (!$validator->fails()) {
                $question = new question();
                $question->name = $request->get('name');
                $question->type = $request->get('type');
                $isSaved = $question->save();
                $isQuestionOption = $this->questionOption($request, $question);
                 return response()->json(['icon' => 'success', 'title' => 'Question created successfully'], 200);

            } else {

                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);

            }

        }

    }

    private function questionOption(Request $request, question $question)
    {
             // save options
           return  QuestionOption::insert([
                [
                    'question_id' => $question->id,
                    'answer' => $request->get('option_one'),
                    'is_corect' => $request->get('correct_one') == 'on' ? 1 : 0,
                ],
                [
                    'question_id' => $question->id,
                    'answer' => $request->get('option_two'),
                    'is_corect' => $request->get('correct_two') == 'on' ? 1 : 0,
                ],
                [
                    'question_id' => $question->id,
                    'answer' => $request->get('option_three'),
                    'is_corect' => $request->get('correct_three') == 'on' ? 1 : 0,
                ],
            ]);
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
