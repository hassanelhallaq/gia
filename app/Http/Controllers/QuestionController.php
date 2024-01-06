<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quzies = Quiz::paginate(10);
        return view("dashboard.question.index",compact('quzies'));

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
                'name' => 'required|string',
                'type' => 'required|string',
                'option_one' => 'required|string',
                'option_two' => 'required|string',
                'option_three' => 'required|string',
                'quiz_id'=> 'required',
            ], [
                'name.required' => 'الاسم مطلوب',
                'type.required' => 'نوع السؤال مطلوب',
                'option_one.required' => 'الخيار الاول مطلوب',
                'option_two.required' => 'الخيار الثاني مطلوب',
                'option_three.required' => 'الخيار الثالث مطلوب',
                'quiz_id.required' => 'quiz is required',

            ]);
            if (!$validator->fails()) {
                $question = new question();
                $question->name = $request->get('name');
                $question->type = $request->get('type');
                $question->quiz_id = $request->get('quiz_id');
                $isSaved = $question->save();
                $isQuestionOption = $this->questionOption($request, $question);
                 return response()->json(['icon' => 'success', 'title' => 'تم الانشاء بنجاح '], 200);

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
