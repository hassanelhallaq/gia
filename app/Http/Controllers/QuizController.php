<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $quizesBefor = Quiz::orderBy("created_at", "desc")->where('type','befor')->paginate(10);
        $quizesAfter = Quiz::orderBy("created_at", "desc")->where('type','after')->paginate(10);
        $quizesInteractive = Quiz::orderBy("created_at", "desc")->where('type','interactive')->paginate(10);

        return view("dashboard.quiz.index", compact("quizesBefor", 'quizesAfter','quizesInteractive','courses'));
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
        return response()->json(['redirect' => route('quiz.questions', [$quiz->id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
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
    public function destroy(Quiz $quiz)
    {
        //
    }
}
