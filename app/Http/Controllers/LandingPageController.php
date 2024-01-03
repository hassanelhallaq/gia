<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function home($id){
        $program = Program::where('username',$id)->first();
        return view('landing_page.home',compact('program'));
    }

    public function timeLine($id){
        $program = Program::where('username',$id)->first();
        return view('landing_page.timeline',compact('program'));
    }
}

