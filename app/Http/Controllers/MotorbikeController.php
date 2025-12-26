<?php

namespace App\Http\Controllers;

use App\Models\Motorbike;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MotorbikeController extends Controller
{
    /**
     * Display motorbikes listing page
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request): Factory|View
    {
        $query = Motorbike::query()
            ->with('featuredImage')
            ->published();

        // Filter by status
        $status = $request->get('status', 'all');
        if ($status !== 'all') {
            $query->where('status', $status);
        } else {
            $query->available();
        }

        // Search
        $search = $request->get('search');
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('engine_size', 'like', '%' . $search . '%');
            });
        }

        // Filter by type
        $type = $request->get('type', 'all');
        if ($type !== 'all') {
            $query->where('type', $type);
        }

        // Sort
        $sort = $request->get('sort', 'sort_order');
        $order = $request->get('order', 'asc');
        
        if ($sort === 'price') {
            $query->orderBy('price_daily', $order);
        } elseif ($sort === 'name') {
            $query->orderBy('name', $order);
        } else {
            $query->ordered();
        }

        $motorbikes = $query->paginate(12);

        $filters = [
            'search' => $search,
            'status' => $status,
            'type' => $type,
            'sort' => $sort,
            'order' => $order,
        ];

        return view('motorbikes.index', [
            'motorbikes' => $motorbikes,
            'filters' => $filters,
        ]);
    }

    /**
     * Display motorbike detail page
     *
     * @param string $slug
     * @return Factory|View
     */
    public function show(string $slug): Factory|View
    {
        $motorbike = Motorbike::where('slug', $slug)
            ->where('is_published', true)
            ->with('featuredImage')
            ->firstOrFail();

        // Get similar motorbikes (same type or different)
        $similarMotorbikes = Motorbike::where('is_published', true)
            ->where('id', '!=', $motorbike->id)
            ->where('status', 'available')
            ->with('featuredImage')
            ->limit(4)
            ->get();

        // If not enough, fill with other available motorbikes
        if ($similarMotorbikes->count() < 4) {
            $additional = Motorbike::where('is_published', true)
                ->where('id', '!=', $motorbike->id)
                ->whereNotIn('id', $similarMotorbikes->pluck('id'))
                ->where('status', 'available')
                ->with('featuredImage')
                ->limit(4 - $similarMotorbikes->count())
                ->get();
            $similarMotorbikes = $similarMotorbikes->merge($additional);
        }

        return view('motorbikes.show', [
            'motorbike' => $motorbike,
            'similarMotorbikes' => $similarMotorbikes->take(4),
        ]);
    }
}


