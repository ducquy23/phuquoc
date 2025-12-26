<!-- Photo Gallery Slider -->
@if(!empty($homeGalleryImages))
    <div class="mt-16">
        <div class="relative px-8 md:px-12">
            <!-- Slider Container -->
            <div id="guest-gallery-slider" class="relative overflow-hidden rounded-2xl">
                <div id="guest-gallery-track"
                     class="flex gap-4 transition-transform duration-500 ease-in-out"
                     style="transform: translateX(0);">
                    @foreach($homeGalleryImages as $image)
                        @php
                            $imagePath = $image['image'] ?? null;
                            $src = $imagePath ? asset('storage/' . $imagePath) : null;
                            $alt = $image['alt'] ?? 'Guest photo';
                        @endphp
                        @if($src)
                            <div
                                class="min-w-full md:min-w-[48%] lg:min-w-[32%] h-72 md:h-80 rounded-2xl overflow-hidden bg-gray-100 dark:bg-gray-800 flex-shrink-0">
                                <img src="{{ $src }}" alt="{{ $alt }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button id="guest-gallery-prev"
                    class="absolute left-0 md:left-2 top-1/2 -translate-y-1/2 bg-white/90 dark:bg-gray-900/90 hover:bg-white dark:hover:bg-gray-800 text-gray-900 dark:text-white rounded-full p-3 shadow-lg backdrop-blur-sm transition-all hover:scale-110 z-10">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button id="guest-gallery-next"
                    class="absolute right-0 md:right-2 top-1/2 -translate-y-1/2 bg-white/90 dark:bg-gray-900/90 hover:bg-white dark:hover:bg-gray-800 text-gray-900 dark:text-white rounded-full p-3 shadow-lg backdrop-blur-sm transition-all hover:scale-110 z-10">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>

        <!-- Pagination Dots -->
        <div class="flex justify-center gap-2 mt-6">
            @foreach($homeGalleryImages as $index => $image)
                <button
                    class="guest-gallery-dot w-2 h-2 rounded-full {{ $index === 0 ? 'bg-primary' : 'bg-gray-300 dark:bg-gray-600' }} transition-all"
                    data-index="{{ $index }}"></button>
            @endforeach
        </div>
    </div>
@endif

