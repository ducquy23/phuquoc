@extends('layouts.app')

@section('title', ($apartment->meta_title ?: $apartment->title) . ' | PQ Rentals')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/apartments.css') }}">
    <style>
        /* Hide scrollbar for navigation tabs */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        /* Navigation tab active state */
        .nav-tab.active {
            color: rgb(59 130 246);
            border-bottom-color: rgb(59 130 246);
            font-weight: 600;
        }
        
        /* Toast Notification */
        #toast-container {
            pointer-events: none;
        }
        #toast-container > * {
            pointer-events: auto;
        }
        .toast {
            min-width: 300px;
            max-width: 500px;
            padding: 1rem 1.25rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }
        .toast.success {
            background-color: #10b981;
            color: white;
        }
        .toast.error {
            background-color: #ef4444;
            color: white;
        }
    </style>
@endpush

@section('content')
    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>
    
    <main class="pb-16 pt-8">
        <!-- Breadcrumb -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 mt-24">
            <nav class="flex items-center flex-wrap gap-2 text-sm" aria-label="Breadcrumb">
                <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
                   href="{{ route('home') }}">
                    <span class="material-icons-round text-base mr-1">home</span>
                    Home
                </a>
                <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
                <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
                   href="{{ route('apartments.index') }}">Apartments</a>
                @if($apartment->heroFilterLocation || $apartment->district)
                    <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
                    <span class="text-gray-500 dark:text-gray-400">
                    {{ $apartment->heroFilterLocation->name ?? $apartment->district ?? '' }}
                </span>
                @endif
                <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
                <span class="text-gray-900 dark:text-white font-medium line-clamp-1"
                      title="{{ $apartment->title }}">{{ Str::limit($apartment->title, 50) }}</span>
            </nav>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mt-8">
                    <div class="order-2 md:order-1">
                        <div class="flex items-center gap-3 mb-2">
                            @if($apartment->is_featured)
                                <span
                                    class="bg-primary/10 text-primary text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Featured</span>
                            @endif
                            @if($apartment->status === 'available')
                                <span
                                    class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">{{ $apartment->status_badge_text }}</span>
                            @endif
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white leading-tight">{{ $apartment->title }}</h1>
                        <div class="flex items-center gap-2 mt-2 text-gray-600 dark:text-gray-400">
                            <span class="material-symbols-outlined text-primary text-lg">location_on</span>
                            <span>{{ $apartment->address ?: ($apartment->heroFilterLocation->name ?? $apartment->district ?? 'Phu Quoc') }}</span>
                        </div>
                    </div>
                    <div class="order-1 md:order-2 text-left md:text-right">
                        <div class="flex items-baseline md:justify-end gap-1">
                            <span
                                class="text-3xl font-bold text-primary">{{ $apartment->formatted_price_monthly }}</span>
                            <span class="text-gray-500 dark:text-gray-400 font-medium">/ Monthly</span>
                        </div>
                        @if($apartment->currency === 'USD' && $apartment->price_monthly)
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Approx. {{ number_format($apartment->price_monthly * 24000, 0) }} VND</p>
                        @endif
                    </div>
                </div>
            </div>
            @php
                $galleryImages = $apartment->gallery_image_urls;
                $allImages = array_merge([$apartment->featured_image_url], $galleryImages);
            @endphp

            <!-- Mobile Gallery Slider -->
            <div class="mb-8 lg:hidden">
                <div class="relative rounded-2xl overflow-hidden bg-gray-100 dark:bg-gray-800">
                    <img
                        id="mobile-gallery-image"
                        src="{{ $allImages[0] ?? $apartment->featured_image_url }}"
                        alt="{{ $apartment->title }}"
                        class="w-full h-72 object-cover"/>

                    <button
                        type="button"
                        onclick="changeMobileSlide(-1)"
                        class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-2">
                        <span class="material-symbols-outlined text-lg">chevron_left</span>
                    </button>
                    <button
                        type="button"
                        onclick="changeMobileSlide(1)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-2">
                        <span class="material-symbols-outlined text-lg">chevron_right</span>
                    </button>

                    <div class="absolute bottom-3 left-0 right-0 flex items-center justify-center gap-2">
                        <div class="bg-black/40 text-white text-xs px-3 py-1 rounded-full">
                            <span id="mobile-gallery-current">1</span> / <span id="mobile-gallery-total">{{ count($allImages) }}</span>
                        </div>
                    </div>
                </div>
                @if(count($allImages) > 1)
                    <div class="mt-3 flex gap-2 overflow-x-auto">
                        @foreach($allImages as $index => $imageUrl)
                            <button
                                type="button"
                                class="mobile-thumb relative flex-shrink-0 rounded-xl overflow-hidden border {{ $index === 0 ? 'border-primary' : 'border-gray-200 dark:border-gray-700' }} w-20 h-16"
                                onclick="goToMobileSlide({{ $index }})">
                                <img src="{{ $imageUrl }}" alt="{{ $apartment->title }} - Thumb {{ $index + 1 }}"
                                     class="w-full h-full object-cover"/>
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Desktop Gallery -->
            <div class="mb-10 hidden lg:block">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <!-- Main Image (Left - 2/3 width) -->
                    <div
                        class="lg:col-span-2 relative group overflow-hidden rounded-2xl cursor-pointer bg-gray-100 dark:bg-gray-800"
                        style="height: 600px;">
                        <img id="main-image" alt="{{ $apartment->title }}"
                             class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105"
                             src="{{ $allImages[0] ?? $apartment->featured_image_url }}"/>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                            class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-sm font-medium">{{ $apartment->title }}</span>
                            <button onclick="openLightbox(0)"
                                    class="p-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-lg">fullscreen</span>
                            </button>
                        </div>
                    </div>

                    <!-- Thumbnails (Right - 1/3 width) -->
                    <div class="flex flex-col gap-2 overflow-y-auto detail-section__gallery-thumbs"
                         style="max-height: 600px;">
                        @foreach($allImages as $index => $imageUrl)
                            @if($index < 3)
                                <!-- Hiển thị 3 ảnh đầu tiên -->
                                <div
                                    class="relative group overflow-hidden rounded-lg cursor-pointer border flex-shrink-0 thumbnail-item detail-section__gallery-thumb {{ $index === 0 ? 'border-blue-400 ring-1 ring-blue-300' : 'border-gray-300 dark:border-gray-600 hover:border-blue-300' }} transition-all duration-300 bg-white dark:bg-gray-800"
                                    style="height: 140px;"
                                    onclick="changeMainImage('{{ $imageUrl }}', this); openLightbox({{ $index }});">
                                    <img alt="{{ $apartment->title }} - Image {{ $index + 1 }}"
                                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                         src="{{ $imageUrl }}"/>
                                    <div
                                        class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                                </div>
                            @elseif($index === 3 && count($allImages) > 3)
                                <!-- Ảnh thứ 4 với overlay "+X" -->
                                @php
                                    $remainingCount = count($allImages) - 3;
                                @endphp
                                <div
                                    class="relative group overflow-hidden rounded-lg cursor-pointer border flex-shrink-0 thumbnail-item detail-section__gallery-thumb border-gray-300 dark:border-gray-600 hover:border-blue-300 transition-all duration-300 bg-white dark:bg-gray-800"
                                    style="height: 140px;" onclick="openLightbox({{ $index }})">
                                    <img alt="{{ $apartment->title }} - Image {{ $index + 1 }}"
                                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                         src="{{ $imageUrl }}"/>
                                    <div
                                        class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                                    <div
                                        class="detail-section__gallery-thumb_overlay absolute inset-0 bg-black/60 flex items-center justify-center">
                                        <div
                                            class="detail-section__gallery-thumb_overlay-text text-white font-bold text-xl">
                                            +{{ $remainingCount }}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>


            <!-- Lightbox Modal with Navigation -->
            <div id="lightbox" class="hidden fixed inset-0 z-50 bg-black/95 backdrop-blur-sm">
                <!-- Close Button -->
                <button onclick="closeLightbox()"
                        class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-20 bg-black/50 rounded-full p-2">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>

                <!-- Main Image Container -->
                <div class="w-full h-full flex items-center justify-center px-16 pb-32 pt-20">
                    <img id="lightbox-image" class="max-w-full max-h-full object-contain rounded-lg" src=""
                         alt="{{ $apartment->title }}"/>
                </div>

                <!-- Navigation Arrows -->
                <button id="lightbox-prev" onclick="navigateLightbox(-1)"
                        class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors z-20 bg-black/50 hover:bg-black/70 rounded-full p-3">
                    <span class="material-symbols-outlined text-3xl">chevron_left</span>
                </button>
                <button id="lightbox-next" onclick="navigateLightbox(1)"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors z-20 bg-black/50 hover:bg-black/70 rounded-full p-3">
                    <span class="material-symbols-outlined text-3xl">chevron_right</span>
                </button>

                <!-- Image Counter -->
                <div id="lightbox-counter"
                     class="absolute top-4 left-4 text-white bg-black/50 rounded-full px-4 py-2 text-sm font-medium z-20">
                    <span id="lightbox-current">1</span> / <span id="lightbox-total">{{ count($allImages) }}</span>
                </div>

                <!-- Bottom Thumbnails Strip -->
                <div class="absolute bottom-0 left-0 right-0 bg-black/80 backdrop-blur-sm p-4 z-20">
                    <div class="max-w-7xl mx-auto flex gap-2 overflow-x-auto pb-2" id="lightbox-thumbnails">
                        @foreach($allImages as $index => $imageUrl)
                            <div
                                class="flex-shrink-0 cursor-pointer lightbox-thumb {{ $index === 0 ? 'ring-2 ring-white' : '' }}"
                                onclick="goToLightboxImage({{ $index }})" style="width: 80px; height: 60px;">
                                <img src="{{ $imageUrl }}" alt="{{ $apartment->title }} - Image {{ $index + 1 }}"
                                     class="w-full h-full object-cover rounded opacity-70 hover:opacity-100 transition-opacity"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="mb-8">
                <div class="bg-white dark:bg-surface-dark rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-4">
                    <nav class="flex items-center gap-6 overflow-x-auto scrollbar-hide" id="content-nav">
                        <button
                            class="nav-tab px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors whitespace-nowrap border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                            data-target="thong-tin">
                            Thông tin
                        </button>
                        @if($apartment->amenities && count($apartment->amenities) > 0)
                            <button
                                class="nav-tab px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors whitespace-nowrap border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                                data-target="tien-ich">
                                Tiện ích
                            </button>
                        @endif
                        <button
                            class="nav-tab px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors whitespace-nowrap border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                            data-target="chinh-sach">
                            Chính sách
                        </button>
                        @if(count($allImages) > 0)
                            <button
                                class="nav-tab px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors whitespace-nowrap border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                                data-target="hinh-anh">
                                Hình ảnh
                            </button>
                        @endif
                        <button
                            class="nav-tab px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors whitespace-nowrap border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                            data-target="chi-duong">
                            Chỉ đường
                        </button>
                    </nav>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div
                        class="bg-white dark:bg-surface-dark p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm flex flex-wrap gap-8 justify-between md:justify-start">
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                                <span class="material-symbols-outlined">bed</span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">Bedrooms</p>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $apartment->bedrooms_display }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                                <span class="material-symbols-outlined">shower</span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">
                                    Bathrooms</p>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $apartment->bathrooms }} {{ Str::plural('Bath', $apartment->bathrooms) }}</p>
                            </div>
                        </div>
                        @if($apartment->area)
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                                    <span class="material-symbols-outlined">square_foot</span>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">Area
                                        Size</p>
                                    <p class="font-bold text-gray-900 dark:text-white">{{ number_format($apartment->area) }}
                                        m²</p>
                                </div>
                            </div>
                        @endif
                        @if($apartment->features && count($apartment->features) > 0)
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                                    <span class="material-symbols-outlined">landscape</span>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">
                                        Features</p>
                                    <p class="font-bold text-gray-900 dark:text-white">{{ implode(', ', array_slice($apartment->features, 0, 2)) }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="thong-tin"
                        class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm scroll-mt-24">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">About this property</h3>
                        <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                            @if($apartment->description)
                                {!! nl2br(e($apartment->description)) !!}
                            @elseif($apartment->excerpt)
                                <p>{{ $apartment->excerpt }}</p>
                            @else
                                <p>No description available for this property.</p>
                            @endif
                        </div>
                    </div>
                    @if($apartment->amenities && count($apartment->amenities) > 0)
                        @php
                            $amenityConfig = config('amenities.list', []);
                        @endphp
                        <div id="tien-ich"
                            class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm scroll-mt-24">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Property Amenities</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($apartment->amenities as $amenity)
                                    @php
                                        $config = $amenityConfig[$amenity] ?? null;
                                        $label = $config['label'] ?? ucwords(str_replace('_', ' ', $amenity));
                                        $icon = $config['icon'] ?? null;
                                    @endphp
                                    <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                        @if($icon)
                                            <img src="{{ $icon }}" alt="{{ $label }}" class="w-5 h-5 object-contain" loading="lazy">
                                        @else
                                            <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                        @endif
                                        <span>{{ $label }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($apartment->booking_policy || $apartment->checkin_checkout_policy || $apartment->rules_policy || $apartment->cancellation_policy)
                        <div id="chinh-sach"
                            class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm scroll-mt-24">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Chính sách lưu trú</h3>
                            <div class="space-y-6">
                                @if($apartment->booking_policy || $apartment->cancellation_policy)
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-lg">event_available</span>
                                            Đặt phòng và hủy phòng
                                        </h4>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                            {{ $apartment->booking_policy ?: $apartment->cancellation_policy }}
                                        </p>
                                    </div>
                                @endif
                                @if($apartment->checkin_checkout_policy)
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-lg">schedule</span>
                                            Nhận/trả phòng
                                        </h4>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                            {{ $apartment->checkin_checkout_policy }}
                                        </p>
                                    </div>
                                @endif
                                @if($apartment->rules_policy)
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-lg">rule</span>
                                            Các quy định khác
                                        </h4>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                            {{ $apartment->rules_policy }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if(count($allImages) > 0)
                        <div id="hinh-anh"
                            class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm scroll-mt-24">
                            <div class="mb-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Hình ảnh thực tế tại lưu trú</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Khám phá những hình ảnh chân thực nhất về không gian, tiện ích tại lưu trú</p>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($allImages as $index => $imageUrl)
                                    <div
                                        class="relative group overflow-hidden rounded-xl cursor-pointer bg-gray-100 dark:bg-gray-800 aspect-square"
                                        onclick="openLightbox({{ $index }})">
                                        <img alt="{{ $apartment->title }} - Image {{ $index + 1 }}"
                                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                             src="{{ $imageUrl }}"/>
                                        <div
                                            class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
                                            <span
                                                class="material-symbols-outlined text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-2xl">zoom_in</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div id="chi-duong"
                        class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm scroll-mt-24">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Location</h3>
                            @if($apartment->google_maps_embed)
                                @php
                                    // Extract coordinates from Google Maps embed iframe
                                    preg_match('/!3d(-?\d+\.?\d*)/', $apartment->google_maps_embed, $latMatches);
                                    preg_match('/!2d(-?\d+\.?\d*)/', $apartment->google_maps_embed, $lngMatches);
                                    $lat = $latMatches[1] ?? null;
                                    $lng = $lngMatches[1] ?? null;
                                    $googleMapsUrl = $lat && $lng ? "https://www.google.com/maps?q={$lat},{$lng}" : '#';
                                @endphp
                                <a class="text-primary text-sm font-medium hover:underline flex items-center gap-1"
                                   href="{{ $googleMapsUrl }}" target="_blank" rel="noopener">
                                    Open in Google Maps <span
                                        class="material-symbols-outlined text-sm">open_in_new</span>
                                </a>
                            @endif
                        </div>
                        @if($apartment->google_maps_embed)
                            @php
                                // Replace width and height in iframe to make it responsive
                                $mapsEmbed = preg_replace('/width="[^"]*"/', 'width="100%"', $apartment->google_maps_embed);
                                $mapsEmbed = preg_replace('/height="[^"]*"/', 'height="100%"', $mapsEmbed);
                                $mapsEmbed = preg_replace('/style="[^"]*"/', 'style="border:0; width:100%; height:100%;"', $mapsEmbed);
                            @endphp
                            <div class="bg-gray-200 dark:bg-gray-800 rounded-xl h-96 w-full relative overflow-hidden">
                                {!! $mapsEmbed !!}
                            </div>
                        @else
                            <div
                                class="bg-gray-200 dark:bg-gray-800 rounded-xl h-64 w-full flex items-center justify-center relative overflow-hidden group">
                                <img alt="Map Preview" class="absolute inset-0 w-full h-full object-cover opacity-60"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKmtCDcLoY0uJRo2adnLu9ADr_fwhb3StdWD9EYo_NHoz6N5eq04PymAYDnelYVsoLKbRMRyQmFJdWCG6FeNvEjJ8MJabkiOoVHP6L5MMYvaI0Xrn4zm1fDKt4XR02SdTe5U2i5ipdGdSCaOm56sJ8-6HLinac0GnimUCFmTWHSmiy9xwHIob77zlSsKQdqPADy3af1mKJeUJTSlMBzd9G_WdFVORQMD8IMzdyGPDKMYOz80uPHOcbIWKcK0QKuKmmgpzagMkgtfpC"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                                <div
                                    class="relative z-10 bg-white dark:bg-surface-dark px-4 py-2 rounded-lg shadow-lg flex items-center gap-2">
                                    <span class="material-symbols-outlined text-red-500">location_on</span>
                                    <span
                                        class="font-bold text-gray-900 dark:text-white">{{ $apartment->heroFilterLocation->name ?? $apartment->district ?? 'Phu Quoc' }}</span>
                                </div>
                            </div>
                        @endif
                        @if($apartment->nearby_attractions && count($apartment->nearby_attractions) > 0)
                            <div class="mt-6">
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Nearby Attractions</h4>
                                <ul class="space-y-3">
                                    @foreach($apartment->nearby_attractions as $attraction)
                                        <li class="flex justify-between text-sm">
                                            <span
                                                class="text-gray-600 dark:text-gray-400">{{ $attraction['name'] ?? $attraction }}</span>
                                            @if(isset($attraction['distance']))
                                                <span
                                                    class="font-medium text-gray-900 dark:text-white">{{ $attraction['distance'] }}</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        <!-- Agent Card -->
                        <div
                            class="bg-white dark:bg-surface-dark p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-lg">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Interested in this
                                apartment?</h3>
                            <div class="flex items-center gap-4 mb-6">
                                @if($options['agent_photo'])
                                    <img alt="Agent Photo"
                                         class="w-14 h-14 rounded-full object-cover border-2 border-primary shadow-md"
                                         src="{{ $options['agent_photo'] }}"/>
                                @else
                                    <div
                                        class="w-14 h-14 rounded-full bg-gradient-to-br from-primary to-cyan-400 flex items-center justify-center text-white font-bold text-lg shadow-md">
                                        {{ strtoupper(substr($options['agent_name'], 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-gray-900 dark:text-white">{{ $options['agent_name'] }}</p>
                                    <p class="text-xs text-primary font-medium">{{ $options['agent_title'] }}</p>
                                </div>
                            </div>
                            @if($options['agent_bio'])
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-6 leading-relaxed">
                                    "{{ $options['agent_bio'] }}"
                                </p>
                            @endif

                            <div class="space-y-3 mb-6">
                                <a class="flex items-center gap-3 text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors group"
                                   href="mailto:{{ $options['contact_email'] }}">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                        <span class="material-icons text-xl">email</span>
                                    </div>
                                    <span class="font-medium text-sm">{{ $options['contact_email'] }}</span>
                                </a>
                                <a class="flex items-center gap-3 text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors group"
                                   href="tel:{{ str_replace(' ', '', $options['contact_phone']) }}">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                        <span class="material-icons text-xl">phone</span>
                                    </div>
                                    <span class="font-medium text-sm">{{ $options['contact_phone'] }}</span>
                                </a>
                                <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300 group">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
                                        <span class="material-icons text-xl">location_on</span>
                                    </div>
                                    <span class="font-medium text-sm">{{ $options['contact_location'] }}</span>
                                </div>
                            </div>

                            <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="interest" value="Long-term Rental Apartment">
                                <input type="hidden" name="message" value="I'm interested in: {{ $apartment->title }}">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Your
                                        Name <span class="text-red-500">*</span></label>
                                    <input
                                        id="contact-name"
                                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                                        placeholder="John Doe" name="name" type="text" required/>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                                        <span class="text-red-500">*</span></label>
                                    <input
                                        id="contact-email"
                                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                                        placeholder="john@example.com" name="email" type="email" required/>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Phone
                                        / WhatsApp / Zalo</label>
                                    <input
                                        id="contact-phone"
                                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                                        placeholder="+84 ..." name="phone" type="tel"/>
                                </div>
                                <button
                                    id="contact-submit-btn"
                                    class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 rounded-xl shadow-lg shadow-primary/30 transition transform active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed"
                                    type="submit">
                                    <span id="contact-submit-text">Send Inquiry</span>
                                    <span id="contact-submit-loading" class="hidden">Sending...</span>
                                </button>
                            </form>

                            @if($options['social_facebook'] && $options['social_facebook'] !== '#' || $options['social_instagram'] && $options['social_instagram'] !== '#')
                                <div class="mt-6 pt-6 border-t border-gray-100 dark:border-gray-700">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider font-semibold mb-3">
                                        Follow us</p>
                                    <div class="flex gap-3">
                                        @if($options['social_facebook'] && $options['social_facebook'] !== '#')
                                            <a class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all"
                                               href="{{ $options['social_facebook'] }}" target="_blank" rel="noopener">
                                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                    <path
                                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if($options['social_instagram'] && $options['social_instagram'] !== '#')
                                            <a class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all"
                                               href="{{ $options['social_instagram'] }}" target="_blank" rel="noopener">
                                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Office Hours -->
                        <div
                            class="bg-white dark:bg-surface-dark rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <span class="material-icons text-primary">schedule</span>
                                Office Hours
                            </h3>
                            <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-300">
                                <li class="flex justify-between">
                                    <span>Monday - Friday</span>
                                    <span
                                        class="font-medium text-gray-900 dark:text-white">{{ $options['office_hours_weekdays'] }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Saturday</span>
                                    <span
                                        class="font-medium text-gray-900 dark:text-white">{{ $options['office_hours_saturday'] }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Sunday</span>
                                    <span
                                        class="font-medium {{ $options['office_hours_sunday'] === 'Closed' ? 'text-red-500' : 'text-gray-900 dark:text-white' }}">{{ $options['office_hours_sunday'] }}</span>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="bg-gradient-to-br from-indigo-600 to-primary p-6 rounded-2xl shadow-lg text-white relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                            <h4 class="font-bold text-lg mb-2 relative z-10">Need a Motorbike?</h4>
                            <p class="text-indigo-100 text-sm mb-4 relative z-10">Rent a reliable scooter to explore the
                                island freely. Special rates for long-term tenants.</p>
                            <a class="inline-block bg-white text-primary font-bold text-sm px-4 py-2 rounded-lg hover:bg-gray-100 transition relative z-10"
                               href="#">
                                View Rentals
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if($similarApartments->count() > 0)
                <div class="mt-16">
                    <div class="flex justify-between items-end mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Similar Properties</h3>
                        <a class="text-primary font-medium hover:underline flex items-center"
                           href="{{ route('apartments.index') }}">View all <span
                                class="material-symbols-outlined text-sm ml-1">arrow_forward</span></a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($similarApartments as $similar)
                            <a href="{{ route('apartments.show', $similar->slug) }}"
                               class="group bg-white dark:bg-surface-dark rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300 block">
                                <div class="relative h-56 overflow-hidden">
                                    <span
                                        class="absolute top-3 left-3 bg-white dark:bg-surface-dark px-2 py-1 rounded text-xs font-bold shadow-sm z-10">{{ $similar->property_type_display }}</span>
                                    <img alt="{{ $similar->title }}"
                                         class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                         src="{{ $similar->featured_image_url }}"/>
                                    <div
                                        class="absolute bottom-3 right-3 bg-black/60 text-white px-2 py-1 rounded text-xs font-medium backdrop-blur-sm">
                                        {{ $similar->formatted_price_monthly }} / mo
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2 group-hover:text-primary transition">{{ $similar->title }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 flex items-center gap-1">
                                        <span
                                            class="material-symbols-outlined text-sm">location_on</span> {{ $similar->district ?: $similar->location }}
                                    </p>
                                    <div
                                        class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400 border-t border-gray-100 dark:border-gray-700 pt-4">
                                        <span class="flex items-center gap-1"><span
                                                class="material-symbols-outlined text-sm">bed</span> {{ $similar->bedrooms_display }}</span>
                                        <span class="flex items-center gap-1"><span
                                                class="material-symbols-outlined text-sm">shower</span> {{ $similar->bathrooms }} {{ Str::plural('Bath', $similar->bathrooms) }}</span>
                                        @if($similar->area)
                                            <span class="flex items-center gap-1"><span
                                                    class="material-symbols-outlined text-sm">square_foot</span> {{ number_format($similar->area) }}m²</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        // Gallery images array
        const galleryImages = @json($allImages);
        let currentLightboxIndex = 0;
        let currentMobileSlideIndex = 0;

        function changeMainImage(imageUrl, element) {
            // Update main image
            document.getElementById('main-image').src = imageUrl;

            // Update active thumbnail
            document.querySelectorAll('.thumbnail-item').forEach(thumb => {
                thumb.classList.remove('border-blue-400', 'ring-1', 'ring-blue-300');
                thumb.classList.add('border-gray-300', 'dark:border-gray-600');
            });

            if (element) {
                element.classList.remove('border-gray-300', 'dark:border-gray-600');
                element.classList.add('border-blue-400', 'ring-1', 'ring-blue-300');
            }
        }

        function openLightbox(index = 0) {
            currentLightboxIndex = index;
            updateLightboxImage();
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function updateLightboxImage() {
            if (galleryImages.length === 0) return;

            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCurrent = document.getElementById('lightbox-current');
            const lightboxTotal = document.getElementById('lightbox-total');

            // Ensure index is within bounds
            if (currentLightboxIndex < 0) currentLightboxIndex = galleryImages.length - 1;
            if (currentLightboxIndex >= galleryImages.length) currentLightboxIndex = 0;

            lightboxImage.src = galleryImages[currentLightboxIndex];
            lightboxCurrent.textContent = currentLightboxIndex + 1;
            lightboxTotal.textContent = galleryImages.length;

            // Update thumbnail highlights
            document.querySelectorAll('.lightbox-thumb').forEach((thumb, idx) => {
                if (idx === currentLightboxIndex) {
                    thumb.classList.add('ring-2', 'ring-white');
                    thumb.querySelector('img').classList.remove('opacity-70');
                    thumb.querySelector('img').classList.add('opacity-100');
                } else {
                    thumb.classList.remove('ring-2', 'ring-white');
                    thumb.querySelector('img').classList.add('opacity-70');
                    thumb.querySelector('img').classList.remove('opacity-100');
                }
            });

            // Update navigation buttons visibility
            const prevBtn = document.getElementById('lightbox-prev');
            const nextBtn = document.getElementById('lightbox-next');
            if (prevBtn && nextBtn) {
                prevBtn.style.display = galleryImages.length > 1 ? 'block' : 'none';
                nextBtn.style.display = galleryImages.length > 1 ? 'block' : 'none';
            }
        }

        function navigateLightbox(direction) {
            currentLightboxIndex += direction;
            updateLightboxImage();
        }

        function goToLightboxImage(index) {
            currentLightboxIndex = index;
            updateLightboxImage();
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close lightbox on ESC key
        document.addEventListener('keydown', function (e) {
            const lightbox = document.getElementById('lightbox');
            if (!lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    navigateLightbox(-1);
                } else if (e.key === 'ArrowRight') {
                    navigateLightbox(1);
                }
            }
        });

        // Close lightbox on background click
        document.getElementById('lightbox')?.addEventListener('click', function (e) {
            if (e.target === this || e.target.id === 'lightbox-image') {
                closeLightbox();
            }
        });

        // Navigation Tabs Functionality
        const navTabs = document.querySelectorAll('.nav-tab');
        const sections = {};
        
        // Only add sections that exist
        navTabs.forEach(tab => {
            const targetId = tab.getAttribute('data-target');
            const section = document.getElementById(targetId);
            if (section) {
                sections[targetId] = section;
            }
        });

        // Handle tab click
        navTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetSection = sections[targetId];

                if (targetSection) {
                    // Remove active class from all tabs
                    navTabs.forEach(t => {
                        t.classList.remove('text-primary', 'border-primary', 'font-semibold');
                        t.classList.add('text-gray-600', 'dark:text-gray-400', 'border-transparent');
                    });

                    // Add active class to clicked tab
                    this.classList.remove('text-gray-600', 'dark:text-gray-400', 'border-transparent');
                    this.classList.add('text-primary', 'border-primary', 'font-semibold');

                    // Scroll to section
                    const offsetTop = targetSection.offsetTop - 100; // Offset for sticky header
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Update active tab on scroll
        let isScrolling = false;
        function updateActiveTab() {
            if (isScrolling) return;

            const scrollPosition = window.scrollY + 150; // Offset for detection

            // Check each section
            for (const [id, section] of Object.entries(sections)) {
                if (!section) continue;

                const sectionTop = section.offsetTop;
                const sectionBottom = sectionTop + section.offsetHeight;

                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    // Remove active class from all tabs
                    navTabs.forEach(t => {
                        t.classList.remove('text-primary', 'border-primary', 'font-semibold');
                        t.classList.add('text-gray-600', 'dark:text-gray-400', 'border-transparent');
                    });

                    // Add active class to corresponding tab
                    const activeTab = document.querySelector(`.nav-tab[data-target="${id}"]`);
                    if (activeTab) {
                        activeTab.classList.remove('text-gray-600', 'dark:text-gray-400', 'border-transparent');
                        activeTab.classList.add('text-primary', 'border-primary', 'font-semibold');
                    }
                    break;
                }
            }
        }

        // Throttle scroll event
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            scrollTimeout = setTimeout(updateActiveTab, 100);
        });

        // Set initial active tab
        if (navTabs.length > 0) {
            navTabs[0].classList.remove('text-gray-600', 'dark:text-gray-400', 'border-transparent');
            navTabs[0].classList.add('text-primary', 'border-primary', 'font-semibold');
        }
        updateActiveTab();

        // Mobile Gallery Slider Functions
        function changeMobileSlide(direction) {
            if (galleryImages.length === 0) return;
            
            currentMobileSlideIndex += direction;
            
            // Wrap around
            if (currentMobileSlideIndex < 0) {
                currentMobileSlideIndex = galleryImages.length - 1;
            } else if (currentMobileSlideIndex >= galleryImages.length) {
                currentMobileSlideIndex = 0;
            }
            
            updateMobileSlide();
        }

        function goToMobileSlide(index) {
            if (galleryImages.length === 0) return;
            
            currentMobileSlideIndex = index;
            updateMobileSlide();
        }

        function updateMobileSlide() {
            if (galleryImages.length === 0) return;
            
            const mobileImage = document.getElementById('mobile-gallery-image');
            const mobileCurrent = document.getElementById('mobile-gallery-current');
            const mobileTotal = document.getElementById('mobile-gallery-total');
            
            if (mobileImage) {
                mobileImage.src = galleryImages[currentMobileSlideIndex];
            }
            
            if (mobileCurrent) {
                mobileCurrent.textContent = currentMobileSlideIndex + 1;
            }
            
            if (mobileTotal) {
                mobileTotal.textContent = galleryImages.length;
            }
            
            // Update thumbnail highlights
            document.querySelectorAll('.mobile-thumb').forEach((thumb, idx) => {
                if (idx === currentMobileSlideIndex) {
                    thumb.classList.remove('border-gray-200', 'dark:border-gray-700');
                    thumb.classList.add('border-primary');
                } else {
                    thumb.classList.remove('border-primary');
                    thumb.classList.add('border-gray-200', 'dark:border-gray-700');
                }
            });
        }

        // Initialize mobile slider
        if (galleryImages.length > 0) {
            updateMobileSlide();
        }

        // Toast Notification Function
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toast-container');
            if (!toastContainer) return;

            const toast = document.createElement('div');
            toast.className = `toast ${type} flex items-center gap-3 p-4 rounded-xl shadow-lg`;
            toast.innerHTML = `
                <span class="material-symbols-outlined">${type === 'success' ? 'check_circle' : 'error'}</span>
                <span class="flex-1 font-medium">${message}</span>
                <button onclick="this.parentElement.remove()" class="text-white/80 hover:text-white">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
            `;

            toastContainer.appendChild(toast);

            // Trigger animation
            setTimeout(() => {
                toast.classList.add('show');
            }, 10);

            // Auto remove after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 5000);
        }

        // Contact Form AJAX Submission
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const submitBtn = document.getElementById('contact-submit-btn');
                const submitText = document.getElementById('contact-submit-text');
                const submitLoading = document.getElementById('contact-submit-loading');
                const formData = new FormData(this);

                // Disable submit button
                submitBtn.disabled = true;
                submitText.classList.add('hidden');
                submitLoading.classList.remove('hidden');

                // Send AJAX request
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    // Check if response is ok
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        }).catch(() => {
                            throw new Error('Server error');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Show success toast
                        showToast(data.message || 'Thank you! Your inquiry has been sent successfully.', 'success');
                        
                        // Reset form
                        contactForm.reset();
                    } else {
                        // Show error toast with validation errors if available
                        let errorMessage = data.message || 'Something went wrong. Please try again.';
                        
                        // If there are validation errors, show first error
                        if (data.errors && Object.keys(data.errors).length > 0) {
                            const firstError = Object.values(data.errors)[0];
                            errorMessage = Array.isArray(firstError) ? firstError[0] : firstError;
                        }
                        
                        showToast(errorMessage, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    let errorMessage = 'An error occurred. Please try again later.';
                    
                    // Handle validation errors
                    if (error.errors && Object.keys(error.errors).length > 0) {
                        const firstError = Object.values(error.errors)[0];
                        errorMessage = Array.isArray(firstError) ? firstError[0] : firstError;
                    } else if (error.message) {
                        errorMessage = error.message;
                    }
                    
                    showToast(errorMessage, 'error');
                })
                .finally(() => {
                    // Re-enable submit button
                    submitBtn.disabled = false;
                    submitText.classList.remove('hidden');
                    submitLoading.classList.add('hidden');
                });
            });
        }

    </script>

@endpush










