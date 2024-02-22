<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FooterController extends Controller
{
    public function getFooter()
    {
        return View::make('templates.footer');
    }
}