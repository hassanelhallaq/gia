<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($id, $course_id)
    {
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        $course = Course::findOrFail($course_id);
        if ($attendance->is_accepted == null) {
            return view("invitation.index", compact("attendance", "course"));
        } elseif ($attendance->is_accepted == 1) {
            return view("invitation.second", compact("attendance", "course"));
        }else{
            return view("invitation.index", compact("attendance", "course"));
        }
    }

    public function storeReply(Request $request)
    {

        $attendance =   Attendance::find($request->attendance_id);
        $attendance->is_accepted = $request->is_accepted == true ? 1 : 0;
        $attendance->save();
        return response()->json(['redirect' => route('invitation.second', [$attendance->id, $request->course_id])]);
    }

    public function second($id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        return view("invitation.second", compact("attendance", "course"));
    }

    public function third($id, $course_id)
    {

          $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id', $id)->with('courses')->whereHas('courses', function ($q) use ($course_id) {
            $q->where('course_id', $course_id);
        })->first();
        return view("invitation.third", compact("attendance", "course"));
    }

    public function quiz($id){
        $questions = Question::with('options')->where('quiz_id', 9)->get();

        return response()->json(['questions' => $questions]);
    }
}
