@extends('layouts.app')

@section('title', 'Phu Quoc Apartment Rentals')

@push('styles')
    <style>
        /* Hide native select arrow for custom filter dropdowns on home hero */
        .home-filter-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
        }
        .home-filter-select::-ms-expand {
            display: none;
        }
    </style>
@endpush

@section('content')
<section class="relative min-h-[90vh] flex flex-col pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Beautiful sea view through window" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzZtWeCVkfPUNzvMLQxfEmP3FzQBdYERRVtMTrY-jSx1jIDrEBpA9YhKwaAF7zJ3pdJ8fIqDLyLVfjpB6heImm6HToq8Ng8uTFJ6h8wOLE2M1H1CGb-5Y936YQctkhSiQZHlDUEMtKm_DBp7j-Mswog0o0SxvVqh3cFjbQjaupPLvR0VLLUgDxhKvWv0SL7fTXeWU4SHm-vLftMXMzmzgOWPzhk8sbHU-lxI3igxY8_0Ys7YUYFQ-PJdLl-Z1LAYQDwwCfwLc2-V7I"/>
        <div class="absolute inset-0 bg-white/20 dark:bg-black/40"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex-1 flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-6xl lg:text-[4rem] font-bold text-gray-900 dark:text-white mb-6 leading-tight tracking-tight drop-shadow-sm">
            Discover Your Perfect <span class="text-primary">Phu Quoc</span> <br class="hidden md:block"/> Apartment for Rent
        </h1>
        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-200 max-w-2xl mx-auto mb-12 font-medium drop-shadow-sm">
            Find the best long-term and short-term rentals with stunning ocean views.
        </p>
        <div class="w-full max-w-5xl bg-white dark:bg-surface-dark rounded-[2rem] shadow-float p-8 border border-gray-100 dark:border-gray-700/50 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-1 w-full">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                        <input class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all placeholder-gray-400" placeholder="Keyword" type="text"/>
                    </div>
                    <div class="flex bg-gray-100 dark:bg-gray-800 p-1.5 rounded-full w-full md:w-auto shrink-0">
                        <button class="flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold bg-primary text-white shadow-sm transition-all">All</button>
                        <button class="flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">Available</button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative group">
                        <select class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            <option>All Main Locations</option>
                            <option>Sunset Town</option>
                            <option>An Thoi</option>
                            <option>Duong Dong</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            <option>All Types</option>
                            <option>Studio</option>
                            <option>1 Bedroom</option>
                            <option>2 Bedrooms</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            <option>All Beds</option>
                            <option>1 Bed</option>
                            <option>2 Beds</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-2">
                    <a class="inline-flex items-center text-sm font-medium text-primary bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors" href="#">
                        <span class="material-symbols-outlined text-sm mr-2">info</span>
                        Looking for certain features?
                    </a>
                    <div class="flex items-center gap-6 w-full md:w-auto justify-end">
                        <a class="hidden md:inline-flex items-center text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined text-xl mr-1">tune</span>
                            Advance Search
                        </a>
                        <button class="w-full md:w-40 bg-primary hover:bg-secondary text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-full max-w-2xl z-20">
            <div class="bg-white dark:bg-surface-dark rounded-2xl shadow-float p-3 flex items-center gap-4 border border-gray-100 dark:border-gray-700">
                <div class="relative w-40 h-28 rounded-xl overflow-hidden shrink-0">
                    <img alt="Featured Apartment" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDms_FNhLLxe-Nloyhv-339Ogd8l-cpI83QgWbA6fsyY9WZBRMAG00Ztz4AeuMXg-3n7VYZxqEnL4O_3WWXZGB9lx_Xr2hlF5p5SiZi_CdodhaYLAxq5vNs0VPsSX_JJ7nFrR5pIiQAJbCOorF_jf6OTfvLHZDDBoTURGA4-B5EXlRbZsyCiZh3HDnes99QAOUqwv_wxONuWxP0dCuDUDRCuIXhNAEaCP4K28y1dh2kf_LVyW_2G8nWgTICpR9TspneCftKYnMmC4nv"/>
                    <div class="absolute top-2 left-2 bg-primary text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-sm">Featured</div>
                </div>
                <div class="flex-1 pr-2">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white mb-0.5 leading-snug">18th Floor Sunset Town Phu Quoc | One Bedroom</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Sea + Firework View</p>
                    <div class="flex items-center gap-4 text-xs font-medium text-gray-600 dark:text-gray-300">
                        <span class="flex items-center"><span class="material-symbols-outlined text-sm mr-1 text-primary">bed</span> 1 Bed</span>
                        <span class="flex items-center"><span class="material-symbols-outlined text-sm mr-1 text-primary">square_foot</span> 50 m²</span>
                    </div>
                </div>
                <div class="text-right pr-4 border-l border-gray-100 dark:border-gray-700 pl-4">
                    <div class="text-[10px] font-bold text-primary mb-1 uppercase tracking-wide">Available</div>
                    <div class="text-2xl font-extrabold text-gray-900 dark:text-white leading-none mb-1">$732</div>
                    <div class="text-[10px] text-gray-400 font-medium">/ Monthly</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-32 pb-24 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-10 md:gap-14">
            <div class="flex-shrink-0">
                <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden border-4 border-primary/20 shadow-xl bg-gray-100 dark:bg-gray-800">
                    <img src="{{ $options['agent_photo'] ?? '' }}" alt="{{ $options['agent_name'] ?? 'Hai Nguyen Van' }}" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="flex-1 text-center md:text-left">
                <p class="text-sm font-semibold text-primary mb-2">{{ $options['agent_title'] ?? 'Your friendly neighborhood buddy' }}</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white flex items-center justify-center md:justify-start gap-2 mb-2">
                    {{ $options['agent_name'] ?? 'Hai Nguyen Van' }}
                    <span class="material-symbols-outlined text-primary text-2xl align-middle">verified</span>
                </h2>
                <p class="text-sm uppercase tracking-[0.25em] text-gray-400 dark:text-gray-500 mb-4">{{ $homeAboutHeading ?? 'About Me' }}</p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    {{ $homeAboutIntro ?: "As a local of Phu Quoc with over 6 years in real estate, I understand the local market and my clients' needs.
                    My experience in cities like Ho Chi Minh City has informed my perspective on investment trends and long-term living." }}
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                    {{ $homeAboutDetails ?: "I manage several rental apartments with hundreds of positive Airbnb reviews, giving me insights into what truly makes
                    guests feel at home. With my local network, I'm committed to helping you find a place that fits your lifestyle and budget." }}
                </p>
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="#contact"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary hover:bg-secondary text-white font-semibold shadow-lg shadow-primary/30 transition-all">
                        <span class="material-symbols-outlined text-base mr-2">call</span>
                        Contact Hai Now
                    </a>
                    <p class="text-xs text-gray-500 dark:text-gray-400 max-w-xs">
                        Available via Zalo, WhatsApp and Email. Happy to support you in English or Vietnamese.
                    </p>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="mt-20">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
                <div>
                    <p class="text-xs font-bold tracking-[0.25em] text-gray-400 dark:text-gray-500 uppercase mb-2">Customer love us!</p>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Real stories from happy guests</h3>
                </div>
            </div>
            @if(!empty($homeTestimonials))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($homeTestimonials as $testimonial)
                    <div class="bg-white dark:bg-surface-dark border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
                        <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            {{ $testimonial['content'] ?? '' }}
                        </p>
                        <div class="flex items-center gap-3 mt-2">
                            <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-100">
                                @php
                                    $avatarPath = $testimonial['avatar'] ?? null;
                                    $avatarUrl = $avatarPath ? asset('storage/' . $avatarPath) : 'https://phuquocapartmentsforrent.com/wp-content/uploads/2025/03/z6387435064875_00ac1ab1892acdb397433a27ce3d169b.jpg';
                                @endphp
                                <img src="{{ $avatarUrl }}" alt="{{ $testimonial['name'] ?? 'Guest' }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $testimonial['name'] ?? '' }}</p>
                                @if(!empty($testimonial['role']))
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $testimonial['role'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            <!-- Photo Gallery Slider -->
            @if(!empty($homeGalleryImages))
            <div class="mt-16">
                <div class="relative px-8 md:px-12">
                    <!-- Slider Container -->
                    <div id="guest-gallery-slider" class="relative overflow-hidden rounded-2xl">
                        <div id="guest-gallery-track" class="flex gap-4 transition-transform duration-500 ease-in-out" style="transform: translateX(0);">
                            @foreach($homeGalleryImages as $image)
                                @php
                                    $imagePath = $image['image'] ?? null;
                                    $src = $imagePath ? asset('storage/' . $imagePath) : null;
                                    $alt = $image['alt'] ?? 'Guest photo';
                                @endphp
                                @if($src)
                                    <div class="min-w-full md:min-w-[48%] lg:min-w-[32%] h-72 md:h-80 rounded-2xl overflow-hidden bg-gray-100 dark:bg-gray-800 flex-shrink-0">
                                        <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button id="guest-gallery-prev" class="absolute left-0 md:left-2 top-1/2 -translate-y-1/2 bg-white/90 dark:bg-gray-900/90 hover:bg-white dark:hover:bg-gray-800 text-gray-900 dark:text-white rounded-full p-3 shadow-lg backdrop-blur-sm transition-all hover:scale-110 z-10">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button id="guest-gallery-next" class="absolute right-0 md:right-2 top-1/2 -translate-y-1/2 bg-white/90 dark:bg-gray-900/90 hover:bg-white dark:hover:bg-gray-800 text-gray-900 dark:text-white rounded-full p-3 shadow-lg backdrop-blur-sm transition-all hover:scale-110 z-10">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>

                    <!-- Pagination Dots -->
                    <div class="flex justify-center gap-2 mt-6">
                        @foreach($homeGalleryImages as $index => $image)
                            <button class="guest-gallery-dot w-2 h-2 rounded-full {{ $index === 0 ? 'bg-primary' : 'bg-gray-300 dark:bg-gray-600' }} transition-all" data-index="{{ $index }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<section class="py-24 bg-background-light dark:bg-background-dark transition-colors duration-300" id="apartments">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Discover Latest Apartments</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">Newest Apartments in Phu Quoc</p>
            </div>
            <a class="inline-flex items-center text-primary font-bold hover:text-secondary transition-colors group" href="{{ route('apartments.index') }}">
                View All Properties <span class="material-symbols-outlined ml-1 group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        @if(isset($apartments) && $apartments->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($apartments as $apartment)
            <a href="{{ route('apartments.show', $apartment->slug) }}" class="bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 group border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                <div class="relative h-72 overflow-hidden">
                    <img alt="{{ $apartment->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $apartment->featured_image_url }}"/>
                    <div class="absolute top-4 left-4 flex gap-2">
                        @if($apartment->status === 'available')
                        <span class="bg-white/95 dark:bg-gray-900/95 text-gray-800 dark:text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm backdrop-blur-sm">{{ $apartment->status_badge_text }}</span>
                        @endif
                        @if($apartment->is_featured)
                        <span class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Featured</span>
                        @endif
                    </div>
                    @php
                        $galleryImages = $apartment->gallery_image_urls;
                        $totalImages = count($galleryImages) + 1; // +1 for featured image
                    @endphp
                    @if($totalImages > 0)
                    <div class="absolute top-4 right-4 bg-black/60 text-white text-xs font-medium px-2.5 py-1 rounded-lg flex items-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-sm mr-1">photo_camera</span> {{ $totalImages }}
                    </div>
                    @endif
                    <button class="absolute bottom-4 right-4 p-2.5 bg-white dark:bg-gray-800 rounded-full text-gray-400 hover:text-red-500 transition-colors shadow-lg hover:scale-110 transform duration-200" onclick="event.preventDefault();">
                        <span class="material-symbols-outlined text-xl">favorite</span>
                    </button>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-tight group-hover:text-primary transition-colors">{{ $apartment->title }}</h3>
                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-5">
                        <span class="material-symbols-outlined text-sm mr-1 text-primary">location_on</span>
                        {{ $apartment->address ?: ($apartment->location ?: $apartment->district) }}
                    </div>
                    <div class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-5 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mb-0.5">{{ $apartment->property_type_display }}</p>
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white">{{ $apartment->formatted_price_monthly }} <span class="text-xs font-medium text-gray-500">/ Monthly</span></p>
                        </div>
                        <div class="flex gap-4">
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">bed</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ $apartment->bedrooms_display }}</p>
                            </div>
                            @if($apartment->area)
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">square_foot</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ number_format($apartment->area) }} m²</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if($apartment->published_at)
                    <p class="text-[10px] text-gray-400 mt-4 font-medium">Added: {{ $apartment->published_at->format('M d, Y') }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <p class="text-lg text-gray-600 dark:text-gray-400">No apartments available at the moment.</p>
        </div>
        @endif
        <div class="mt-8 text-center">
            <a href="{{ route('apartments.index') }}" class="inline-block bg-primary hover:bg-secondary text-white font-bold py-3 px-10 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5">
                View All
            </a>
        </div>
    </div>
</section>
<section class="py-24 bg-white dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-4">Motorbike Rentals</h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg">Explore Phu Quoc island with freedom. We offer reliable scooters and motorbikes for your adventure at the best daily and monthly rates.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Scooter" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcYTgIi_nKfaR-uY-94KD3WyVh6Lm5Unlj2n1cNBi4as7FgB_iIVIW42b_Szi89oPNSHAlfyP0mZBoeJERP3Qe4ohMjwTswh3F65THkBrepYAyAFIkwDLoGVhrQOWLIiRq-TtAulvJximSDlPulGxSqMJ13HBEY0c0yMnTVvTqtT0sMbFwZApL4lNIvsx2sPKpXxDnF0__M0YieWwveQCaYLPsrnvLNIjPoQ0mtDX4SYqCIyEFa9ze02WyARHbIGUXNznHEtTR7A-g"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Honda Vision</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Automatic • 110cc</p>
                <div class="text-primary font-extrabold text-lg">$5 / Day</div>
            </div>
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Airblade" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCIijwAXZ8vUBq1sUbsVaLmr5jX11i0r1XF6jZnTriFlo4TIGLomg0kdHYn5GmFoXtnwrTR0-zRMkT1lpslSeQlCP82G918VPcbLKvM2oh57a-Tapkfn06I2pQOsqknWNrq2BZbqN-tOWxhMqXYL5oxbOaL2qqpd-XR0YUjgz14SArdl8rXcbOHoAsX96VkMtiw6QvSEcC9sp4JGXIzcAMNb5qH5YFdvxlFbfHts_EyP1qGrN0D9dDAGBmljButQfWizJoMh43tHnm3"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Honda Airblade</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Automatic • 125cc</p>
                <div class="text-primary font-extrabold text-lg">$7 / Day</div>
            </div>
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Manual Bike" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZYYVrv3lzj44n58I9VkdYW8hyW18x9MRQn6nwPHhxY5SY00NIjfmqkrBvYd47o9UBvU_upoj1Vvm5T3P9fC2_OX0-TKtIA8VbAXKPXy7uWMMpnB4eIlxl2Pzky0yP3Ztj7tLVeyhURTafvb4xrWcm7A3a_eI-x-MVnSzPC2gD7GvQrz5Ts3hRR_Srp95k2LdlUtzUCHtaak7jdun26l4MEzIEuK1gj2oD2OhJ4Fm0xhrGS-Jj3LMMZi7oOlzwrrI2EeuYcwL_rhmJ"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Yamaha Exciter</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Manual • 150cc</p>
                <div class="text-primary font-extrabold text-lg">$9 / Day</div>
            </div>
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Large Scooter" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJnY6OGiy-pnK4NJUCmakhzO-xifPG1ZCTmweOeLlxywkgnLJXQKA-aU1uRsbOy0C8zlYAo8nGGEIoJngIerX6zAVXcrY7KKJSFswx_wLjK4HUgXFz41TzU_xM9ft51PSpeLb33Ihx-hvBHJIFTUioqEDxg0srY64AfvzCR-994vbH17lYJ5QqLwWD25p8oZPoNjoGJVZ47LaR5_YymfZbwEVGdBSFTc80QYrfxSOy6NDRFeEDnR7r7yMs8EqsKHRpIAlFVCMzea4k"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Honda PCX</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Automatic • 150cc</p>
                <div class="text-primary font-extrabold text-lg">$11 / Day</div>
            </div>
        </div>
        <div class="text-center mt-10">
            <a class="text-primary font-bold hover:text-secondary underline decoration-2 underline-offset-4 transition-colors" href="#">View Rental Requirements</a>
        </div>
    </div>
</section>
@if(isset($latestPosts) && $latestPosts->count() > 0)
<section class="py-24 bg-background-light dark:bg-background-dark transition-colors duration-300" id="blog">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Latest Blog Posts</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">Discover tips, guides, and stories about Phu Quoc</p>
            </div>
            <a class="inline-flex items-center text-primary font-bold hover:text-secondary transition-colors group" href="{{ route('blog.index') }}">
                View All Posts <span class="material-symbols-outlined ml-1 group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latestPosts as $post)
            <article class="group bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col h-full">
                <div class="relative h-56 overflow-hidden">
                    <img alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="{{ $post->featured_image_url }}"/>
                    @if($post->category)
                    <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ ucfirst(str_replace('-', ' ', $post->category)) }}
                    </span>
                    @endif
                    @if($post->is_featured)
                    <span class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">Featured</span>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span>{{ $post->published_at->format('M d, Y') }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>{{ $post->reading_time ?? 5 }} min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors line-clamp-2">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                        {{ $post->excerpt }}
                    </p>
                    <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="{{ route('blog.show', $post->slug) }}">
                        Read More <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="py-24 bg-blue-50/50 dark:bg-gray-900 transition-colors duration-300" id="contact">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-surface-dark rounded-[2.5rem] shadow-float overflow-hidden flex flex-col md:flex-row border border-gray-100 dark:border-gray-700">
            <div class="w-full md:w-1/2 p-10 md:p-14 lg:p-16 flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">Contact Our Agent</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-10 text-lg leading-relaxed">Ready to book your stay or have questions about living in Phu Quoc? Reach out to us directly.</p>
                <div class="space-y-8">
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                                <span class="material-symbols-outlined">phone</span>
                            </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">Phone</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">+84 902-607-024</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                                <span class="material-symbols-outlined">email</span>
                            </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">Email</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">booking@pqrentals.com</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                                <span class="material-symbols-outlined">chat</span>
                            </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">Zalo / WhatsApp</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">+84 902-607-024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 bg-gray-50 dark:bg-gray-800/50 p-10 md:p-14 lg:p-16 flex flex-col justify-center border-l border-gray-100 dark:border-gray-700">
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="name">Name</label>
                        <input class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" id="name" placeholder="Your full name" type="text"/>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="email">Email</label>
                        <input class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" id="email" placeholder="your@email.com" type="email"/>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="message">Message</label>
                        <textarea class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all resize-none" id="message" placeholder="How can we help you?" rows="5"></textarea>
                    </div>
                    <button class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95" type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Guest Gallery Slider
    (function() {
        const track = document.getElementById('guest-gallery-track');
        const prevBtn = document.getElementById('guest-gallery-prev');
        const nextBtn = document.getElementById('guest-gallery-next');
        const dots = document.querySelectorAll('.guest-gallery-dot');

        if (!track || !prevBtn || !nextBtn) return;

        const slides = track.querySelectorAll('div');
        const totalSlides = slides.length;
        let currentIndex = 0;

        // Get slide width based on screen size
        function getSlideWidth() {
            const trackWidth = track.offsetWidth;
            if (window.innerWidth >= 1024) {
                // lg: 32% + gap
                return (trackWidth / 3) + 16; // 32% + gap
            } else if (window.innerWidth >= 768) {
                // md: 48% + gap
                return (trackWidth / 2) + 16; // 48% + gap
            } else {
                // mobile: 100%
                return trackWidth;
            }
        }

        function updateSlider() {
            const slideWidth = getSlideWidth();
            const translateX = -currentIndex * slideWidth;
            track.style.transform = `translateX(${translateX}px)`;

            // Update dots
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                    dot.classList.add('bg-primary');
                    dot.classList.add('w-8'); // Make active dot wider
                } else {
                    dot.classList.remove('bg-primary', 'w-8');
                    dot.classList.add('bg-gray-300', 'dark:bg-gray-600');
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateSlider();
        }

        // Event listeners
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => goToSlide(index));
        });

        // Auto-play (optional - uncomment if needed)
        // let autoPlayInterval = setInterval(nextSlide, 5000);
        // track.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        // track.addEventListener('mouseleave', () => {
        //     autoPlayInterval = setInterval(nextSlide, 5000);
        // });

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateSlider, 250);
        });

        // Initialize
        updateSlider();
    })();
</script>
@endpush
