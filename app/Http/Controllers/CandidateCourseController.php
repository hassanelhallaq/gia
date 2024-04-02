<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\CandidateCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class CandidateCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCand($id)
    {
        $course = Course::find($id);
        $candidat = Candidat::where('program_id',$course->program_id)->get();
        return view("dashboard.candidat.acceptance", compact("candidat", 'id','course'));
    }

    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'candidat_id' => 'required|exists:candidats,id',
            'course_id' => 'required|exists:courses,id',

        ]);
        if (!$validator->fails()) {
            $candidateCourse = CandidateCourse::where([['course_id',$request->course_id],['candidat_id',$request->candidat_id]])->first();
            if ($candidateCourse) {
                $candidateCourse->delete();
            } else {
                $candidateCourse->candidat_id = $request->candidat_id;
                $candidateCourse->course_id = $request->course_id;
                $candidateCourse->save();
            }
            return response()->json(['icon' => 'success', 'title' => 'status updated'], 200);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);

        }

    }
}
