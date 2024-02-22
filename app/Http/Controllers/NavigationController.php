<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NavigationController extends Controller
{
public function getNavigation()
{
return View::make('templates.navigation');
}
}