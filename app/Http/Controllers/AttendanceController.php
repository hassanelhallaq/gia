<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCourse;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = null;
        $course = null;
        $attendance = Attendance::orderBy('created_at','desc')->when($request->name,function($q)use($request){
            $q->where('name','like', '%' . $request->name . '%');
        })->paginate(10);
        return view("dashboard.attendance.index", compact("attendance",'id','course'));
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
            // 'work_place' => 'required',
            // 'id_number' => 'required',
            // 'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }

        $attendance = Attendance::create($data);

        if ($request->course_id) {

            $qrImage = 'images' .  $attendance->id . '.svg';
            $url =  'https://giaelites.com/dashboard/admin/' . $attendance->id .'/'.$request->course_id.'/login';
            QrCode::format('svg');
            QrCode::generate($url, $qrImage);
            $attendance->qr = $qrImage;
            $attendance->update();
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
            // 'work_place' => 'required',
            // 'id_number' => 'required',
            // 'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $attendance->update($data);
        $attendanceCourse = AttendanceCourse::where('attendance_id',$attendance->id)->where('course_id',$request->course_id)->first();
        if ($request->hasFile('certficate')) {
            $adminImage = $request->file('certficate');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $attendanceCourse->certficate = '/images/' . 'program' . '/' . $imageName;
            $attendanceCourse->update();
        }
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

    public function sendInv(){

    }
}
