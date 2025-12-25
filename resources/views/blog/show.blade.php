@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title . ' - PQ Rentals')

@if($post->meta_description)
    @section('metaDescription', $post->meta_description)
@endif

@if($post->canonical_url)
    @section('canonical', $post->canonical_url)
@endif

{{-- SEO Meta Tags --}}
@if($post->noindex || $post->nofollow)
    @section('noindex', true)
@endif

@if($post->nofollow && !$post->noindex)
    @section('nofollow', true)
@endif

@if($post->meta_keywords && is_array($post->meta_keywords))
    @section('metaKeywords', implode(', ', $post->meta_keywords))
@endif

{{-- Open Graph Tags --}}
@section('ogTitle', $post->meta_title ?? $post->title)
@section('ogDescription', $post->meta_description ?? $post->excerpt)
@section('ogImage', $post->featured_image_url)
@section('ogUrl', route('blog.show', $post->slug))
@section('ogType', 'article')

{{-- Twitter Card Tags --}}
@section('twitterTitle', $post->meta_title ?? $post->title)
@section('twitterDescription', $post->meta_description ?? $post->excerpt)
@section('twitterImage', $post->featured_image_url)

{{-- Schema Markup (JSON-LD) --}}
@section('schemaMarkup')
@if($post->schema_markup)
{!! $post->schema_markup !!}
@else
@php
$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $post->title,
    'description' => $post->meta_description ?? $post->excerpt,
    'image' => $post->featured_image_url,
    'datePublished' => $post->published_at->toIso8601String(),
    'dateModified' => $post->updated_at->toIso8601String(),
    'author' => [
        '@type' => 'Person',
        'name' => $post->author->name ?? 'Admin',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'PQ Rentals',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('assets/images/logo_phuquocapartmentsforrent-1.png'),
        ],
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => route('blog.show', $post->slug),
    ],
    'wordCount' => str_word_count(strip_tags($post->content)),
    'timeRequired' => 'PT' . ($post->reading_time ?? 5) . 'M',
];

if ($post->category) {
    $schema['articleSection'] = ucfirst(str_replace('-', ' ', $post->category));
}
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif
@endsection

@push('styles')
    <style>
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(to right, #0EA5E9, #06B6D4);
            z-index: 9999;
            transition: width 0.1s ease;
        }
    </style>
@endpush

