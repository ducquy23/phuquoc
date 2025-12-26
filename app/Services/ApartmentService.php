<?php

namespace App\Services;

use App\Models\Apartment;
use App\Models\Option;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApartmentService
{
    /**
     * Get published apartments with optional filters
     *
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPublishedApartments(array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $query = Apartment::query()
            ->where('is_published', true);

        // Filter by property type
        if (!empty($filters['property_type']) && $filters['property_type'] !== 'all') {
            $query->where('property_type', $filters['property_type']);
        }

        // Filter by location (district)
        if (!empty($filters['location']) && $filters['location'] !== 'all') {
            $query->where('district', $filters['location']);
        }

        // Filter by bedrooms
        if (!empty($filters['bedrooms']) && $filters['bedrooms'] !== 'all') {
            if ($filters['bedrooms'] === '3+') {
                $query->where('bedrooms', '>=', 3);
            } else {
                $query->where('bedrooms', $filters['bedrooms']);
            }
        }

        // Filter by status
        if (!empty($filters['status']) && $filters['status'] !== 'all') {
            $query->where('status', $filters['status']);
        }

        // Search functionality
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        // Sort
        $sortBy = $filters['sort'] ?? 'published_at';
        $sortOrder = $filters['order'] ?? 'desc';

        if ($sortBy === 'price_low') {
            // Sort by price ascending, then newest
            $query->orderBy('price_monthly', 'asc')
                  ->orderBy('published_at', 'desc');
        } elseif ($sortBy === 'price_high') {
            // Sort by price descending, then newest
            $query->orderBy('price_monthly', 'desc')
                  ->orderBy('published_at', 'desc');
        } else {
            // Default sort (newest listed)
            $query->orderBy($sortBy, $sortOrder);
        }

        return $query->paginate($perPage);
    }

    /**
     * Get apartment by slug
     *
     * @param string $slug
     * @return Apartment
     * @throws ModelNotFoundException
     */
    public function getApartmentBySlug(string $slug): Apartment
    {
        return Apartment::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
    }

    /**
     * Get similar apartments
     *
     * @param Apartment $apartment
     * @param int $limit
     * @return Collection
     */
    public function getSimilarApartments(Apartment $apartment, int $limit = 3): Collection
    {
        $query = Apartment::where('is_published', true)
            ->where('id', '!=', $apartment->id)
            ->where('status', 'available');

        // Try to match by property type first
        if ($apartment->hero_filter_property_type_id) {
            $query->where('hero_filter_property_type_id', $apartment->hero_filter_property_type_id);
        }

        // If not enough results, get any available apartments
        $similar = $query->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();

        // If we don't have enough, fill with other available apartments
        if ($similar->count() < $limit) {
            $additional = Apartment::where('is_published', true)
                ->where('id', '!=', $apartment->id)
                ->whereNotIn('id', $similar->pluck('id'))
                ->where('status', 'available')
                ->orderBy('published_at', 'desc')
                ->limit($limit - $similar->count())
                ->get();

            $similar = $similar->merge($additional);
        }

        return $similar->take($limit);
    }

    /**
     * Get apartments index data
     *
     * @param array $filters
     * @return array
     */
    public function getApartmentsIndexData(array $filters = []): array
    {
        $apartments = $this->getPublishedApartments($filters);

        return [
            'apartments' => $apartments,
            'filters' => $filters,
            'totalCount' => $apartments->total(),
        ];
    }

    /**
     * Get apartment show data
     *
     * @param string $slug
     * @return array
     */
    public function getApartmentShowData(string $slug): array
    {
        $apartment = $this->getApartmentBySlug($slug);
        $similarApartments = $this->getSimilarApartments($apartment);

        // Get contact options
        $agentPhotoOption = Option::get('contact_agent_photo', '');
        $agentPhoto = $agentPhotoOption ? asset('storage/' . $agentPhotoOption) : '';

        $options = [
            'agent_name' => Option::get('contact_agent_name', 'Vu Van Hai'),
            'agent_title' => Option::get('contact_agent_title', 'Your friendly neighborhood buddy'),
            'agent_bio' => Option::get('contact_agent_bio', ''),
            'agent_photo' => $agentPhoto,
            'contact_email' => Option::get('contact_email', 'vnha231@gmail.com'),
            'contact_phone' => Option::get('contact_phone', '+84 9024 07024'),
            'contact_location' => Option::get('contact_location', 'Sunset Town, Phu Quoc, Vietnam'),
            'social_twitter' => Option::get('contact_social_twitter', '#'),
            'social_facebook' => Option::get('contact_social_facebook', '#'),
            'social_instagram' => Option::get('contact_social_instagram', '#'),
            'office_hours_weekdays' => Option::get('contact_office_hours_weekdays', '9:00 AM - 6:00 PM'),
            'office_hours_saturday' => Option::get('contact_office_hours_saturday', '9:00 AM - 4:00 PM'),
            'office_hours_sunday' => Option::get('contact_office_hours_sunday', 'Closed'),
        ];

        return [
            'apartment' => $apartment,
            'similarApartments' => $similarApartments,
            'options' => $options,
        ];
    }
}

