@if(isset($latestPosts) && $latestPosts->count() > 0)
    <section class="py-24 bg-background-light dark:bg-background-dark transition-colors duration-300" id="blog">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Latest Blog Posts</h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">Discover tips, guides, and stories
                        about Phu Quoc</p>
                </div>
                <a class="inline-flex items-center text-primary font-bold hover:text-secondary transition-colors group"
                   href="{{ route('blog.index') }}">
                    View All Posts <span
                        class="material-symbols-outlined ml-1 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    <article
                        class="group bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col h-full">
                        <div class="relative h-56 overflow-hidden">
                            <img alt="{{ $post->title }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                 src="{{ $post->featured_image_url }}"/>
                            @if($post->category)
                                <span
                                    class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ ucfirst(str_replace('-', ' ', $post->category)) }}
                    </span>
                            @endif
                            @if($post->is_featured)
                                <span
                                    class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">Featured</span>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                <span>{{ $post->published_at->format('M d, Y') }}</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span>{{ $post->reading_time ?? 5 }} min read</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                                {{ $post->excerpt }}
                            </p>
                            <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto"
                               href="{{ route('blog.show', $post->slug) }}">
                                Read More <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

