<div class="bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 group border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
    <div class="relative h-72 overflow-hidden">
        <img alt="{{ $apartment->title ?? 'Apartment' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $apartment->image ?? 'https://via.placeholder.com/400x300' }}">
        <div class="absolute top-4 left-4 flex gap-2">
            @if($apartment->is_available ?? true)
                <span class="bg-white/95 dark:bg-gray-900/95 text-gray-800 dark:text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm backdrop-blur-sm">Available</span>
            @endif
            @if($apartment->is_featured ?? false)
                <span class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Featured</span>
            @endif
        </div>
        @if(isset($apartment->photos_count))
            <div class="absolute top-4 right-4 bg-black/60 text-white text-xs font-medium px-2.5 py-1 rounded-lg flex items-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-sm mr-1">photo_camera</span> {{ $apartment->photos_count }}
            </div>
        @endif
        <button class="absolute bottom-4 right-4 p-2.5 bg-white dark:bg-gray-800 rounded-full text-gray-400 hover:text-red-500 transition-colors shadow-lg hover:scale-110 transform duration-200">
            <span class="material-symbols-outlined text-xl">favorite</span>
        </button>
    </div>
    <div class="p-6 flex-1 flex flex-col">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-tight">
            <a href="{{ route('apartments.show', $apartment->id ?? 1) }}">{{ $apartment->title ?? 'Apartment Title' }}</a>
        </h3>
        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-5">
            <span class="material-symbols-outlined text-sm mr-1 text-primary">location_on</span>
            {{ $apartment->heroFilterLocation->name ?? $apartment->district ?? 'Location' }}
        </div>
        <div class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-5 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mb-0.5">Apartment</p>
                <p class="text-xl font-extrabold text-gray-900 dark:text-white">${{ number_format($apartment->price ?? 732) }} <span class="text-xs font-medium text-gray-500">/ Monthly</span></p>
            </div>
            <div class="flex gap-4">
                <div class="text-center">
                    <span class="material-symbols-outlined text-gray-400 text-xl mb-1">bed</span>
                    <p class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ $apartment->beds ?? 1 }}</p>
                </div>
                <div class="text-center">
                    <span class="material-symbols-outlined text-gray-400 text-xl mb-1">square_foot</span>
                    <p class="text-xs font-bold text-gray-700 dark:text-gray-300">{{ $apartment->area ?? 50 }} m²</p>
                </div>
            </div>
        </div>
        @if(isset($apartment->added_at))
            <p class="text-[10px] text-gray-400 mt-4 font-medium">Added: {{ $apartment->added_at }}</p>
        @endif
    </div>
</div>
