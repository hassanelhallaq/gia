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

        foreach ($request->all() as $key => $value) {
            // Extract the index from the key
            preg_match('/\d+/', $key, $matches);
            $index = $matches[0];

            // Process the data for each section
            $questionName = $request->input('question_name_' . $index);
            $questionType = $request->input('type_' . $index);
            $optionOne = $request->input('option_one_' . $index);
            // ... process other fields accordingly

            // Example: Save to the database
            // Assuming you have a model named YourModel
            Question::create([
                'question_name' => $questionName,
                'type' => $questionType,
                // ... other fields
            ]);
            QuestionOption::create([
                'option_one' => $optionOne,
                'option_cor' => $optionOne,
                'option_one' => $optionOne,

                // ... other fields
            ]);

        }
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
