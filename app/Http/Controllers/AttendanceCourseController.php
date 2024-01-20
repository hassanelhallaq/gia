<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCourse;
use App\Models\Course;
use App\Models\Question;
use App\Models\QuizCourse;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class AttendanceCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function coursesAttendance(Request $request ,$id)
    {
        if($request->name_search){
            $attendance = Attendance::with('courses')->whereHas('courses',function($q)use($id){
                $q->where('course_id',$id);
            })->when($request->name_search,function($q)use($request){
                $q->where('name','like', '%' . $request->name_search . '%');
            })->get();
        }else{
           $attendance = Attendance::with('courses')->whereHas('courses',function($q)use($id){
            $q->where('course_id',$id);
        })->paginate(10);
    }
        $course = Course::find($id);

      


        return view("dashboard.attendance.index", compact("attendance","id",'course'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceCourse $attendanceCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceCourse $attendanceCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceCourse $attendanceCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceCourse $attendanceCourse)
    {
        //
    }
}
