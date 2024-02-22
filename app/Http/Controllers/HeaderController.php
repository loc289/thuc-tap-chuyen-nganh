<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HeaderController extends Controller
{
public function getNavigation()
{
return View::make('templates.header');
}
}