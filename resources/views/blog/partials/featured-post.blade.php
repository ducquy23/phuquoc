@if($post)
<div class="mb-12" id="featured-post-container">
    <div class="group relative bg-white dark:bg-surface-dark rounded-3xl overflow-hidden shadow-soft hover:shadow-hover transition-all duration-300 border border-gray-100 dark:border-gray-700 grid grid-cols-1 lg:grid-cols-2">
        <div class="relative h-64 lg:h-full overflow-hidden">
            <img alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" src="{{ $post->featured_image_url }}"/>
            <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Featured</div>
        </div>
        <div class="p-8 lg:p-12 flex flex-col justify-center">
            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-3">
                <span class="material-icons-round text-base">calendar_today</span> {{ $post->published_at->format('M d, Y') }}
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>{{ $post->reading_time ?? 5 }} min read</span>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-primary transition-colors break-words leading-tight">
                {{ $post->title }}
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                {{ $post->excerpt }}
            </p>
            <a class="inline-flex items-center text-primary font-bold hover:text-sky-600 transition-colors" href="{{ route('blog.show', $post->slug) }}">
                Read Full Story <span class="material-icons-round ml-1 text-lg">arrow_forward</span>
            </a>
        </div>
    </div>
</div>
@endif

