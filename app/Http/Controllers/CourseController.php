<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Course;
use App\Models\Program;
use App\Models\Quiz;
use App\Models\QuizCourse;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = null;
        $id = null;
        $courses = Course::paginate(10);
        if (Auth::guard('admin')->check()) {
            $courses = Course::orderBy("created_at", "desc")->paginate(10);
        } elseif (Auth::guard('client')->check()) {
            $courses = Course::with('program')->whereHas('program', function ($q) {
                $q->where('client_id', Auth::user()->id);
            })->orderBy("created_at", "desc")->paginate(10);
        }
        return view("dashboard.courses.index", compact("courses", 'program', 'id'));
    }
    public function programCourses($id)
    {
        $program = Program::find($id);
        $courses = Course::where('program_id', $id)->paginate(10);
        return view("dashboard.courses.index", compact("courses", 'program', 'id'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        if (Auth::guard('admin')->check()) {
            $clients = Client::all();
            $program = Program::all();
        } elseif (Auth::guard('client')->check()) {
            $clients = null;
            $program = Program::where('client_id', Auth::user()->id)->get();
        }
        $trainers = Trainer::all();
        return view("dashboard.courses.create", compact('program', 'categories', 'clients', 'trainers'));
    }
    public function createCourse($id)
    {
        $categories = Category::all();
        $clients = Client::all();
        $trainers = Trainer::all();

        return view("dashboard.courses.createCourse", compact('categories', 'clients', 'id', 'trainers'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'course_name' => 'required',
            'language' => 'required',
            'seat_count' => 'required',
            'coruse_start' => 'required',
            'is_exam' => 'required',
            'duration' => 'required',
            'is_certificate' => 'required',
            'trainer' => 'required',
            'percentage_certificate' => 'required',
            'study' => 'required',
            'coordinator' => 'required',
            'attendance_questionnaire' => 'required',
            'category_id' => 'required',
            'image_check' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $course = new Course();
        $course->name = $request->course_name;
        $course->language = $request->language;
        $course->seat_count = $request->seat_count;
        $coruseStart = Carbon::parse($request->coruse_start)->format('y-m-d');
        $course->start = $coruseStart;
        $course->is_exam = $request->is_exam;
        $course->duration = $request->duration;
        $course->is_certificate = $request->is_certificate;
        $course->trainer_id = $request->trainer;
        $course->percentage_certificate = $request->percentage_certificate;
        $course->study = $request->study == true ? 1 : 0;
        $course->coordinator = $request->coordinator;
        $course->attendance_questionnaire = $request->attendance_questionnaire == true ? 1 : 0;
        $course->image = $request->image_check == true ? 1 : 0;
        $course->program_id = $request->program_id;
        $course->category_id = $request->category_id;
        if ($request->hasFile('image_course')) {
            $adminImage = $request->file('image_course');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $course->profile = '/images/' . 'program' . '/' . $imageName;
        }
        $course->save();
        return response()->json(['redirect' => route('program.course', [$request->program_id])]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::withCount("attendances")->with('attendances')->find($id);
        return view("dashboard.courses.show", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        $clients = Client::all();
        $program = Program::all();
        $trainers = Trainer::all();
        $quizesBefor = Quiz::orderBy("created_at", "desc")->where('type', 'befor')->paginate(10);
        $quizesAfter = Quiz::orderBy("created_at", "desc")->where('type', 'after')->paginate(10);
        return view("dashboard.courses.edit", compact("course", 'program', 'categories', 'clients', 'trainers', 'quizesBefor', 'quizesAfter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'course_name' => 'required',
            'language' => 'required',
            'seat_count' => 'required',
            'coruse_start' => 'required',
            'is_exam' => 'required',
            'is_certificate' => 'required',
            'trainer' => 'required',
            'percentage_certificate' => 'required',
            'coordinator' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $course->name = $request->course_name;
        $course->seat_count = $request->seat_count;
        $coruseStart = Carbon::parse($request->coruse_start)->format('y-m-d');
        $course->start = $coruseStart;
        $course->is_exam = $request->is_exam;
        $course->is_certificate = $request->is_certificate;
        $course->trainer_id = $request->trainer;
        $course->level = $request->level;
        $course->percentage_certificate = $request->percentage_certificate;
        $course->coordinator = $request->coordinator;
        $course->category_id = $request->category_id;
        if ($request->hasFile('assignment')) {
            $adminImage = $request->file('assignment');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $course->assignment = '/images/' . 'program' . '/' . $imageName;
        }
        if ($request->hasFile('subject')) {
            $adminImage = $request->file('subject');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $course->subject = '/images/' . 'program' . '/' . $imageName;
        }
        if ($request->hasFile('image_course')) {
            $adminImage = $request->file('image_course');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $course->profile = '/images/' . 'program' . '/' . $imageName;
        }
        $course->update();
        $id = $course->id;
        // $quizesBefor = Quiz::orderBy("created_at", "desc")->where('type','befor')->with('courses')
        // ->whereHas('courses',function($q)use($id){
        //     $q->where('course_id',$id);
        // })->paginate(10);
        $quizbefCheck = QuizCourse::where('quiz_id', $request->quiz_befor_id)->where('course_id', $course->id)->first();
        if($quizbefCheck){
            $quizBef =$quizbefCheck;
        }else{
            $quizBef = new QuizCourse();
        }
        $quizBef->quiz_id = $request->quiz_befor_id;
        $quizBef->course_id = $course->id;
        $quizBef->save();
        if($quizbefCheck){
            $quizAft =$quizbefCheck;
        }else{
            $quizAft = new QuizCourse();
        }
        $quizAft->course_id = $course->id;
        $quizAft->quiz_id = $request->quiz_after_id;
        $quizAft->save();

        return response()->json(['redirect' => route('program.course', [$course->program_id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'تم الحذف  بنجاح'], $course ? 200 : 400);
    }

    public function getCoureses($id)
    {
        $courses = Course::where('program_id', $id)->get();
        return response()->json($courses);
    }

    public function duplicate($id)
    {
        $courses = Course::find($id);
        $newCourses = $courses->replicate();
        $newCourses->created_at = Carbon::now();
        $save = $newCourses->save();
        return response()->json(['icon' => 'success', 'title' => 'تم الحفط  بنجاح'], $save ? 200 : 400);
    }
}
