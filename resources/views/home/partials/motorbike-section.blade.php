<section class="py-24 bg-white dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-4">Motorbike
                Rentals</h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg">Explore Phu Quoc island with
                freedom. We offer reliable scooters and motorbikes for your adventure at the best daily and monthly
                rates.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($motorbikes ?? [] as $motorbike)
            <div
                class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div
                    class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="{{ $motorbike->name }}"
                         class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500"
                         src="{{ $motorbike->featured_image_url }}"
                         onerror="this.src='{{ asset('images/placeholder-motorbike.jpg') }}'"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">{{ $motorbike->name }}</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">
                    {{ $motorbike->type_display }}@if($motorbike->engine_size) • {{ $motorbike->engine_size }}@endif
                </p>
                <div class="text-primary font-extrabold text-lg">{{ $motorbike->formatted_price_daily }} / Day</div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 dark:text-gray-400">No motorbikes available at the moment.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a class="text-primary font-bold hover:text-secondary underline decoration-2 underline-offset-4 transition-colors"
               href="#">View Rental Requirements</a>
        </div>
    </div>
</section>

