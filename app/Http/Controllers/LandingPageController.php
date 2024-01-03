<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        return view('landing_page.timeline', compact('groupedCourses','program'));
    }
}
