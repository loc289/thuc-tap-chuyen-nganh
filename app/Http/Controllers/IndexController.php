<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homepage(){
        return view('pages.main');
    }
    public function favorite(){
        return view('pages.favorite');
    }
}