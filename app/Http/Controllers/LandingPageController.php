<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{

    public function home($id)
    {
        $program = Program::where('username', $id)->first();
        return view('landing_page.home', compact('program'));
    }

    public function timeLine($id)
    {
        $program = Program::where('username', $id)->first();

        $groupedCourses = [];
        foreach ($program->courses as $course) {
            $month = date('F', strtotime($course->start));
            $initialDate = Carbon::parse($course->start);

            // Number of days to add
            $daysToAdd = $course->duration;

            // Add days to the initial date
            $newDate = $initialDate->addDays($daysToAdd);
            $formattedDate = $newDate->format('Y-m-d');

            $groupedCourses[$month][] = [
                'start_date' => $course->start,
                'end_date' => $formattedDate,
            ];
        }

        return view('landing_page.timeline', compact('groupedCourses', 'program'));
    }


    public function getEvent(Request $request)
    {
        $clickedDate = Carbon::parse($request->input('date'))->format('Y-m-d');



        $events = Course::where('start', '<=', $clickedDate)
            ->where(function ($query) use ($clickedDate) {
                $query->where(DB::raw("DATE_ADD(start, INTERVAL duration DAY)"), '>=', $clickedDate);
            })
            ->get();

        // Calculate end_date for each event based on start_date and duration
        $events->transform(function ($event) use ($clickedDate) {
            $event->end_date = Carbon::parse($event->start_date)->addDays($event->duration)->format('Y-m-d');
            return $event;
        });

        return response()->json($events);
    }
}
