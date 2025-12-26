<section class="py-24 bg-background-light dark:bg-background-dark transition-colors duration-300" id="apartments">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Discover Latest
                    Apartments</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">Newest Apartments in Phu Quoc</p>
            </div>
            <a class="inline-flex items-center text-primary font-bold hover:text-secondary transition-colors group"
               href="{{ route('apartments.index') }}">
                View All Properties <span
                    class="material-symbols-outlined ml-1 group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        @if(isset($apartments) && $apartments->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($apartments as $apartment)
                    <a href="{{ route('apartments.show', $apartment->slug) }}"
                       class="bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 group border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                        <div class="relative h-72 overflow-hidden">
                            <img alt="{{ $apartment->title }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                 src="{{ $apartment->featured_image_url }}"/>
                            <div class="absolute top-4 left-4 flex gap-2">
                                @if($apartment->status === 'available')
                                    <span
                                        class="bg-white/95 dark:bg-gray-900/95 text-gray-800 dark:text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm backdrop-blur-sm">{{ $apartment->status_badge_text }}</span>
                                @endif
                                @if($apartment->is_featured)
                                    <span
                                        class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Featured</span>
                                @endif
                            </div>
                            @php
                                $galleryImages = $apartment->gallery_image_urls;
                                $totalImages = count($galleryImages) + 1; // +1 for featured image
                            @endphp
                            @if($totalImages > 0)
                                <div
                                    class="absolute top-4 right-4 bg-black/60 text-white text-xs font-medium px-2.5 py-1 rounded-lg flex items-center backdrop-blur-sm">
                                    <span
                                        class="material-symbols-outlined text-sm mr-1">photo_camera</span> {{ $totalImages }}
                                </div>
                            @endif
                            <button
                                class="absolute bottom-4 right-4 p-2.5 bg-white dark:bg-gray-800 rounded-full text-gray-400 hover:text-red-500 transition-colors shadow-lg hover:scale-110 transform duration-200"
                                onclick="event.preventDefault();">
                                <span class="material-symbols-outlined text-xl">favorite</span>
                            </button>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-tight group-hover:text-primary transition-colors">{{ $apartment->title }}</h3>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-5">
                                <span class="material-symbols-outlined text-sm mr-1 text-primary">location_on</span>
                                {{ $apartment->address ?: ($apartment->location ?: $apartment->district) }}
                            </div>
                            <div
                                class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-5 flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mb-0.5">{{ $apartment->property_type_display }}</p>
                                    <p class="text-xl font-extrabold text-gray-900 dark:text-white">{{ $apartment->formatted_price_monthly }}
                                        <span class="text-xs font-medium text-gray-500">/ Monthly</span></p>
                                </div>
                                <div class="flex gap-4">
                                    <div class="text-center">
                                        <span
                                            class="material-symbols-outlined text-gray-400 text-xl mb-1">bed</span>
                                        <p class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ $apartment->bedrooms_display }}</p>
                                    </div>
                                    @if($apartment->area)
                                        <div class="text-center">
                                            <span class="material-symbols-outlined text-gray-400 text-xl mb-1">square_foot</span>
                                            <p class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ number_format($apartment->area) }}
                                                m²</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if($apartment->published_at)
                                <p class="text-[10px] text-gray-400 mt-4 font-medium">
                                    Added: {{ $apartment->published_at->format('M d, Y') }}</p>
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
            <a href="{{ route('apartments.index') }}"
               class="inline-block bg-primary hover:bg-secondary text-white font-bold py-3 px-10 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5">
                View All
            </a>
        </div>
    </div>
</section>

