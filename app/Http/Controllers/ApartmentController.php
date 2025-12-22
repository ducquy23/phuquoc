<?php

namespace App\Http\Controllers;

class ApartmentController extends Controller
{
    public function index()
    {
        // Static listing page
        return view('apartments.index');
    }

    public function show()
    {
        // Static sample detail page
        return view('apartments.show');
    }
}


