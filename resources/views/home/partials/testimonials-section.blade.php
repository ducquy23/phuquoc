<!-- Testimonials -->
<div class="mt-20">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8 pt-4">
        <div>
            <p class="text-xs font-bold tracking-[0.25em] text-gray-400 dark:text-gray-500 uppercase mb-2">
                Customer love us!
            </p>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Real stories from happy guests</h3>
        </div>
    </div>
    @if(!empty($homeTestimonials))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($homeTestimonials as $testimonial)
                <div
                    class="bg-white dark:bg-surface-dark border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                        {{ $testimonial['content'] ?? '' }}
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-100">
                            @php
                                $avatarPath = $testimonial['avatar'] ?? null;
                                $avatarUrl = $avatarPath ? asset('storage/' . $avatarPath) : 'https://phuquocapartmentsforrent.com/wp-content/uploads/2025/03/z6387435064875_00ac1ab1892acdb397433a27ce3d169b.jpg';
                            @endphp
                            <img src="{{ $avatarUrl }}" alt="{{ $testimonial['name'] ?? 'Guest' }}"
                                 class="w-full h-full object-cover">
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
</div>

