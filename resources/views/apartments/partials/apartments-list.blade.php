@if($apartments->count() > 0)
<div class="{{ ($view ?? 'grid') === 'list' ? 'space-y-6' : 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8' }}">
    @foreach($apartments as $apartment)
    <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
        <div class="relative h-64 overflow-hidden">
            @if($apartment->is_featured)
            <span class="absolute top-4 left-4 z-10 bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">Featured</span>
            @endif
            @if($apartment->status === 'available' && $apartment->available_from && $apartment->available_from->isFuture())
            <span class="absolute top-4 left-4 z-10 bg-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">New</span>
            @elseif($apartment->status === 'available')
            <span class="absolute top-4 left-4 z-10 bg-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">Available</span>
            @endif
            <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                <span class="material-icons-round text-xl">favorite_border</span>
            </button>
            <img alt="{{ $apartment->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="{{ $apartment->featured_image_url }}"/>
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent h-20"></div>
        </div>
        <div class="p-5 flex flex-col flex-grow">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">{{ $apartment->title }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">{{ $apartment->excerpt ?: ($apartment->heroFilterLocation->name ?? $apartment->district ?? 'Phu Quoc') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                    <span class="material-icons-round text-primary text-lg">king_bed</span>
                    <span class="text-sm font-semibold">{{ $apartment->bedrooms_display }}</span>
                </div>
                @if($apartment->area)
                <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                    <span class="material-icons-round text-primary text-lg">square_foot</span>
                    <span class="text-sm font-semibold">{{ number_format($apartment->area) }} m²</span>
                </div>
                @endif
                <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                    <span class="material-icons-round text-primary text-lg">bathtub</span>
                    <span class="text-sm font-semibold">{{ $apartment->bathrooms }} {{ Str::plural('Bath', $apartment->bathrooms) }}</span>
                </div>
            </div>
            <div class="mt-auto flex justify-between items-center pt-2">
                <div>
                    <p class="text-xs font-semibold mb-0.5 {{ $apartment->status === 'available' ? 'text-primary' : ($apartment->status === 'rented' ? 'text-red-500' : ($apartment->status === 'maintenance' ? 'text-yellow-500' : 'text-gray-500')) }}">{{ $apartment->status_badge_text }}</p>
                    <div class="flex items-baseline gap-1">
                        <span class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $apartment->formatted_price_monthly }}</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                    </div>
                </div>
                <a href="{{ route('apartments.show', $apartment->slug) }}" class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="text-center py-16">
    <p class="text-lg text-slate-600 dark:text-slate-400">No apartments found matching your criteria.</p>
</div>
@endif
@if($apartments->hasPages())
<div class="mt-16 flex justify-center" id="pagination-container">
    {{ $apartments->links() }}
</div>
@endif

