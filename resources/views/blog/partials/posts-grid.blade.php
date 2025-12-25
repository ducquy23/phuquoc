<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="posts-grid-container">
    @forelse($posts as $post)
    <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
        <div class="relative h-56 overflow-hidden">
            <img alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="{{ $post->featured_image_url }}"/>
            <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">
                {{ ucfirst(str_replace('-', ' ', $post->category)) }}
            </span>
        </div>
        <div class="p-6 flex flex-col flex-grow">
            <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                <span>{{ $post->published_at->format('M d, Y') }}</span> • <span>{{ $post->reading_time ?? 5 }} min read</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors">
                {{ $post->title }}
            </h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                {{ $post->excerpt }}
            </p>
            <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="{{ route('blog.show', $post->slug) }}">
                Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
            </a>
        </div>
    </article>
    @empty
    <div class="col-span-full text-center py-12">
        <p class="text-gray-500 dark:text-gray-400">No posts found.</p>
    </div>
    @endforelse
</div>

