<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseFile;
use Illuminate\Http\Request;

class CourseFileController extends Controller
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
            'type' => 'required',
            'file' => 'required|file|max:8000', // 8 megabytes
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $course = new CourseFile();
        $course->name = $request->name;
        $course->type = $request->type;
        if ($request->hasFile('file')) {
            $adminImage = $request->file('file');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $course->file = '/images/' . 'program' . '/' . $imageName;
        }
        $course->course_id = $request->course_id;
        $course->save();
        return response()->json(['redirect' => url()->previous()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseFile $courseFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseFile $courseFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseFile $courseFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseFile $courseFile)
    {
        //
    }
}
