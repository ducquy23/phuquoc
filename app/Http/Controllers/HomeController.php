<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::where('is_published', true)
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        return view('home', [
            'latestPosts' => $latestPosts,
        ]);
    }
}


