<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }

    public function booking(){
        return view('web.booking');
    }
    public function packages(){
        return view('web.packages');
    }

    public function memories(){
        return view('web.memories');
    }

    public function conatctUs(){
        return view('web.contactUs');
    }



}
