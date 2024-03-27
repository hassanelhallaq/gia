<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
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

    public function createRate($id)
    {
        $course = Quiz::find($id);
        return view('dashboard.rate.create',compact('course','id'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!empty($request->all())) {
            $validator = Validator($request->all(),
            [
                'question' => 'required|string',

            ], [
                'question.required' => 'الاسم مطلوب',

            ]);
            if (!$validator->fails()) {
                $question = new Rate();
                $question->question = $request->get('question');
                $question->quiz_id = $request->get('quiz_id');
                $isSaved = $question->save();
                 return response()->json(['icon' => 'success', 'title' => 'تم الانشاء بنجاح '], 200);
            } else {

                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);

            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
