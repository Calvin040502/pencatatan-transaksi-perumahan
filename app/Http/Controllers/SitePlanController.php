<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitePlanController extends Controller
{
    public function index()
    {
        return view('site-plan.index');
    }
}
