@extends('layouts.app')

@section('title', 'Search Properties - PQRentals')

@push('styles')
    @include('home.partials.styles')
    <style>
        /* Hide native select arrows for custom filters on search page */
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
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 pt-32">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
            <li>
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
            </li>
            <li>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
            </li>
            <li class="text-gray-900 dark:text-white font-medium">Search Properties</li>
        </ol>
    </nav>

    <!-- Search Form -->
    <div class="mb-8">
        <form method="GET" action="{{ route('search') }}" id="search-form"
            class="w-full bg-white dark:bg-surface-dark rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-1 w-full">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                        <input name="search" id="search-keyword" value="{{ $filters['search'] ?? '' }}"
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all placeholder-gray-400"
                            placeholder="Keyword" type="text"/>
                    </div>
                    <div class="flex bg-gray-100 dark:bg-gray-800 p-1.5 rounded-full w-full md:w-auto shrink-0">
                        <button
                            id="status-filter-all-search"
                            data-status="all"
                            type="button"
                            class="status-filter-search-btn flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold {{ ($filters['status'] ?? 'all') === 'all' ? 'bg-primary text-white shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-white' }} transition-all">
                            All
                        </button>
                        <button
                            id="status-filter-available-search"
                            data-status="available"
                            type="button"
                            class="status-filter-search-btn flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold {{ ($filters['status'] ?? 'all') === 'available' ? 'bg-primary text-white shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-white' }} transition-colors">
                            Available
                        </button>
                        <input type="hidden" name="status" id="search-status-filter" value="{{ $filters['status'] ?? 'all' }}">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative group">
                        <select name="location" id="search-location-filter"
                            class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroLocations ?? [] as $index => $location)
                                <option value="{{ $index === 0 ? 'all' : $location }}" {{ ($filters['location'] ?? 'all') === ($index === 0 ? 'all' : $location) ? 'selected' : '' }}>{{ $location }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select name="property_type" id="search-property-type-filter"
                            class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroPropertyTypes ?? [] as $index => $type)
                                <option value="{{ $index === 0 ? 'all' : $type }}" {{ ($filters['property_type'] ?? 'all') === ($index === 0 ? 'all' : $type) ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select name="bedrooms" id="search-bedrooms-filter"
                            class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroBeds ?? [] as $index => $bed)
                                <option value="{{ $index === 0 ? 'all' : $bed }}" {{ ($filters['bedrooms'] ?? 'all') === ($index === 0 ? 'all' : $bed) ? 'selected' : '' }}>{{ $bed }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                </div>

                <!-- Advance Search Section (Hidden by default) -->
                <div id="advance-search-section" class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-2 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                    <div class="space-y-6">
                        <!-- Price Range Slider -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                Price Range (Monthly)
                            </label>
                            <div class="relative">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">From <span id="price-min-display" class="text-primary font-bold">${{ number_format($priceRange['min'] ?? 0) }}</span></span>
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">To <span id="price-max-display" class="text-primary font-bold">${{ number_format($priceRange['max'] ?? 2000) }}</span></span>
                                </div>
                                <div class="price-range-container">
                                    <div class="price-range-track"></div>
                                    <div id="price-range-fill"></div>
                                    <input type="range" id="price-min" min="{{ $priceRange['min'] ?? 0 }}" max="{{ $priceRange['max'] ?? 2000 }}" value="{{ $filters['price_min'] ?? ($priceRange['min'] ?? 0) }}" step="10"
                                           class="price-range-input">
                                    <input type="range" id="price-max" min="{{ $priceRange['min'] ?? 0 }}" max="{{ $priceRange['max'] ?? 2000 }}" value="{{ $filters['price_max'] ?? ($priceRange['max'] ?? 2000) }}" step="10"
                                           class="price-range-input">
                                </div>
                                <input type="hidden" id="price-min-value" name="price_min" value="{{ $filters['price_min'] ?? '' }}">
                                <input type="hidden" id="price-max-value" name="price_max" value="{{ $filters['price_max'] ?? '' }}">
                            </div>
                        </div>

                        <!-- Area Range Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="min-area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Min Area (m²)
                                </label>
                                <input type="number" id="min-area" name="min_area" min="0" step="1" value="{{ $filters['min_area'] ?? '' }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                       placeholder="Min area">
                            </div>
                            <div>
                                <label for="max-area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Max Area (m²)
                                </label>
                                <input type="number" id="max-area" name="max_area" min="0" step="1" value="{{ $filters['max_area'] ?? '' }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                       placeholder="Max area">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-2">
                    <a class="inline-flex items-center text-sm font-medium text-primary bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors"
                       href="#">
                        <span class="material-symbols-outlined text-sm mr-2">info</span>
                        Looking for certain features?
                    </a>
                    <div class="flex items-center gap-6 w-full md:w-auto justify-end">
                        <button id="advance-search-toggle" class="hidden md:inline-flex items-center text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-primary transition-colors"
                           type="button">
                            <span class="material-symbols-outlined text-xl mr-1">tune</span>
                            <span id="advance-search-text">Advance Search</span>
                        </button>
                        <button type="submit"
                            class="w-full md:w-40 bg-primary hover:bg-secondary text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-2">Search Properties</h2>
            @php
                $total = $apartments->total();
                $from = $apartments->firstItem();
                $to = $apartments->lastItem();
            @endphp
            <p class="text-slate-500 dark:text-slate-400">
                @if($total > 0)
                    @if($from && $to)
                        {{ $from }} to {{ $to }} out of {{ $total }} {{ Str::plural('property', $total) }}
                    @else
                        {{ $total }} {{ Str::plural('property', $total) }} found
                    @endif
                @else
                    No properties found
                @endif
            </p>
        </div>
        <div class="flex items-center gap-3 w-full md:w-auto">
            <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Sort By:</span>
            <div class="relative group flex-1 md:flex-none">
                <form method="GET" action="{{ route('search') }}" id="sort-form">
                    @foreach($filters as $key => $value)
                        @if($key !== 'sort' && $key !== 'order' && $value && $value !== 'all')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <select name="sort" id="sort-select" class="apartment-filter-select appearance-none pl-4 pr-10 py-2 bg-white dark:bg-card-dark border border-gray-200 dark:border-slate-700 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer shadow-sm w-full">
                        <option value="published_at" {{ ($filters['sort'] ?? 'published_at') === 'published_at' ? 'selected' : '' }}>Date - New to Old</option>
                        <option value="price_low" {{ ($filters['sort'] ?? '') === 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ ($filters['sort'] ?? '') === 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </form>
                <span class="material-icons-round absolute right-2 top-1/2 -translate-y-1/2 text-primary pointer-events-none text-base group-hover:scale-110 transition-transform">expand_more</span>
            </div>
            <div class="flex items-center gap-2 border border-gray-200 dark:border-slate-700 rounded-lg p-1">
                <button id="view-list" class="view-toggle-btn p-2 rounded {{ request()->get('view', 'list') === 'list' ? 'bg-primary text-white' : 'text-gray-500 dark:text-gray-400 hover:text-primary' }} transition-colors" data-view="list" title="List View">
                    <span class="material-symbols-outlined text-xl">view_list</span>
                </button>
                <button id="view-grid" class="view-toggle-btn p-2 rounded {{ request()->get('view', 'list') === 'grid' ? 'bg-primary text-white' : 'text-gray-500 dark:text-gray-400 hover:text-primary' }} transition-colors" data-view="grid" title="Grid View">
                    <span class="material-symbols-outlined text-xl">grid_view</span>
                </button>
            </div>
        </div>
    </div>
    <div id="apartments-container" class="{{ request()->get('view', 'list') === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-6' }}">
        @include('apartments.partials.apartments-list', ['apartments' => $apartments, 'filters' => $filters])
    </div>
</main>
@endsection

@push('scripts')
@include('home.partials.scripts')
<script>
    // Status Filter Buttons on Search Page
    (function() {
        const statusFilterButtons = document.querySelectorAll('.status-filter-search-btn');
        const statusHiddenInput = document.getElementById('search-status-filter');
        
        if (statusFilterButtons.length > 0) {
            statusFilterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active state from all buttons
                    statusFilterButtons.forEach(btn => {
                        btn.classList.remove('bg-primary', 'text-white', 'shadow-sm');
                        btn.classList.add('text-gray-500', 'dark:text-gray-400');
                    });
                    
                    // Add active state to clicked button
                    this.classList.remove('text-gray-500', 'dark:text-gray-400');
                    this.classList.add('bg-primary', 'text-white', 'shadow-sm');
                    
                    // Update hidden input with status value
                    const status = this.getAttribute('data-status');
                    if (statusHiddenInput) {
                        statusHiddenInput.value = status;
                    }
                });
            });
        }
    })();

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
                price_min: urlParams.get('price_min') || '',
                price_max: urlParams.get('price_max') || '',
                min_area: urlParams.get('min_area') || '',
                max_area: urlParams.get('max_area') || '',
                sort: sortValue
            };
            
            // Build query string
            const queryString = Object.keys(filters)
                .filter(key => filters[key] && filters[key] !== 'all')
                .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(filters[key])}`)
                .join('&');
            
            const url = '{{ route("search") }}' + (queryString ? '?' + queryString : '');
            
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
                        const total = data.count;
                        if (total > 0) {
                            // Try to get from/to from pagination data if available
                            const from = data.from || 0;
                            const to = data.to || 0;
                            if (from && to) {
                                const plural = total === 1 ? 'property' : 'properties';
                                countText.textContent = `${from} to ${to} out of ${total} ${plural}`;
                            } else {
                                const plural = total === 1 ? 'property' : 'properties';
                                countText.textContent = `${total} ${plural} found`;
                            }
                        } else {
                            countText.textContent = 'No properties found';
                        }
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

    // List/Grid View Toggle
    (function() {
        const viewToggleButtons = document.querySelectorAll('.view-toggle-btn');
        const apartmentsContainer = document.getElementById('apartments-container');
        const currentView = new URLSearchParams(window.location.search).get('view') || 'list';
        
        viewToggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                
                // Update button states
                viewToggleButtons.forEach(btn => {
                    if (btn.getAttribute('data-view') === view) {
                        btn.classList.remove('text-gray-500', 'dark:text-gray-400');
                        btn.classList.add('bg-primary', 'text-white');
                    } else {
                        btn.classList.remove('bg-primary', 'text-white');
                        btn.classList.add('text-gray-500', 'dark:text-gray-400');
                    }
                });
                
                // Update container class
                if (apartmentsContainer) {
                    if (view === 'grid') {
                        apartmentsContainer.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
                    } else {
                        apartmentsContainer.className = 'space-y-6';
                    }
                }
                
                // Update URL without reload
                const url = new URL(window.location);
                url.searchParams.set('view', view);
                window.history.pushState({}, '', url);
            });
        });
    })();
</script>
@endpush

