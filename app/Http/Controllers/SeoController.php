<?php

namespace App\Http\Controllers;

use App\Services\HeroFilterService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SeoController extends Controller
{
    public function __construct(
        protected HeroFilterService $heroFilterService
    ) {}

    public function longTerm(): Factory|View
    {
        $page = new \stdClass();

        return view('seo.long-term-rentals', [
            'page' => $page,
        ]);
    }

    public function monthly(): Factory|View
    {
        $page = new \stdClass();

        return view('seo.monthly-rentals', [
            'page' => $page,
        ]);
    }

    public function apartmentsForRent(): Factory|View
    {
        $page = new \stdClass();

        return view('seo.phu-quoc-apartments-for-rent', [
            'page' => $page,
        ]);
    }
}


