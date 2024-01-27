<?php

namespace App\Http\Controllers;

use App\Models\AttendanceCourse;
use App\Models\AttendanceLogin;
use App\Models\Course;
use App\Models\QuizAttendance;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request, $courseId)
    {
        $attendanceCourse = Course::with('attendances')->find($courseId);

        return view('dashboard.attendance.Certificate_management',compact('attendanceCourse'));
    }

    public function updateCertifcate(Request $request){
        $attendanceCourse = AttendanceCourse::where('attendance_id',$request->attendance_id)->where('course_id',$request->course_id)->first();
        if ($request->hasFile('file')) {
            $adminImage = $request->file('file');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/certificate', $imageName);
            $attendanceCourse->certficate = '/images/' . 'certificate' . '/' . $imageName;
        }
        $attendanceCourse->code = $request->code;
        $attendanceCourse->certifacate_type = $request->certifacate_type;

        $attendanceCourse->update();
        return response()->json(['redirect' => route('certificate.management',[$request->course_id])]);

    }
}
