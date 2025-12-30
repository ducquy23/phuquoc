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

        /* Price Range Slider Container */
        .price-range-container {
            position: relative;
            height: 8px;
        }

        .price-range-track {
            position: absolute;
            width: 100%;
            height: 8px;
            background: #e5e7eb;
            border-radius: 4px;
            top: 0;
            left: 0;
        }

        .dark .price-range-track {
            background: #374151;
        }

        /* Price Range Slider Styles */
        .price-range-input {
            position: absolute;
            width: 100%;
            height: 8px;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            background: transparent;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            pointer-events: none;
        }

        .price-range-input::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 3px solid white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: all;
            position: relative;
            z-index: 3;
            margin-top: -6px;
        }

        .price-range-input::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 3px solid white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: all;
            position: relative;
            z-index: 3;
        }

        .price-range-input::-webkit-slider-runnable-track {
            height: 8px;
            background: transparent;
            border: none;
        }

        .price-range-input::-moz-range-track {
            height: 8px;
            background: transparent;
            border: none;
        }

        .price-range-input::-ms-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 3px solid white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .price-range-input::-ms-track {
            height: 8px;
            background: transparent;
            border: none;
            color: transparent;
        }

        .price-range-input::-ms-fill-lower,
        .price-range-input::-ms-fill-upper {
            background: transparent;
        }

        /* Price Range Fill Bar */
        #price-range-fill {
            position: absolute;
            height: 8px;
            background: #3b82f6;
            border-radius: 4px;
            top: 0;
            z-index: 1;
            pointer-events: none;
        }

        /* Advance Search Animation */
        #advance-search-section {
            transition: max-height 0.4s ease-in-out, opacity 0.3s ease-in-out, padding-top 0.3s ease-in-out, margin-top 0.3s ease-in-out;
        }

        #advance-search-section.show {
            max-height: 500px;
            opacity: 1;
            padding-top: 1.5rem;
            margin-top: 0.5rem;
        }

        #advance-search-section:not(.show) {
            max-height: 0;
            opacity: 0;
            padding-top: 0;
            margin-top: 0;
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
        <form method="GET" action="{{ route('apartments.index') }}" id="apartment-search-form"
            class="w-full max-w-5xl bg-white dark:bg-surface-dark rounded-[2rem] shadow-float p-8 border border-gray-100 dark:border-gray-700/50 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95 mx-auto">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-1 w-full">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                        <input name="search" id="apartment-search-keyword" value="{{ $filters['search'] ?? '' }}"
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all placeholder-gray-400"
                            placeholder="Keyword" type="text"/>
                    </div>
                    <div class="flex bg-gray-100 dark:bg-gray-800 p-1.5 rounded-full w-full md:w-auto shrink-0">
                        <button
                            id="status-filter-all-page"
                            data-status="all"
                            type="button"
                            class="status-filter-page-btn flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold {{ ($filters['status'] ?? 'all') === 'all' ? 'bg-primary text-white shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-white' }} transition-all">
                            All
                        </button>
                        <button
                            id="status-filter-available-page"
                            data-status="available"
                            type="button"
                            class="status-filter-page-btn flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold {{ ($filters['status'] ?? 'all') === 'available' ? 'bg-primary text-white shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-white' }} transition-colors">
                            Available
                        </button>
                        <input type="hidden" name="status" id="apartment-status-filter" value="{{ $filters['status'] ?? 'all' }}">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative group">
                        <select name="location" id="apartment-location-filter"
                            class="apartment-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroLocations ?? [] as $index => $location)
                                <option value="{{ $index === 0 ? 'all' : $location }}" {{ ($filters['location'] ?? 'all') === ($index === 0 ? 'all' : $location) ? 'selected' : '' }}>{{ $location }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select name="property_type" id="apartment-property-type-filter"
                            class="apartment-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroPropertyTypes ?? [] as $index => $type)
                                <option value="{{ $index === 0 ? 'all' : $type }}" {{ ($filters['property_type'] ?? 'all') === ($index === 0 ? 'all' : $type) ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select name="bedrooms" id="apartment-bedrooms-filter"
                            class="apartment-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
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
                                <input type="number" id="min-area" name="min_area" value="{{ $filters['min_area'] ?? '' }}" min="0" step="1"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                       placeholder="Min area">
                            </div>
                            <div>
                                <label for="max-area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Max Area (m²)
                                </label>
                                <input type="number" id="max-area" name="max_area" value="{{ $filters['max_area'] ?? '' }}" min="0" step="1"
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
</div>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 mt-5">
    <!-- SEO Links Section -->
    <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-2xl border border-blue-100 dark:border-blue-800">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Looking for specific rental types?</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Explore our detailed guides for different rental options</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('seo.long-term-rentals') }}" class="px-4 py-2 bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-300 rounded-lg text-sm font-medium hover:bg-primary hover:text-white dark:hover:bg-primary transition-colors border border-slate-200 dark:border-slate-700">
                    Long-Term Rentals
                </a>
                <a href="{{ route('seo.monthly-rentals') }}" class="px-4 py-2 bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-300 rounded-lg text-sm font-medium hover:bg-primary hover:text-white dark:hover:bg-primary transition-colors border border-slate-200 dark:border-slate-700">
                    Monthly Rentals
                </a>
                <a href="{{ route('seo.phu-quoc-apartments-for-rent') }}" class="px-4 py-2 bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-300 rounded-lg text-sm font-medium hover:bg-primary hover:text-white dark:hover:bg-primary transition-colors border border-slate-200 dark:border-slate-700">
                    Apartments Guide
                </a>
            </div>
        </div>
    </div>
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

    // Status Filter Buttons on Apartments Page
    (function() {
        const statusFilterButtons = document.querySelectorAll('.status-filter-page-btn');
        const statusHiddenInput = document.getElementById('apartment-status-filter');
        
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

    // Advance Search Toggle
    (function() {
        const advanceSearchToggle = document.getElementById('advance-search-toggle');
        const advanceSearchSection = document.getElementById('advance-search-section');
        const advanceSearchText = document.getElementById('advance-search-text');
        
        if (advanceSearchToggle && advanceSearchSection) {
            advanceSearchToggle.addEventListener('click', function() {
                const isShown = advanceSearchSection.classList.contains('show');
                
                if (isShown) {
                    advanceSearchSection.classList.remove('show');
                    advanceSearchText.textContent = 'Advance Search';
                    advanceSearchToggle.querySelector('.material-symbols-outlined').textContent = 'tune';
                } else {
                    advanceSearchSection.classList.add('show');
                    advanceSearchText.textContent = 'Hide Advance Search';
                    advanceSearchToggle.querySelector('.material-symbols-outlined').textContent = 'tune';
                }
            });
        }

        // Price Range Slider
        const priceMin = document.getElementById('price-min');
        const priceMax = document.getElementById('price-max');
        const priceMinDisplay = document.getElementById('price-min-display');
        const priceMaxDisplay = document.getElementById('price-max-display');
        const priceRangeFill = document.getElementById('price-range-fill');
        const priceMinValue = document.getElementById('price-min-value');
        const priceMaxValue = document.getElementById('price-max-value');

        if (priceMin && priceMax && priceMinDisplay && priceMaxDisplay && priceRangeFill) {
            function updatePriceRange() {
                let min = parseInt(priceMin.value);
                let max = parseInt(priceMax.value);
                const minLimit = parseInt(priceMin.min);
                const maxLimit = parseInt(priceMax.max);
                
                // Ensure min doesn't exceed max
                if (min > max) {
                    const temp = min;
                    min = max;
                    max = temp;
                    priceMin.value = min;
                    priceMax.value = max;
                }
                
                // Ensure max doesn't go below min
                if (max < min) {
                    const temp = max;
                    max = min;
                    min = temp;
                    priceMin.value = min;
                    priceMax.value = max;
                }
                
                // Update displays with formatting
                priceMinDisplay.textContent = '$' + min.toLocaleString();
                priceMaxDisplay.textContent = '$' + max.toLocaleString();
                
                // Update hidden inputs
                if (priceMinValue) priceMinValue.value = min;
                if (priceMaxValue) priceMaxValue.value = max;
                
                // Update fill bar position
                const range = maxLimit - minLimit;
                if (range > 0) {
                    const minPercent = ((min - minLimit) / range) * 100;
                    const maxPercent = ((max - minLimit) / range) * 100;
                    
                    const leftPercent = Math.max(0, Math.min(100, minPercent));
                    const rightPercent = Math.max(0, Math.min(100, maxPercent));
                    const widthPercent = Math.max(0, rightPercent - leftPercent);
                    
                    priceRangeFill.style.left = leftPercent + '%';
                    priceRangeFill.style.width = widthPercent + '%';
                }
            }

            priceMin.style.pointerEvents = 'all';
            priceMax.style.pointerEvents = 'all';
            
            function updateZIndex() {
                const minVal = parseInt(priceMin.value);
                const maxVal = parseInt(priceMax.value);
                
                if (minVal <= maxVal) {
                    priceMin.style.zIndex = '2';
                    priceMax.style.zIndex = '3';
                } else {
                    priceMin.style.zIndex = '3';
                    priceMax.style.zIndex = '2';
                }
            }

            priceMin.addEventListener('input', function() {
                updatePriceRange();
                updateZIndex();
            });
            
            priceMax.addEventListener('input', function() {
                updatePriceRange();
                updateZIndex();
            });
            
            // Initialize
            updatePriceRange();
            updateZIndex();
        }

        // Handle form submission - ensure price values are set
        const apartmentSearchForm = document.getElementById('apartment-search-form');
        if (apartmentSearchForm) {
            apartmentSearchForm.addEventListener('submit', function(e) {
                if (priceMinValue && priceMaxValue) {
                    priceMinValue.value = priceMin ? priceMin.value : '';
                    priceMaxValue.value = priceMax ? priceMax.value : '';
                }
            });
        }
    })();
</script>
@endpush

