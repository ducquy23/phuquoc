<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Motorbike;
use App\Models\Option;
use App\Models\SeoPage;
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
        $page = SeoPage::getBySlug('long-term-rentals') ?? new \stdClass();

        $featuredApartments = Apartment::with(['ward', 'heroFilterPropertyType', 'heroFilterBed'])
            ->where('is_featured', true)
            ->where('is_published', true)
            ->where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $relatedMotorbikes = Motorbike::published()
            ->available()
            ->featured()
            ->with('featuredImage')
            ->limit(3)
            ->get();

        $heroLocations = $this->heroFilterService->getLocations();
        $heroPropertyTypes = $this->heroFilterService->getPropertyTypes();
        $heroBeds = $this->heroFilterService->getBeds();

        $contactAgent = [
            'name' => Option::get('contact_agent_name', 'Need Local Help?'),
            'title' => Option::get('contact_agent_title', 'Rental Specialist'),
            'bio' => Option::get('contact_agent_bio', 'Our local agents speak English and can help you negotiate the best long-term deals.'),
            'photo' => Option::get('contact_agent_photo'),
            'zalo_whatsapp' => Option::get('contact_zalo_whatsapp'),
        ];

        return view('seo.long-term-rentals', [
            'page' => $page,
            'featuredApartments' => $featuredApartments,
            'relatedMotorbikes' => $relatedMotorbikes,
            'heroLocations' => $heroLocations,
            'heroPropertyTypes' => $heroPropertyTypes,
            'heroBeds' => $heroBeds,
            'contactAgent' => $contactAgent,
        ]);
    }

    public function monthly(): Factory|View
    {
        $page = SeoPage::getBySlug('monthly-rentals') ?? new \stdClass();

        return view('seo.monthly-rentals', [
            'page' => $page,
        ]);
    }

    public function apartmentsForRent(): Factory|View
    {
        $page = SeoPage::getBySlug('phu-quoc-apartments-for-rent') ?? new \stdClass();

        return view('seo.phu-quoc-apartments-for-rent', [
            'page' => $page,
        ]);
    }
}
