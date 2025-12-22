<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Static homepage view (data cứng)
        return view('home');
    }
}


