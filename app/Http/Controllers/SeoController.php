<?php

namespace App\Http\Controllers;

class SeoController extends Controller
{
    public function longTerm()
    {
        // SEO page: long-term rentals (static content)
        return view('seo.long-term-rentals');
    }

    public function monthly()
    {
        // SEO page: monthly rentals (static content)
        return view('seo.monthly-rentals');
    }

    public function apartmentsForRent()
    {
        // SEO page: generic Phu Quoc apartments for rent (static content)
        return view('seo.phu-quoc-apartments-for-rent');
    }
}


