<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Course;
use App\Models\Program;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $clients = Client::all();
        $program = Program::all();
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
        $course->trainer = $request->trainer;
        $course->percentage_certificate = $request->percentage_certificate;
        $course->study = $request->study == true ? 1 : 0;
        $course->coordinator = $request->coordinator;
        $course->attendance_questionnaire = $request->attendance_questionnaire == true ? 1 : 0;
        $course->image = $request->image_check == true ? 1 : 0;
        $course->program_id = $request->program_id;
        $course->category_id = $request->category_id;
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

        return view("dashboard.courses.edit", compact("course"));
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
        $course->name = $request->course_name;
        $course->language = $request->language;
        $course->seat_count = $request->seat_count;
        $coruseStart = Carbon::parse($request->coruse_start)->format('y-m-d');
        $course->start = $coruseStart;
        $course->is_exam = $request->is_exam;
        $course->duration = $request->duration;
        $course->is_certificate = $request->is_certificate;
        $course->trainer = $request->trainer;
        $course->level = $request->level;
        $course->subject = $request->subject;

        $course->percentage_certificate = $request->percentage_certificate;
        $course->coordinator = $request->coordinator;
        $course->category_id = $request->category_id;
        if ($request->hasFile('assignment')) {
            $adminImage = $request->file('assignment');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $course->image = '/images/' . 'program' . '/' . $imageName;
        }
        $course->update();
        return response()->json(['redirect' => route('program.course', [$request->program_id])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function getCoureses($id)
    {
        $courses = Course::where('program_id', $id)->get();
        return response()->json($courses);
    }
}
