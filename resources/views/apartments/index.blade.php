@extends('layouts.app')

@section('title', 'PQRentals - Apartment Listings')

@push('styles')
    <style>
        /* Hide native select arrows for custom filters on apartments page */
        .apartment-filter-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
        }
        .apartment-filter-select::-ms-expand {
            display: none;
        }
    </style>
@endpush

@section('content')
<div class="relative pt-32 pb-12 lg:pt-40 lg:pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Phu Quoc ocean view through window" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBS9zEx_i7sWV_cy7etH0N8N-neo42QqqZyEeHscpX9AHBiPFo5xh883AS9BjNw5Ab21qHZwWbZqKM-PHPCBSc0jxdCxhQmP5L73pvfmwnydnkyBUqsPHr2ftNLw4PpbKTBwlJCg3Y92pyDS1QKPCFiA_iNzBRVpDNJcbdP5vcTew7fzhPVQxHt4zIUuW6hRZv6EE6sa9J9TGXp7fnl_Ay47mUoRj-GT6AU-Ur9bXKl3WLjzQT1cYkNsML5r0cRSeurHAHbzNhVcvTu"/>
        <div class="absolute inset-0 bg-gradient-to-b from-white/90 via-white/40 to-white/90 dark:from-background-dark/95 dark:via-background-dark/60 dark:to-background-dark/95"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 dark:text-white mb-6 leading-tight">
            Discover Your Perfect <span class="text-primary">Phu Quoc</span><br class="hidden md:block"/> Apartment for Rent
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300 mb-10 max-w-2xl mx-auto font-medium">
            Find the best long-term and short-term rentals with stunning ocean views, modern amenities, and prime locations.
        </p>
        <form method="GET" action="{{ route('apartments.index') }}" class="bg-white dark:bg-card-dark rounded-3xl shadow-xl dark:shadow-2xl dark:shadow-black/50 p-6 max-w-5xl mx-auto border border-gray-100 dark:border-gray-700 backdrop-blur-sm">
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <div class="relative flex-grow">
                    <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input name="search" value="{{ $filters['search'] ?? '' }}" class="w-full pl-12 pr-4 py-3 bg-gray-50 dark:bg-slate-800 border-none rounded-xl text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-primary transition-all" placeholder="Search by keyword..." type="text"/>
                </div>
                <div class="flex bg-gray-100 dark:bg-slate-800 p-1 rounded-xl self-start md:self-auto">
                    <button type="button" onclick="window.location.href='{{ route('apartments.index') }}'" class="px-6 py-2 rounded-lg {{ ($filters['status'] ?? 'all') === 'all' ? 'bg-primary text-white' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }} text-sm font-semibold shadow-sm transition-all">All</button>
                    <button type="button" onclick="window.location.href='{{ route('apartments.index', ['status' => 'available']) }}'" class="px-6 py-2 rounded-lg {{ ($filters['status'] ?? 'all') === 'available' ? 'bg-primary text-white' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }} text-sm font-medium transition-all">Available</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="relative group">
                    <select name="location" class="apartment-filter-select w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option value="all" {{ ($filters['location'] ?? 'all') === 'all' ? 'selected' : '' }}>All Main Locations</option>
                        <option value="Sunset Town" {{ ($filters['location'] ?? '') === 'Sunset Town' ? 'selected' : '' }}>Sunset Town</option>
                        <option value="An Thoi" {{ ($filters['location'] ?? '') === 'An Thoi' ? 'selected' : '' }}>An Thoi</option>
                        <option value="Duong Dong" {{ ($filters['location'] ?? '') === 'Duong Dong' ? 'selected' : '' }}>Duong Dong</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                </div>
                <div class="relative group">
                    <select name="property_type" class="apartment-filter-select w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option value="all" {{ ($filters['property_type'] ?? 'all') === 'all' ? 'selected' : '' }}>All Types</option>
                        <option value="apartment" {{ ($filters['property_type'] ?? '') === 'apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="villa" {{ ($filters['property_type'] ?? '') === 'villa' ? 'selected' : '' }}>Villa</option>
                        <option value="studio" {{ ($filters['property_type'] ?? '') === 'studio' ? 'selected' : '' }}>Studio</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                </div>
                <div class="relative group">
                    <select name="bedrooms" class="apartment-filter-select w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option value="all" {{ ($filters['bedrooms'] ?? 'all') === 'all' ? 'selected' : '' }}>All Beds</option>
                        <option value="1" {{ ($filters['bedrooms'] ?? '') === '1' ? 'selected' : '' }}>1 Bed</option>
                        <option value="2" {{ ($filters['bedrooms'] ?? '') === '2' ? 'selected' : '' }}>2 Beds</option>
                        <option value="3+" {{ ($filters['bedrooms'] ?? '') === '3+' ? 'selected' : '' }}>3+ Beds</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-sky-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
                    <span class="material-icons-round">search</span>
                    Search
                </button>
            </div>
        </form>
    </div>
</div>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 mt-5">
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Available Properties</h2>
            <p class="text-slate-500 dark:text-slate-400">Showing {{ $apartments->total() }} {{ Str::plural('property', $apartments->total()) }} in Phu Quoc</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Sort by:</span>
            <div class="relative group">
                <form method="GET" action="{{ route('apartments.index') }}" id="sort-form">
                    @foreach($filters as $key => $value)
                        @if($key !== 'sort' && $key !== 'order' && $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <select name="sort" id="sort-select" class="apartment-filter-select appearance-none pl-4 pr-10 py-2 bg-white dark:bg-card-dark border border-gray-200 dark:border-slate-700 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer shadow-sm">
                        <option value="published_at" {{ ($filters['sort'] ?? 'published_at') === 'published_at' ? 'selected' : '' }}>Newest Listed</option>
                        <option value="price_low" {{ ($filters['sort'] ?? '') === 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ ($filters['sort'] ?? '') === 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </form>
                <span class="material-icons-round absolute right-2 top-1/2 -translate-y-1/2 text-primary pointer-events-none text-base group-hover:scale-110 transition-transform">expand_more</span>
            </div>
        </div>
    </div>
    <div id="apartments-container">
        @include('apartments.partials.apartments-list', ['apartments' => $apartments, 'filters' => $filters])
    </div>
</main>
@endsection

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
</style>
@endpush

@push('scripts')
<script>
    // AJAX Sort Handler
    const sortSelect = document.getElementById('sort-select');
    const apartmentsContainer = document.getElementById('apartments-container');
    const countText = document.querySelector('p.text-slate-500.dark\\:text-slate-400');
    
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortValue = this.value;
            
            // Get current filters from URL
            const urlParams = new URLSearchParams(window.location.search);
            const filters = {
                search: urlParams.get('search') || '',
                property_type: urlParams.get('property_type') || 'all',
                location: urlParams.get('location') || 'all',
                bedrooms: urlParams.get('bedrooms') || 'all',
                status: urlParams.get('status') || 'all',
                sort: sortValue
            };
            
            // Build query string
            const queryString = Object.keys(filters)
                .filter(key => filters[key] && filters[key] !== 'all')
                .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(filters[key])}`)
                .join('&');
            
            const url = '{{ route("apartments.index") }}' + (queryString ? '?' + queryString : '');
            
            // Show loading state
            apartmentsContainer.style.opacity = '0.5';
            apartmentsContainer.style.pointerEvents = 'none';
            
            // Update URL without reload
            window.history.pushState({}, '', url);
            
            // Fetch apartments via AJAX
            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.html) {
                    // Update apartments container
                    apartmentsContainer.innerHTML = data.html;
                    
                    // Update count text
                    if (countText && data.count !== undefined) {
                        const plural = data.count === 1 ? 'property' : 'properties';
                        countText.textContent = `Showing ${data.count} ${plural} in Phu Quoc`;
                    }
                    
                    // Scroll to top of apartments section smoothly
                    apartmentsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            })
            .catch(error => {
                console.error('Error loading apartments:', error);
                // Fallback to page reload
                window.location.href = url;
            })
            .finally(() => {
                // Remove loading state
                apartmentsContainer.style.opacity = '1';
                apartmentsContainer.style.pointerEvents = 'auto';
            });
        });
    }
</script>
@endpush

