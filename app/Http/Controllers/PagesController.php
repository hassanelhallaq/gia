<?php

namespace App\Http\Controllers;

use App\Models\AdminProgram;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function index(Request $request)
    {
        $now = now();

        if (Auth::guard('admin')->check()) {
            $programs = Program::count();
        } elseif (Auth::guard('client')->check()) {
            $programs = Program::where('client_id', Auth::user()->id)->count();
        }
        if (Auth::guard('admin')->check()) {


                $programsA = Program::orderBy("id", "desc")->when($request->name, function ($q) use ($request) {
                  $q->where('name', 'like', '%' . $request->name . '%');
                 });
                $programAdmin =  AdminProgram::where('admin_id', Auth::user()->id)->first();
                $programAdminSuper =  AdminProgram::where('admin_id', Auth::user()->id)->where('type', 'admin')->first();

                if ($programAdminSuper &&  Auth::guard('admin')->check() && $programAdminSuper->type == 'admin' ) {
                    $programsActice = $programsA->withCount('courses')->paginate(10);
                } elseif (Auth::guard('admin')->check()) {
                  $programAdmin = AdminProgram::where('admin_id', Auth::user()->id)->get();
                $programIds = $programAdmin->pluck('program_id')->toArray(); // Get an array of program IDs

                $programsActice = Program::whereIn('id', $programIds)
                  ->withCount('courses')
                  ->paginate(10);

                } elseif (Auth::guard('client')->check()) {
                    $programsActice = $programs->where('client_id', Auth::user()->id)->withCount('courses')->paginate(10);
                } elseif (Auth::guard('trainer')->check()) {
                    $programs = $programs->with('courses')->whereHas('courses', function ($q) {
                        $q->where('trainer_id', Auth::user()->id);
                    })->withCount('courses')->paginate(10);
                }
        } elseif (Auth::guard('client')->check()) {
            $programsActice = Program::where('client_id', Auth::user()->id)->where('start', '<=', $now)->withCount('courses')
                ->where('end', '>=', $now)
                ->orderBy('created_at', 'desc')->get();
        }
        if (Auth::guard('admin')->check()) {
            $courses = Course::count();
        } elseif (Auth::guard('client')->check()) {
            $courses = Course::with('program')->whereHas('program', function ($q) {
                $q->where('client_id', Auth::user()->id);
            })->count();
        }

        $clickedDate = Carbon::parse($request->input('date'))->format('Y-m-d');


        if (Auth::guard('admin')->check()) {

            $events = Course::where('start', '<=', $clickedDate)
                ->where(function ($query) use ($clickedDate) {
                    $query->where(DB::raw("DATE_ADD(start, INTERVAL duration DAY)"), '>=', $clickedDate);
                })->
                withCount('attendances')
                ->get();
        } elseif (Auth::guard('client')->check()) {
            $events = Course::with('program')->whereHas('program', function ($q) {
                $q->where('client_id', Auth::user()->id);
            })->where('start', '<=', $clickedDate)
                ->where(function ($query) use ($clickedDate) {
                    $query->where(DB::raw("DATE_ADD(start, INTERVAL duration DAY)"), '>=', $clickedDate);
                })->
                withCount('attendances')->get();
        }
        // Calculate end_date for each event based on start_date and duration
        $events->transform(function ($event) use ($clickedDate) {
            $event->end_date = Carbon::parse($event->start_date)->addDays($event->duration)->format('Y-m-d');
            return $event;
        });
        if (Auth::guard('admin')->check()) {
        $attendance = Attendance::count();
        }elseif (Auth::guard('trainer')->check()){
            $attendance = 0 ;
        }
        if (Auth::guard('client')->check()) {

            $attendance = Program::where('client_id', Auth::user()->id)->with(['courses'=>function($q){
                $q->withCount('attendances');
            }])->get();
        }elseif (Auth::guard('trainer')->check()){
            $attendance = 0 ;
        }

        return view('dashboard.index', compact('programs', 'programsActice', 'courses', 'events', 'attendance'));
    }
}
