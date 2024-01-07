<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = null;
        $attendance = Attendance::orderBy('created_at','desc')->paginate(10);
        return view("dashboard.attendance.index", compact("attendance",'id'));
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
            'name' => 'required|string',
            'phone_number' => 'required',
            'work_place' => 'required',
            'id_number' => 'required',
            'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $attendance = Attendance::create($data);
        if ($request->course_id) {
            $attendance->courses()->attach($request->course_id);
        }
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $attendance ? 201 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'phone_number' => 'required',
            'work_place' => 'required',
            'id_number' => 'required',
            'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $attendance->update($data);
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $attendance ? 201 : 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $attendance = Attendance::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'تم الحذف  بنجاح'] , $attendance ? 200 : 400);

    }
}
