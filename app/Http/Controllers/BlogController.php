<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    public function index()
    {
        // Static blog listing page
        return view('blog.index');
    }

    public function show()
    {
        // Static blog detail page (Sunset Town article)
        return view('blog.show');
    }
}


