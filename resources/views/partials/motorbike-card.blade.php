<div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
    <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
        <img alt="{{ $name }}" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="{{ $image }}">
    </div>
    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">{{ $name }}</h3>
    <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">{{ $type }}</p>
    <div class="text-primary font-extrabold text-lg">{{ $price }}</div>
</div>
