<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view("dashboard.courses.index", compact("courses"));
    }
    public function programCourses($id)
    {
        $program = Program::find($id);
        $courses = Course::where('program_id',$id)->paginate(10);
        return view("dashboard.courses.index", compact("courses",'program'));
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
    public function show(Course $course)
    {
        return view("dashboard.courses.show", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
         return view("dashboard.courses.index", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
