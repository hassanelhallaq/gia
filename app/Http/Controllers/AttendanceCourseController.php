<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCourse;
use App\Models\Course;
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
    public function coursesAttendance($id)
    {
           $attendance = Attendance::with('courses')->whereHas('courses',function($q)use($id){
            $q->where('course_id',$id);
        })->paginate(10);
        return view("dashboard.attendance.index", compact("attendance","id"));
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
