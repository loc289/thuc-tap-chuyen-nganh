<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function homepage()
    {
        return view('pages.main');
    }

    public function favorite()
    {
        return view('pages.favorite');
    }

    public function trending()
    {
        return view('pages.trending');
    }

    public function comming()
    {
        return view('pages.comming');
    }

    public function movie()
    {
        return view('pages.movie');
    }

    public function watch()
    {
        return view('pages.watch');
    }
}
