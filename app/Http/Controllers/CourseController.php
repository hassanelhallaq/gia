<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Course;
use App\Models\CourseFile;
use App\Models\CourseLink;
use App\Models\Program;
use App\Models\Quiz;
use App\Models\QuizCourse;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $course->desc = $request->desc;
        $course->location = $request->location;
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
        $course->rate = $request->link;
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
        $courseFile = CourseFile::where('course_id',$id)->get();
        $courseLinks = CourseLink::where('course_id',$id)->get();

        return view("dashboard.courses.show", compact("course",'courseFile','courseLinks'));
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
        $course->desc = $request->desc;
        $course->location = $request->location;
        $course->rate = $request->link;
        $course->status_befor = $request->status_befor;
        $course->status_after = $request->status_after;
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
        if ($request->quiz_befor_id) {
            if ($quizbefCheck) {
                $quizBef = $quizbefCheck;
            } else {
                $quizBef = new QuizCourse();
            }
            $quizBef->quiz_id = $request->quiz_befor_id;
            $quizBef->course_id = $course->id;
            $quizBef->save();
        }
        $quizAftCheck = QuizCourse::where('quiz_id', $request->quiz_after_id)->where('course_id', $course->id)->first();
        if ($request->quiz_after_id) {
            if ($quizbefCheck) {
                $quizAft = $quizAftCheck;
            } else {
                $quizAft = new QuizCourse();
            }
            $quizAft->course_id = $course->id;
            $quizAft->quiz_id = $request->quiz_after_id;
            $quizAft->save();
        }
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

public function sendSms(Request $request)
    {
        $course = Course::with('attendances')->find($request->course_id);
        foreach ($course->attendances as $attendance) {
            $phone = $attendance->phone_number;
            $massege = $request->massege;

            // Retrieve POST parameters from the request
            $sender = urlencode(request()->input('sender'));
            $apikey = request()->input('api_key');
            $username = request()->input('username');
            $numbers = request()->input('numbers');
            $response = request()->input('response');

            // Process message for Unicode characters
            if (request()->input('unicode') == 1) {
                $mssg = request()->input('message');
                $msg = str_replace("061B", "Ø", $mssg);
                // ... (continue with your Unicode character replacements)
            } else {
                $msg = request()->input('message');
            }

            $lmsg = urlencode($msg);

            // Make the HTTP request using Laravel HTTP client
            $response = Http::post('https://www.mora-sa.com/api/v1/sendsms', [
                'api_key' => "6052582b4d3853cae29fb67c8c9109f34c735af5",
                'username' => "gialearning",
                'message' => $massege . "\n" . route('invitation.index', [$attendance->id, 'course_id' => $request->course_id]),
                'sender' => "GiaLearning",
                'numbers' => $phone,
                'response' => $response,
            ]);
            // Get the server response
             $server_output = $response->body();

            // Further processing...
            // if ($server_output == "OK") { echo "1"; } else { echo "0"; }
        }
    }
}
