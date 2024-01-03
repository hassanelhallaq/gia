<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function master($id){
        $program = Program::find($id);
        return view('landing_page.master',compact('program'));
    }
    public function home($id){
        $program = Program::find($id);
        return view('landing_page.home',compact('program'));
    }
}
