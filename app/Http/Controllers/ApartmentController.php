<?php

namespace App\Http\Controllers;

use App\Services\ApartmentService;
use App\Services\HeroFilterService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApartmentController extends Controller
{
    public function __construct(
        protected ApartmentService $apartmentService,
        protected HeroFilterService $heroFilterService
    ) {
    }

    /**
     * Display search properties page
     *
     * @param Request $request
     * @return Factory|View|JsonResponse
     */
    public function search(Request $request): Factory|View|JsonResponse
    {
        $filters = [
            'search' => $request->get('search'),
            'property_type' => $request->get('property_type', 'all'),
            'location' => $request->get('location', 'all'),
            'bedrooms' => $request->get('bedrooms', 'all'),
            'status' => $request->get('status', 'all'),
            'price_min' => $request->get('price_min'),
            'price_max' => $request->get('price_max'),
            'min_area' => $request->get('min_area'),
            'max_area' => $request->get('max_area'),
            'sort' => $request->get('sort', 'published_at'),
            'order' => $request->get('order', 'desc'),
        ];

        $data = $this->apartmentService->getApartmentsIndexData($filters);
        
        // Add hero filter data
        $data['heroLocations'] = $this->heroFilterService->getLocations();
        $data['heroPropertyTypes'] = $this->heroFilterService->getPropertyTypes();
        $data['heroBeds'] = $this->heroFilterService->getBeds();

        // Return JSON for AJAX requests
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'html' => view('apartments.partials.apartments-list', [
                    'apartments' => $data['apartments'],
                    'filters' => $data['filters']
                ])->render(),
                'count' => $data['apartments']->total(),
                'from' => $data['apartments']->firstItem(),
                'to' => $data['apartments']->lastItem(),
                'filters' => $filters
            ]);
        }

        return view('search', $data);
    }

    /**
     * Display apartments listing page
     *
     * @param Request $request
     * @return Factory|View|JsonResponse
     */
    public function index(Request $request): Factory|View|JsonResponse
    {
        $filters = [
            'search' => $request->get('search'),
            'property_type' => $request->get('property_type', 'all'),
            'location' => $request->get('location', 'all'),
            'bedrooms' => $request->get('bedrooms', 'all'),
            'status' => $request->get('status', 'all'),
            'sort' => $request->get('sort', 'published_at'),
            'order' => $request->get('order', 'desc'),
        ];

        $data = $this->apartmentService->getApartmentsIndexData($filters);
        
        // Add hero filter data
        $data['heroLocations'] = $this->heroFilterService->getLocations();
        $data['heroPropertyTypes'] = $this->heroFilterService->getPropertyTypes();
        $data['heroBeds'] = $this->heroFilterService->getBeds();

        // Return JSON for AJAX requests
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'html' => view('apartments.partials.apartments-list', [
                    'apartments' => $data['apartments'],
                    'filters' => $data['filters']
                ])->render(),
                'count' => $data['apartments']->total(),
                'filters' => $filters
            ]);
        }

        return view('apartments.index', $data);
    }

    /**
     * Display apartment detail page
     *
     * @param string $slug
     * @return Factory|View
     */
    public function show(string $slug): Factory|View
    {
        $data = $this->apartmentService->getApartmentShowData($slug);

        return view('apartments.show', $data);
    }
}


