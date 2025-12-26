@extends('layouts.app')

@section('title', 'Search Properties - PQRentals')

@push('styles')
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

