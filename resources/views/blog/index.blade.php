@extends('layouts.app')

@section('title', 'Articles & Blog - PQ Rentals')
@section('metaDescription', 'Your ultimate guide to island life. Discover rental tips, local secrets, and the best spots for digital nomads in Phu Quoc.')
@section('ogType', 'website')
@section('ogTitle', 'Articles & Blog - PQ Rentals')
@section('ogDescription', 'Your ultimate guide to island life. Discover rental tips, local secrets, and the best spots for digital nomads in Phu Quoc.')
@section('ogImage', asset('assets/images/logo_phuquocapartmentsforrent-1.png'))
@section('ogUrl', route('blog.index'))

{{-- Schema Markup for Blog Index --}}
@section('schemaMarkup')
@php
$blogPosts = collect();
if (isset($featuredPost) && $featuredPost) {
    $blogPosts->push($featuredPost);
}
if (isset($posts) && $posts) {
    $blogPosts = $blogPosts->merge($posts->items());
}

$itemList = $blogPosts->take(10)->map(function($post) {
    return [
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => $post->excerpt,
        'url' => route('blog.show', $post->slug),
        'datePublished' => $post->published_at->toIso8601String(),
        'image' => $post->featured_image_url,
        'author' => [
            '@type' => 'Person',
            'name' => $post->author->name ?? 'Admin',
        ],
    ];
})->values()->all();

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Articles & Blog - PQ Rentals',
    'description' => 'Your ultimate guide to island life. Discover rental tips, local secrets, and the best spots for digital nomads in Phu Quoc.',
    'url' => route('blog.index'),
    'mainEntity' => [
        '@type' => 'ItemList',
        'numberOfItems' => $blogPosts->count(),
        'itemListElement' => $itemList,
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'PQ Rentals',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('assets/images/logo_phuquocapartmentsforrent-1.png'),
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<header class="relative pt-16 pb-12 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/5 to-transparent dark:from-primary/10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight mt-24">
            Phu Quoc <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-cyan-400">Living &amp; Travel</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10">
            Your ultimate guide to island life. Discover rental tips, local secrets, and the best spots for digital nomads in Phu Quoc.
        </p>
        <form id="search-form" class="max-w-2xl mx-auto bg-white dark:bg-surface-dark p-2 rounded-full shadow-soft border border-gray-100 dark:border-gray-700 flex items-center">
            <span class="material-icons-round text-gray-400 ml-4">search</span>
            <input id="search-input" name="search" value="{{ $searchQuery ?? '' }}" class="w-full border-none focus:ring-0 text-gray-700 dark:text-white bg-transparent placeholder-gray-400 px-4 py-2" placeholder="Search articles, e.g. 'Visa' or 'Best Beaches'" type="text"/>
            <button type="submit" class="bg-primary hover:bg-sky-600 text-white px-6 py-2 rounded-full font-medium transition-colors">
                Search
            </button>
        </form>
        <div class="flex flex-wrap justify-center gap-3 mt-8" id="category-filters">
            <button data-category="all" class="category-filter px-5 py-2 rounded-full {{ $currentCategory === 'all' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary' }} transition-all text-sm font-medium">All Posts</button>
            <button data-category="apartment-hunting" class="category-filter px-5 py-2 rounded-full {{ $currentCategory === 'apartment-hunting' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary' }} transition-all text-sm font-medium">Apartment Hunting</button>
            <button data-category="local-life" class="category-filter px-5 py-2 rounded-full {{ $currentCategory === 'local-life' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary' }} transition-all text-sm font-medium">Local Life</button>
            <button data-category="travel-tips" class="category-filter px-5 py-2 rounded-full {{ $currentCategory === 'travel-tips' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary' }} transition-all text-sm font-medium">Travel Tips</button>
            <button data-category="legal-visa" class="category-filter px-5 py-2 rounded-full {{ $currentCategory === 'legal-visa' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary' }} transition-all text-sm font-medium">Legal &amp; Visa</button>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20" id="blog-content">
    <div id="loading-indicator" class="hidden text-center py-12">
        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
        <p class="text-gray-500 dark:text-gray-400 mt-4">Loading posts...</p>
    </div>
    
    <div id="blog-posts-container">
        @if($featuredPost)
            @include('blog.partials.featured-post', ['post' => $featuredPost])
        @endif

        @include('blog.partials.posts-grid', ['posts' => $posts])

        @if($posts->hasPages())
            @include('blog.partials.pagination', ['posts' => $posts])
        @endif
    </div>
</main>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const blogContent = document.getElementById('blog-posts-container');
    const loadingIndicator = document.getElementById('loading-indicator');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Function to load posts via AJAX
    function loadPosts(category, search) {
        // Show loading
        loadingIndicator.classList.remove('hidden');
        blogContent.style.opacity = '0.5';

        // Make AJAX request
        fetch('{{ route("blog.filter") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ 
                category: category || 'all',
                search: search || ''
            })
        })
        .then(response => response.json())
        .then(data => {
            // Update URL without reload
            const url = new URL(window.location);
            if (category === 'all' || !category) {
                url.searchParams.delete('category');
            } else {
                url.searchParams.set('category', category);
            }
            if (search && search.trim()) {
                url.searchParams.set('search', search);
            } else {
                url.searchParams.delete('search');
            }
            window.history.pushState({}, '', url);

            // Update blog content
            const blogContainer = document.getElementById('blog-posts-container');
            if (blogContainer) {
                // Combine all HTML parts
                let newHtml = '';
                if (data.featuredPostHtml) {
                    newHtml += data.featuredPostHtml;
                }
                newHtml += data.postsHtml;
                if (data.paginationHtml) {
                    newHtml += data.paginationHtml;
                }
                
                blogContainer.innerHTML = newHtml;
            }

            // Scroll to top smoothly
            window.scrollTo({ top: 0, behavior: 'smooth' });
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while loading posts. Please try again.');
        })
        .finally(() => {
            // Hide loading
            loadingIndicator.classList.add('hidden');
            blogContent.style.opacity = '1';
        });
    }

    // Category filter handlers
    categoryFilters.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active state
            categoryFilters.forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white', 'shadow-md', 'shadow-primary/20');
                btn.classList.add('bg-white', 'dark:bg-surface-dark', 'text-gray-600', 'dark:text-gray-300', 'border', 'border-gray-200', 'dark:border-gray-700');
            });
            
            this.classList.remove('bg-white', 'dark:bg-surface-dark', 'text-gray-600', 'dark:text-gray-300', 'border', 'border-gray-200', 'dark:border-gray-700');
            this.classList.add('bg-primary', 'text-white', 'shadow-md', 'shadow-primary/20');

            // Load posts with current search query
            const currentSearch = searchInput ? searchInput.value.trim() : '';
            loadPosts(category, currentSearch);
        });
    });

    // Search form handler
    if (searchForm && searchInput) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchQuery = searchInput.value.trim();
            const activeCategory = document.querySelector('.category-filter.bg-primary')?.getAttribute('data-category') || 'all';
            loadPosts(activeCategory, searchQuery);
        });

        // Real-time search on input (debounced)
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const searchQuery = this.value.trim();
            
            // Only search if query is empty or has at least 2 characters
            if (searchQuery.length === 0 || searchQuery.length >= 2) {
                searchTimeout = setTimeout(() => {
                    const activeCategory = document.querySelector('.category-filter.bg-primary')?.getAttribute('data-category') || 'all';
                    loadPosts(activeCategory, searchQuery);
                }, 500); // Wait 500ms after user stops typing
            }
        });
    }

    // Newsletter subscription form
    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterEmail = document.getElementById('newsletter-email');
    const newsletterSubmit = document.getElementById('newsletter-submit');
    const newsletterSubmitText = document.getElementById('newsletter-submit-text');
    const newsletterMessage = document.getElementById('newsletter-message');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = newsletterEmail.value.trim();
            if (!email) {
                showNewsletterMessage('Please enter a valid email address.', 'error');
                return;
            }

            // Disable form
            newsletterSubmit.disabled = true;
            newsletterSubmitText.textContent = 'Subscribing...';
            newsletterMessage.classList.add('hidden');

            // Submit via AJAX
            fetch('{{ route("blog.subscribe") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNewsletterMessage(data.message, 'success');
                    newsletterEmail.value = '';
                } else {
                    showNewsletterMessage(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNewsletterMessage('An error occurred. Please try again later.', 'error');
            })
            .finally(() => {
                // Re-enable form
                newsletterSubmit.disabled = false;
                newsletterSubmitText.textContent = 'Subscribe';
            });
        });
    }

    function showNewsletterMessage(message, type) {
        newsletterMessage.textContent = message;
        newsletterMessage.classList.remove('hidden', 'text-green-600', 'text-red-600', 'dark:text-green-400', 'dark:text-red-400');
        
        if (type === 'success') {
            newsletterMessage.classList.add('text-green-600', 'dark:text-green-400');
        } else {
            newsletterMessage.classList.add('text-red-600', 'dark:text-red-400');
        }

        // Auto-hide after 5 seconds
        setTimeout(() => {
            newsletterMessage.classList.add('hidden');
        }, 5000);
    }
});
</script>
@endpush

<section class="bg-white dark:bg-surface-dark py-16 border-t border-gray-100 dark:border-gray-700">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Don't Miss Out</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
            Get the Latest Phu Quoc Updates
        </h2>
        <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-xl mx-auto">
            Join our newsletter to receive weekly updates on new property listings, island news, and exclusive rental deals.
        </p>
        <form id="newsletter-form" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            @csrf
            <input id="newsletter-email" name="email" class="flex-grow px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-600 dark:bg-background-dark dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all @error('email') border-red-500 @enderror" placeholder="Your email address" type="email" required/>
            <button type="submit" id="newsletter-submit" class="bg-primary hover:bg-sky-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all hover:scale-105 whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span id="newsletter-submit-text">Subscribe</span>
            </button>
        </form>
        <div id="newsletter-message" class="mt-4 text-sm font-medium hidden"></div>
        <p class="text-xs text-gray-400 mt-2">We respect your privacy. Unsubscribe at any time.</p>
    </div>
</section>
@endsection
