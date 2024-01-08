<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLogin;
use Illuminate\Http\Request;

class AttendanceLoginController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = new AttendanceLogin();
        $new->attendance_id = $request->id;
        $new->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceLogin $attendanceLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceLogin $attendanceLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceLogin $attendanceLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceLogin $attendanceLogin)
    {
        //
    }
    public function login(Request $request, $attendanceId , $courseId)
    {
        $new = new AttendanceLogin();
        $new->attendance_id = $attendanceId;
        $new->course_id = $courseId;
        $new->save();
        return redirect('/dashboard/admin/courses');
    }
}
