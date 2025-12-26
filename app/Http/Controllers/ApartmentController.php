<?php

namespace App\Http\Controllers;

use App\Services\ApartmentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApartmentController extends Controller
{
    public function __construct(
        protected ApartmentService $apartmentService
    ) {
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


