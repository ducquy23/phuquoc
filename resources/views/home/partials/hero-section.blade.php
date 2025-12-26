<section class="relative min-h-[90vh] flex flex-col pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Beautiful sea view through window" class="w-full h-full object-cover"
             src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzZtWeCVkfPUNzvMLQxfEmP3FzQBdYERRVtMTrY-jSx1jIDrEBpA9YhKwaAF7zJ3pdJ8fIqDLyLVfjpB6heImm6HToq8Ng8uTFJ6h8wOLE2M1H1CGb-5Y936YQctkhSiQZHlDUEMtKm_DBp7j-Mswog0o0SxvVqh3cFjbQjaupPLvR0VLLUgDxhKvWv0SL7fTXeWU4SHm-vLftMXMzmzgOWPzhk8sbHU-lxI3igxY8_0Ys7YUYFQ-PJdLl-Z1LAYQDwwCfwLc2-V7I"/>
        <div class="absolute inset-0 bg-white/20 dark:bg-black/40"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex-1 flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-6xl lg:text-[4rem] font-bold text-gray-900 dark:text-white mb-6 leading-tight tracking-tight drop-shadow-sm">
            Discover Your Perfect <span class="text-primary">Phu Quoc</span> <br class="hidden md:block"/> Apartment
            for Rent
        </h1>
        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-200 max-w-2xl mx-auto mb-12 font-medium drop-shadow-sm">
            Find the best long-term and short-term rentals with stunning ocean views.
        </p>
        <div
            class="w-full max-w-5xl bg-white dark:bg-surface-dark rounded-[2rem] shadow-float p-8 border border-gray-100 dark:border-gray-700/50 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-1 w-full">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                        <input
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all placeholder-gray-400"
                            placeholder="Keyword" type="text"/>
                    </div>
                    <div class="flex bg-gray-100 dark:bg-gray-800 p-1.5 rounded-full w-full md:w-auto shrink-0">
                        <button
                            class="flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold bg-primary text-white shadow-sm transition-all">
                            All
                        </button>
                        <button
                            class="flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                            Available
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative group">
                        <select
                            class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroLocations ?? [] as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select
                            class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroPropertyTypes ?? [] as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select
                            class="home-filter-select w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            @foreach($heroBeds ?? [] as $bed)
                                <option value="{{ $bed }}">{{ $bed }}</option>
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
                                    <input type="range" id="price-min" min="{{ $priceRange['min'] ?? 0 }}" max="{{ $priceRange['max'] ?? 2000 }}" value="{{ $priceRange['min'] ?? 0 }}" step="10"
                                           class="price-range-input">
                                    <input type="range" id="price-max" min="{{ $priceRange['min'] ?? 0 }}" max="{{ $priceRange['max'] ?? 2000 }}" value="{{ $priceRange['max'] ?? 2000 }}" step="10"
                                           class="price-range-input">
                                </div>
                                <input type="hidden" id="price-min-value" name="price_min" value="{{ $priceRange['min'] ?? 0 }}">
                                <input type="hidden" id="price-max-value" name="price_max" value="{{ $priceRange['max'] ?? 2000 }}">
                            </div>
                        </div>

                        <!-- Area Range Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="min-area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Min Area (m²)
                                </label>
                                <input type="number" id="min-area" min="0" step="1"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                                       placeholder="Min area">
                            </div>
                            <div>
                                <label for="max-area" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Max Area (m²)
                                </label>
                                <input type="number" id="max-area" min="0" step="1"
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
                        <button
                            class="w-full md:w-40 bg-primary hover:bg-secondary text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

