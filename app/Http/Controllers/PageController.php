<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Tùy template để render view khác nhau, mặc định dùng view "page"
        $view = match ($page->template) {
            default => 'page',
        };

        return view($view, compact('page'));
    }
}



