<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use App\Models\Attendance;
use App\Models\AttendanceCourse;
use App\Models\Course;
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
    public function feedBackAttend($id, $courseId)
    {
        $attendance = Attendance::find($id);
        $course = Course::find($courseId);

        return view('interactive', compact('attendance', 'courseId', 'course'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request if needed

        // Extract the feedback data from the request
        $feedbackData = $request->all();

        // Loop through the feedback data and save each question and answer to the database
        $feedBack = new FeedBack();
        $feedBack->question = $request->punctuality;
        $feedBack->answer = $request->answer_punctuality;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;
        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->involvement_in_grpup;
        $feedBack->answer = $request->answer_exceeds_expectationsـinvolvement_in_grpup;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->initiative;
        $feedBack->answer = $request->answer_could_improve_initiative;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->creativity;
        $feedBack->answer = $request->answer_could_improve_creativity;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->support;
        $feedBack->answer = $request->answer_support;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->tact;
        $feedBack->answer = $request->answer_tact;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->recommendations;
        $feedBack->answer = $request->answr_could_improve_recommendations;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->ready;
        $feedBack->answer = $request->answe_could_improve_ready;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->benefit;
        $feedBack->answer = $request->answe_benefit;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->training_benefit;
        $feedBack->answer = $request->answe_training_benefit;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();
        $feedBack = new FeedBack();

        $feedBack->question = $request->comments;
        $feedBack->answer = $request->answe_comments;
        $feedBack->attendance_id = $request->attendance_id;
        $feedBack->course_id = $request->course_id;

        $feedBack->save();

        $feedBack = FeedBack::where('course_id', $request->course_id)->get();
        $attendanceIds = $feedBack->pluck('attendance_id')->toArray();

        // Fetch the first AttendanceCourse where attendance_id is not in the array of $attendanceIds
        $courseAttend = AttendanceCourse::whereNotIn('attendance_id', $attendanceIds)->first();

        // Optionally, return a response indicating success or failure
        return response()->json(['redirect' => route('feedBackAttend', [$courseAttend->attendance_id, $request->course_id])]);
    }
}
