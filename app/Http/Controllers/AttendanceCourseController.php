<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCourse;
use App\Models\Course;
use App\Models\Question;
use App\Models\QuizCourse;
use App\Models\UserAnswer;
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
    public function coursesAttendance(Request $request ,$id)
    {
        if($request->name_search){
            $attendance = Attendance::with('courses')->whereHas('courses',function($q)use($id){
                $q->where('course_id',$id);
            })->when($request->name_search,function($q)use($request){
                $q->where('name','like', '%' . $request->name_search . '%');
            })->get();
        }else{
           $attendance = Attendance::with('courses')->whereHas('courses',function($q)use($id){
            $q->where('course_id',$id);
        })->paginate(10);
    }
        $course = Course::find($id);

        $quiz = QuizCourse::where('course_id', $course->id)->with('quiz')->whereHas('quiz',function($q){
         $q->where('type', 'befor');
     })->first();

     $responseAnswers = UserAnswer::where('quiz_id', $quiz->quiz_id)->where('attendance_id',$attendance->id)->get();
     $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
     $responseAnswersFalse = $responseAnswers->where('is_true', 0)->count();
     $questions = Question::where('quiz_id', $quiz->quiz_id)->with('userAswes', 'optionTrue')->get();
     if ($responseAnswersTrue != 0) {
         $total = ($responseAnswersTrue / $responseAnswers->count()) * 100;
     } else {
         $total = 0;
     }
        return view("dashboard.attendance.index", compact("attendance","id",'course','total'));
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
