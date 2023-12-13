<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::orderBy("id", "desc")->withCount('courses')->paginate(10);
        return view("dashboard.programs.index", compact("programs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.programs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator($data, [
            'name' => 'required|string',
            'image' => 'required',
            'content_one' => 'required',
            'client_name' => 'required',
            'username' => 'required',
            'content_two' => 'required',
            'start' => 'required',
            'end' => 'required',
            'theme_name' => 'required',
            'contact_type' => 'required',
            'register' => 'required',
            'show_invited' => 'required',
            'color' => 'required',
            'attendance_method' => 'required',
            'file' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $program = new Program();
        $program->name = $request->name;
        $program->content_one = $request->content_one;
        $program->client_name = $request->client_name;
        $program->username = $request->username;
        $program->content_two = $request->content_two;
        $program->start = $request->start;
        $program->end = $request->end;
        $program->theme_name = $request->theme_name;
        $program->contact_type = $request->contact_type;
        $program->register = $request->register;
        $program->show_invited = $request->show_invited;
        $program->color = $request->color;
         $program->attendance_method = $request->attendance_method;
        if ($request->hasFile('image')) {
            $adminImage = $request->file('image');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $program->image = '/images/' . 'program' . '/' . $imageName;
        }
        if ($request->hasFile('file')) {
            $adminImage = $request->file('file');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('files/program', $imageName);
            $program->file = '/files/' . 'program' . '/' . $imageName;
        }
        $isSaved=  $program->save();
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $isSaved ? 201 : 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
