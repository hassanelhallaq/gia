<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($id,$course_id)
    {
        $course = Course::findOrFail($course_id);
        $attendance = Attendance::where('id',$id)->with('courses')->whereHas('courses',function($q)use($course_id){
            $q->where('course_id',$course_id);
        })->first();
        return view("invitation.index", compact("attendance","course"));
    }
}
