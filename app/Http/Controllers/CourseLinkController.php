<?php

namespace App\Http\Controllers;

use App\Models\CourseLink;
use Illuminate\Http\Request;

class CourseLinkController extends Controller
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
        $data = $request->all();

        $validator = Validator($data, [
            'name' => 'required',
            'link' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $course = new CourseLink();
        $course->name = $request->name;
        $course->link = $request->link;
        $course->course_id = $request->course_id;
        $course->save();
        return response()->json(['redirect' => url()->previous()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseLink $courseLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseLink $courseLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseLink $courseLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseLink $courseLink)
    {
        //
    }
}