@section('content')
    <div class="reading-progress" id="reading-progress"></div>

    <main class="pt-8 pb-20">
        <!-- Breadcrumb -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 mt-24">
            <nav class="flex items-center flex-wrap gap-2 text-sm" aria-label="Breadcrumb">
                <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
                   href="{{ route('home') }}">
                    <span class="material-icons-round text-base mr-1">home</span>
                    Home
                </a>
                <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
                <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
                   href="{{ route('blog.index') }}">Blog</a>
                @if($post->category)
                    <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
                    <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
                       href="{{ route('blog.index', ['category' => $post->category]) }}">
                        {{ ucfirst(str_replace('-', ' ', $post->category)) }}
                    </a>
                @endif
                <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
                <span class="text-gray-900 dark:text-white font-medium line-clamp-1"
                      title="{{ $post->title }}">{{ Str::limit($post->title, 50) }}</span>
            </nav>
        </div>

        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="text-center">
                @if($post->category)
                    <a href="{{ route('blog.index', ['category' => $post->category]) }}"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary font-semibold text-sm mb-6 hover:bg-primary/20 transition-colors">
                        <span class="material-icons-round text-base">label</span>
                        {{ ucfirst(str_replace('-', ' ', $post->category)) }}
                    </a>
                @endif

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 leading-tight tracking-tight">
                    {{ $post->title }}
                </h1>

                <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                    {{ $post->excerpt }}
                </p>

                <!-- Author & Meta Info -->
                <div class="flex flex-wrap items-center justify-center gap-6 text-sm">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-cyan-400 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            {{ strtoupper(substr($post->author->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 dark:text-white">{{ $post->author->name ?? 'Admin' }}</p>
                            <p class="text-gray-500 dark:text-gray-400 text-xs">Author</p>
                        </div>
                    </div>
                    <div class="h-8 w-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <span class="material-icons-round text-base">calendar_today</span>
                        <span>{{ $post->published_at->format('F d, Y') }}</span>
                    </div>
                    <div class="h-8 w-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <span class="material-icons-round text-base">schedule</span>
                        <span>{{ $post->reading_time ?? 5 }} min read</span>
                    </div>
                    <div class="h-8 w-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <span class="material-icons-round text-base">visibility</span>
                        <span>{{ number_format($post->views) }} views</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <div
                class="relative aspect-video md:aspect-[21/9] rounded-3xl overflow-hidden shadow-2xl shadow-primary/10 group">
                <img alt="{{ $post->title }}"
                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700"
                     src="{{ $post->featured_image_url }}"/>
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent pointer-events-none"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Sidebar - Share Buttons (Desktop) -->
            <div class="hidden lg:block lg:col-span-2">
                <div class="sticky top-28">
                    <div
                        class="bg-white dark:bg-surface-dark rounded-2xl p-6 shadow-soft border border-gray-100 dark:border-gray-700">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4 block">Share</span>
                        <div class="flex flex-col gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                               target="_blank" rel="noopener"
                               class="w-full px-4 py-2.5 rounded-xl bg-[#1877F2] text-white font-semibold text-sm hover:bg-[#166FE5] transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                                </svg>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&amp;text={{ urlencode($post->title) }}"
                               target="_blank" rel="noopener"
                               class="w-full px-4 py-2.5 rounded-xl bg-[#1DA1F2] text-white font-semibold text-sm hover:bg-[#1A91DA] transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                                </svg>
                                Twitter
                            </a>
                            <button data-copy-url="{{ route('blog.show', $post->slug) }}"
                                    class="copy-link-btn w-full px-4 py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors flex items-center justify-center gap-2"
                                    title="Copy Link">
                                <span class="material-icons-round text-lg">link</span>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Content -->
            <article class="col-span-1 lg:col-span-8">
                <div
                    class="prose prose-lg prose-slate dark:prose-invert max-w-none prose-headings:font-bold prose-headings:text-gray-900 dark:prose-headings:text-white prose-p:text-gray-600 dark:prose-p:text-gray-300 prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 dark:prose-strong:text-white prose-img:rounded-2xl prose-img:shadow-lg">
                    {!! $post->content !!}
                </div>

                <!-- Tags Section -->
                @if($post->tags->where('type', 'blog_tags')->count() > 0)
                    <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-700">
                        <h3 class="text-sm font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-4">
                            Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags->where('type', 'blog_tags') as $tag)
                                <a href="{{ route('blog.index', ['category' => $post->category]) }}"
                                   class="px-4 py-2 rounded-full bg-gray-100 dark:bg-surface-dark text-gray-700 dark:text-gray-300 text-sm font-medium hover:bg-primary hover:text-white transition-all duration-200">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Author Card -->
                <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-700">
                    <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 flex items-start gap-4">
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-cyan-400 flex items-center justify-center text-white font-bold text-2xl shadow-lg flex-shrink-0">
                            {{ strtoupper(substr($post->author->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">{{ $post->author->name ?? 'Admin' }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Author & Local Expert</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                Sharing insights and tips about living in Phu Quoc, Vietnam.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Share Buttons -->
                <div class="lg:hidden mt-8 pt-8 border-t border-gray-100 dark:border-gray-700">
                    <h3 class="text-sm font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-4">Share
                        this article</h3>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                           target="_blank" rel="noopener"
                           class="flex-1 px-4 py-3 rounded-xl bg-[#1877F2] text-white font-semibold text-sm hover:bg-[#166FE5] transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                            </svg>
                            Share
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&amp;text={{ urlencode($post->title) }}"
                           target="_blank" rel="noopener"
                           class="flex-1 px-4 py-3 rounded-xl bg-[#1DA1F2] text-white font-semibold text-sm hover:bg-[#1A91DA] transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                            </svg>
                            Tweet
                        </a>
                        <button data-copy-url="{{ route('blog.show', $post->slug) }}"
                                class="copy-link-btn px-4 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                                title="Copy Link">
                            <span class="material-icons-round">link</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Right Sidebar (Empty for now) -->
            <div class="hidden lg:block lg:col-span-2">
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 gap-4">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">Related
                            Articles</h2>
                        <p class="text-gray-500 dark:text-gray-400">More stories you might enjoy</p>
                    </div>
                    <a href="{{ route('blog.index', ['category' => $post->category]) }}"
                       class="inline-flex items-center text-primary font-semibold hover:text-sky-600 transition-colors text-sm">
                        View All <span class="material-icons-round text-base ml-1">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $relatedPost)
                        <article
                            class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
                            <div class="relative h-48 overflow-hidden">
                                <img alt="{{ $relatedPost->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                     src="{{ $relatedPost->featured_image_url }}"/>
                                @if($relatedPost->category)
                                    <span
                                        class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ ucfirst(str_replace('-', ' ', $relatedPost->category)) }}
                    </span>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                                    <span class="material-icons-round text-xs">calendar_today</span>
                                    <span>{{ $relatedPost->published_at->format('M d, Y') }}</span>
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <span>{{ $relatedPost->reading_time ?? 5 }} min read</span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 leading-snug group-hover:text-primary transition-colors line-clamp-2">
                                    <a href="{{ route('blog.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2 flex-grow">
                                    {{ $relatedPost->excerpt }}
                                </p>
                                <a href="{{ route('blog.show', $relatedPost->slug) }}"
                                   class="inline-flex items-center text-primary text-xs font-bold hover:underline mt-auto">
                                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Navigation -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
            <div class="flex items-center justify-between pt-8 border-t border-gray-100 dark:border-gray-700">
                <a href="{{ route('blog.index') }}"
                   class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-primary transition-colors font-medium">
                    <span class="material-icons-round">arrow_back</span>
                    Back to Blog
                </a>
                @if($post->category)
                    <a href="{{ route('blog.index', ['category' => $post->category]) }}"
                       class="inline-flex items-center gap-2 text-primary hover:text-sky-600 transition-colors font-medium">
                        More {{ ucfirst(str_replace('-', ' ', $post->category)) }} Posts
                        <span class="material-icons-round">arrow_forward</span>
                    </a>
                @endif
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            // Reading progress indicator
            window.addEventListener('scroll', function () {
                const windowHeight = window.innerHeight;
                const documentHeight = document.documentElement.scrollHeight;
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollPercent = (scrollTop / (documentHeight - windowHeight)) * 100;
                document.getElementById('reading-progress').style.width = scrollPercent + '%';
            });

            // Copy to clipboard function
            function copyToClipboard(text, button) {
                navigator.clipboard.writeText(text).then(function () {
                    // Show toast notification
                    const originalText = button.innerHTML;
                    button.innerHTML = '<span class="material-icons-round text-lg">check</span> Copied!';
                    button.classList.add('bg-green-500', 'text-white');
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.classList.remove('bg-green-500', 'text-white');
                    }, 2000);
                }).catch(function (err) {
                    console.error('Failed to copy: ', err);
                    alert('Failed to copy link. Please try again.');
                });
            }

            // Handle copy link buttons
            document.querySelectorAll('.copy-link-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const url = this.getAttribute('data-copy-url');
                    copyToClipboard(url, this);
                });
            });
        </script>
    @endpush
@endsection
