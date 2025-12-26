@if($motorbikes->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($motorbikes as $motorbike)
    <a href="{{ route('motorbikes.show', $motorbike->slug) }}" class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
        <div class="relative h-64 overflow-hidden bg-white dark:bg-gray-900">
            @if($motorbike->is_featured)
            <span class="absolute top-4 left-4 z-10 bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">Featured</span>
            @endif
            <img alt="{{ $motorbike->name }}"
                 class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                 src="{{ $motorbike->featured_image_url }}"
                 onerror="this.src='{{ asset('assets/images/Image-not-found.png') }}'"
            />
        </div>
        <div class="p-5 flex flex-col flex-grow">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors mb-1">{{ $motorbike->name }}</h3>
            <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">
                {{ $motorbike->type_display }}@if($motorbike->engine_size) • {{ $motorbike->engine_size }}@endif
            </p>
            <div class="mt-auto flex justify-between items-center pt-2">
                <div>
                    <div class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $motorbike->formatted_price_daily }}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Day</div>
                    @if($motorbike->price_monthly)
                    <div class="text-sm text-slate-600 dark:text-slate-300 mt-1">{{ $motorbike->formatted_price_monthly }} / Month</div>
                    @endif
                </div>
                <span class="material-icons-round text-primary group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </div>
    </a>
    @endforeach
</div>
@else
<div class="text-center py-16">
    <p class="text-lg text-slate-600 dark:text-slate-400">No motorbikes found matching your criteria.</p>
</div>
@endif
@if($motorbikes->hasPages())
<div class="mt-16 flex justify-center" id="pagination-container">
    {{ $motorbikes->links() }}
</div>
@endif

