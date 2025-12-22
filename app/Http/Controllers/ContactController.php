<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        // Static contact page
        return view('contact');
    }
}


