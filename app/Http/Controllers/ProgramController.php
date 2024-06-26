<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminProgram;
use App\Models\Candidat;
use App\Models\Category;
use App\Models\Client;
use App\Models\Country;
use App\Models\Course;
use App\Models\Program;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programs = Program::orderBy("id", "desc")->when($request->name, function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        });
        $programAdmin =  AdminProgram::where('admin_id', Auth::user()->id)->first();
        $programAdminSuper =  AdminProgram::where('admin_id', Auth::user()->id)->where('type', 'admin')->first();

        if ($programAdminSuper &&  Auth::guard('admin')->check() && $programAdminSuper->type == 'admin' ) {
            $programs = $programs->withCount('courses')->paginate(10);
        } elseif (Auth::guard('admin')->check()) {

            $programAdmin =  AdminProgram::where('admin_id', Auth::user()->id)->get();
            $programs = $programs->whereIn('id', $programAdmin->pluck('program_id'))->withCount('courses')->paginate(10);
        } elseif (Auth::guard('client')->check()) {
            $programs = $programs->where('client_id', Auth::user()->id)->withCount('courses')->paginate(10);
        } elseif (Auth::guard('trainer')->check()) {
            $programs = $programs->with('courses')->whereHas('courses', function ($q) {
                $q->where('trainer_id', Auth::user()->id);
            })->withCount('courses')->paginate(10);
        }
        // $programs=Program::withCount('courses')->paginate(10);
        return view("dashboard.programs.index", compact("programs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $trainers = Trainer::all();
        return view("dashboard.programs.create", compact('clients', 'trainers'));
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
            'username' => 'required|unique:programs',
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
            // 'coordinator' => 'required',
            'attendance_questionnaire' => 'required',
            'category_id' => 'required',
            'image_check' => 'required',


        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $program = new Program();
        $program->name = $request->name;
        $program->content_one = $request->content_one;
        $program->username = $request->username;
        $program->content_two = $request->content_two;
        $start = Carbon::parse($request->start)->format('y-m-d');
        $end = Carbon::parse($request->end)->format('y-m-d');

        $program->start = $start;
        $program->end = $end;
        $program->theme_name = $request->theme_name;
        $program->contact_type = $request->contact_type;
        $program->register = $request->register;
        $program->show_invited = $request->show_invited;
        $program->color = $request->color;
        if (Auth::guard('admin')->check()) {
            $program->client_id = $request->client_id;
        } else if (Auth::guard('client')->check()) {
            $program->client_id = Auth::user()->id;
        }
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
        $isSaved =  $program->save();
        if ($isSaved) {
            $course = new Course();
            $course->name = $request->course_name;
            $course->language = $request->language;
            $course->seat_count = $request->seat_count;
            $coruseStart = Carbon::parse($request->coruse_start)->format('y-m-d');
            $course->start = $coruseStart;
            $course->is_exam = $request->is_exam;
            $course->duration = $request->duration;
            $course->desc = $request->desc;
            $course->location = $request->location;
            $course->rate = $request->link;
            $course->is_certificate = $request->is_certificate;
            $course->trainer_id = $request->trainer;
            $course->percentage_certificate = $request->percentage_certificate;
            $course->study = $request->study == true ? 1 : 0;
            $course->coordinator = $request->coordinator;
            $course->attendance_questionnaire = $request->attendance_questionnaire == true ? 1 : 0;
            $course->image = $request->image_check == true ? 1 : 0;
            $course->program_id = $program->id;
            $course->category_id = $request->category_id;
            if ($request->hasFile('image_course')) {
                $adminImage = $request->file('image_course');
                $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
                $adminImage->move('images/program', $imageName);
                $course->profile = '/images/' . 'program' . '/' . $imageName;
            }
            $course->save();
        }
        return response()->json(['redirect' => route('programs.grid')]);

        // return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $isSaved ? 201 : 400);

    }

    public function checkUser(Request $request)
    {
        $program = Program::where('username', $request->username)->get();
        if ($program->count() == 0) {
            return response()->json(['icon' => 'sucess', 'title' => 'هذا المستخدم غير مستخدم'], 400);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'هذا المستخدم  مستخدم'], 400);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $categories = Category::all();
        $clients = Client::all();
        $trainers = Trainer::all();

        return view("dashboard.programs.new_edit", compact('program', 'clients', 'categories', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {

        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            // 'image' => 'required',
            // 'content_one' => 'required',
            'username' => 'required||unique:programs,username,' . $program->id,
            // 'content_two' => 'required',
            'start' => 'required',
            'end' => 'required',
            'theme_name' => 'required',
            // 'contact_type' => 'required',
            // 'register' => 'required',
            // 'show_invited' => 'required',
            // 'color' => 'required',
            // 'attendance_method' => 'required',
            // 'file' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $program->name = $request->name;
        $program->username = $request->username;
        $start = Carbon::parse($request->start)->format('y-m-d');
        $end = Carbon::parse($request->end)->format('y-m-d');
        $program->start = $start;
        $program->end = $end;
        $program->contract_number = $request->contract_number;
        $program->theme_name = $request->theme_name;
        $program->courses_count = $request->courses_count;
        $program->trainers_count = $request->trainers_count;
        $program->logistics_services = $request->logistics_services;
        $program->training_center = $request->training_center;
        if ($request->public_sector == 1) {
            $program->sector_type = 'public_sector';
        }
        if ($request->private_sector == 1) {
            $program->sector_type = 'private_sector';
        }
        if ($request->coffe_break == 1) {
            $program->logistic = 'coffe_break';
        }
        if ($request->lanch == 1) {
            $program->logistic = 'lanch';
        }
        if ($request->other == 1) {
            $program->logistic = 'other';
        }
        if ($request->tranning == 1) {
            $program->colsntunt = 'tranning';
        }
        if ($request->tranning_and_colustant == 1) {
            $program->colsntunt = 'tranning_and_colustant';
        }
        if ($request->colustant == 1) {
            $program->colsntunt = 'colustant';
        }
        if ($request->other == 1) {
            $program->other_type = 'other_type';
        }
        if ($request->hasFile('prog_file')) {
            $adminImage = $request->file('prog_file');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('files/program', $imageName);
            $program->file = '/files/' . 'program' . '/' . $imageName;
        }
        $isSaved =  $program->update();
        return response()->json(['redirect' => route('programs.grid')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prog = Program::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'تم الحذف  بنجاح'], $prog ? 200 : 400);
    }

    public function gridView(Request $request)
    {
        $programs = Program::orderBy("id", "desc")->withCount('courses')->paginate(10);
        return view("dashboard.programs.view", compact("programs"));
    }
    public function programXlsx(Request $request)
    {

        $courses = Program::all();

        foreach ($courses as $course) {


            $data[] = [
                'الاسم' => $course->name,
                'عدد الدورات' => $course->courses_count,
                'العميل' => $course->client->name ?? '',
                'تاريخ البداية	' => $course->start,
                'النهايه' => $course->end,
            ];
        }
        if (empty($data))
            return back();
        $list = collect($data);
        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('file.xlsx');
    }

    public function programWizard($id)
    {
        $countries = Country::all();
        $roles = Role::where('guard_name', 'admin')->get();
        $client = Client::find($id);
        return view("dashboard.AddProjectManager.add", compact('roles', 'countries', 'id', 'client'));
    }
    public function programQuick()
    {

        $adminManger =  AdminProgram::where('type', 'manger')->get();
        $adminsMangs = Admin::whereIn('id', $adminManger->pluck('admin_id'))->paginate(10);

        $adminCordreator =  AdminProgram::where('type', 'cordreator')->get();
        $admins = Admin::whereIn('id', $adminCordreator->pluck('admin_id'))->paginate(10);

        $countries = Country::all();
        $clients = Client::all();
        return view("dashboard.AddProjectManager.quick_add", compact('countries', 'clients', 'adminsMangs', 'admins'));
    }
    public function programWizardStore(Request $request, $id)
    {

        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            // 'username' => 'required|unique:programs',
            'start' => 'required',
            'end' => 'required',
            'contract_number' => 'required',
            'courses_count' => 'required',
            'trainers_count' => 'required',
            // 'country_id' => 'required',
            'logistics_services' => 'required',
            'training_center' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $program = new Program();
        $program->name = $request->name;
        $program->username = $request->username;
        $start = Carbon::parse($request->start)->format('y-m-d');
        $end = Carbon::parse($request->end)->format('y-m-d');
        $program->start = $start;
        $program->end = $end;
        $program->contract_number = $request->contract_number;
        $program->courses_count = $request->courses_count;
        $program->trainers_count = $request->trainers_count;
        // $program->country_id = $request->country_id;
        $program->logistics_services = $request->logistics_services;
        $program->client_id = $id;
        $program->training_center = $request->training_center;
        if ($request->public_sector == 1) {
            $program->sector_type = 'public_sector';
        }
        if ($request->private_sector == 1) {
            $program->sector_type = 'private_sector';
        }
        if ($request->coffe_break == 1) {
            $program->logistic = 'coffe_break';
        }
        if ($request->lanch == 1) {
            $program->logistic = 'lanch';
        }
        if ($request->other == 1) {
            $program->logistic = 'other';
        }
        if ($request->tranning == 1) {
            $program->colsntunt = 'tranning';
        }
        if ($request->tranning_and_colustant == 1) {
            $program->colsntunt = 'tranning_and_colustant';
        }
        if ($request->colustant == 1) {
            $program->colsntunt = 'colustant';
        }
        if ($request->other == 1) {
            $program->other_type = 'other_type';
        }
        if ($request->hasFile('prog_file')) {
            $adminImage = $request->file('prog_file');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('files/program', $imageName);
            $program->file = '/files/' . 'program' . '/' . $imageName;
        }
        $program->save();

        $file = $request->file('excel_file');
        if ($file) {
            $rows = (new FastExcel)->sheet()->import($file);
            foreach ($rows as $row) {
                $name = $row['name'];
                $phone = $row['phone_number'];
                $attendance =  Candidat::create(['name' => $name, 'phone_number' => $phone, 'program_id' => $program->id]);
            }
        }
        session(['program_id' => $program->id]);

        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $program ? 201 : 400);
    }

    public function programQuickStore(Request $request)
    {

        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            // 'username' => 'required|unique:programs',
            'start' => 'required',
            'end' => 'required',
            'contract_number' => 'required',
            'courses_count' => 'required',
            'trainers_count' => 'required',
            // 'country_id' => 'required',
            'logistics_services' => 'required',
            'training_center' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $program = new Program();
        $program->name = $request->name;
        $program->username = $request->username;
        $start = Carbon::parse($request->start)->format('y-m-d');
        $end = Carbon::parse($request->end)->format('y-m-d');
        $program->start = $start;
        $program->end = $end;
        $program->contract_number = $request->contract_number;
        $program->courses_count = $request->courses_count;
        $program->trainers_count = $request->trainers_count;
        // $program->country_id = $request->country_id;
        $program->logistics_services = $request->logistics_services;
        $program->client_id = $request->client_id;
        $program->training_center = $request->training_center;
        if ($request->public_sector == 1) {
            $program->sector_type = 'public_sector';
        }
        if ($request->private_sector == 1) {
            $program->sector_type = 'private_sector';
        }
        if ($request->coffe_break == 1) {
            $program->logistic = 'coffe_break';
        }
        if ($request->lanch == 1) {
            $program->logistic = 'lanch';
        }
        if ($request->other == 1) {
            $program->logistic = 'other';
        }
        if ($request->tranning == 1) {
            $program->colsntunt = 'tranning';
        }
        if ($request->tranning_and_colustant == 1) {
            $program->colsntunt = 'tranning_and_colustant';
        }
        if ($request->colustant == 1) {
            $program->colsntunt = 'colustant';
        }
        if ($request->other == 1) {
            $program->other_type = 'other_type';
        }
        if ($request->hasFile('prog_file')) {
            $adminImage = $request->file('prog_file');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('files/program', $imageName);
            $program->file = '/files/' . 'program' . '/' . $imageName;
        }
        $program->save();
        $file = $request->file('excel_file');
        if ($file) {
            $rows = (new FastExcel)->sheet()->import($file);
            foreach ($rows as $row) {
                $name = $row['name'];
                $phone = $row['phone_number'];
                $attendance =  Candidat::create(['name' => $name, 'phone_number' => $phone, 'program_id' => $program->id]);
            }
        }
        session(['program_id' => $program->id]);

        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $program ? 201 : 400);
    }
    public function programWizardUpdate(Request $request)
    {
        $id = $request->session()->get('program_id');
        $program = Program::find($id);
        $program->info = $request->info;
        if ($request->hasFile('program_files')) {
            $adminImage = $request->file('program_files');
            $imageName = time() . '_' . $request->get('name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $program->program_files = '/images/' . 'program' . '/' . $imageName;
        }
        $program->update();


        $request->session()->forget('program_id');

        return response()->json(['redirect' => route('programs.index')]);
    }

    public function mangers($id)
    {
        $manger = Admin::with('admins')->whereHas('admins', function ($q) use ($id) {
            $q->where('type', 'manger');
        })->get();
        $cordreator = Admin::with('admins')->whereHas('admins', function ($q) use ($id) {
            $q->where('type', 'cordreator');
        })->get();
        $cordTrainner = Admin::with('admins')->whereHas('admins', function ($q) use ($id) {
            $q->where('type', 'cord-trainner');
        })->get();
        $consultants = Admin::with('admins')->whereHas('admins', function ($q) use ($id) {
            $q->where('type', 'consultants');
        })->get();
        $trainers = Trainer::all();

        return view("dashboard.programs.mangers", compact('cordreator', 'trainers', 'cordTrainner', 'consultants', 'manger', 'id'));
    }
    public function mangersUpdate(Request $request, $id)
    {
        $adminManger = AdminProgram::where('program_id', $id)->where('type', 'manger')->first();
        $adminManger->admin_id = $request->mang_select;
        $adminManger->update();
        $adminCordreator = AdminProgram::where('program_id', $id)->where('type', 'cordreator')->first();
        $adminCordreator->admin_id = $request->cord_select;
        $adminCordreator->update();
        $adminCordTrainer = AdminProgram::where('program_id', $id)->where('type', 'cord-trainner')->first();
        $adminCordTrainer->admin_id = $request->cordTrainner;
        $adminCordTrainer->update();
        $adminConsultants = AdminProgram::where('program_id', $id)->where('type', 'consultants')->first();
        $adminConsultants->admin_id = $request->consultants;
        $adminConsultants->update();
        $program = Course::where('program_id', $id)->first();
        if ($program) {
            $program->trainer_id = $request->trainers;
            $program->update();
        }
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $program ? 201 : 400);
    }
}
