<?php

namespace App\Http\Controllers;

use Models\FeedBack;
use App\Models\Attendance;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function feedBackAttend($id)
    {
        $attendance = Attendance::with('courses')->whereHas('courses',function($q)use($id){
            $q->where('course_id',$id);
        })->get();
        return view('interactive',compact('attendance'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'punctuality' => 'required',
            'involvement_in_grpup' => 'required',
            'initiative' => 'required',
            'creativity' => 'required',
            'tact' => 'required',
            'support' => 'required',
            'recommendations' => 'required',
            'ready' => 'required',
            'benefit' => 'required',
            'training_benefit' => 'required',
            'comments' => 'required',
            'answe_benefit' => 'required',
            'answe_training_benefit' => 'required',
            'answe_comments' => 'required',
        ]);

        // Create a new Feedback instance and fill it with the validated data
        $feedback = new \App\Models\FeedBack();
        $feedback->question = $validatedData['punctuality'];
        $feedback->question = $validatedData['involvement_in_grpup'];
        $feedback->question = $validatedData['initiative'];
        $feedback->question = $validatedData['creativity'];
        $feedback->question = $validatedData['tact'];
        $feedback->question = $validatedData['support'];
        $feedback->question = $validatedData['recommendations'];
        $feedback->question = $validatedData['ready'];
        $feedback->question = $validatedData['benefit'];
        $feedback->question = $validatedData['training_benefit'];
        $feedback->question = $validatedData['comments'];
        $feedback->answe_benefit = $validatedData['answe_benefit'];
        $feedback->answe_training_benefit = $validatedData['answe_training_benefit'];
        $feedback->answe_comments = $validatedData['answe_comments'];

        // Save the feedback to the database
        $feedback->save();

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Feedback saved successfully', 'feedback' => $feedback]);
    }

 
}
