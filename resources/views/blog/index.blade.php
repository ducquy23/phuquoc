@extends('layouts.app')

@section('title', 'Articles & Blog - PQ Rentals')

@section('content')
<header class="relative pt-16 pb-12 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/5 to-transparent dark:from-primary/10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
            Phu Quoc <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-cyan-400">Living &amp; Travel</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10">
            Your ultimate guide to island life. Discover rental tips, local secrets, and the best spots for digital nomads in Phu Quoc.
        </p>
        <div class="max-w-2xl mx-auto bg-white dark:bg-surface-dark p-2 rounded-full shadow-soft border border-gray-100 dark:border-gray-700 flex items-center">
            <span class="material-icons-round text-gray-400 ml-4">search</span>
            <input class="w-full border-none focus:ring-0 text-gray-700 dark:text-white bg-transparent placeholder-gray-400 px-4 py-2" placeholder="Search articles, e.g. 'Visa' or 'Best Beaches'" type="text"/>
            <button class="bg-primary hover:bg-sky-600 text-white px-6 py-2 rounded-full font-medium transition-colors">
                Search
            </button>
        </div>
        <div class="flex flex-wrap justify-center gap-3 mt-8">
            <button class="px-5 py-2 rounded-full bg-primary text-white text-sm font-medium shadow-md shadow-primary/20">All Posts</button>
            <button class="px-5 py-2 rounded-full bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary transition-all text-sm font-medium">Apartment Hunting</button>
            <button class="px-5 py-2 rounded-full bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary transition-all text-sm font-medium">Local Life</button>
            <button class="px-5 py-2 rounded-full bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover;border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary transition-all text-sm font-medium">Travel Tips</button>
            <button class="px-5 py-2 rounded-full bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:border-primary dark:hover:border-primary hover:text-primary dark:hover:text-primary transition-all text-sm font-medium">Legal &amp; Visa</button>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="mb-12">
        <div class="group relative bg-white dark:bg-surface-dark rounded-3xl overflow-hidden shadow-soft hover:shadow-hover transition-all duration-300 border border-gray-100 dark:border-gray-700 grid grid-cols-1 lg:grid-cols-2">
            <div class="relative h-64 lg:h-full overflow-hidden">
                <img alt="Sunset Town Phu Quoc" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBT_KR0yCwR9hRvK3TD--qEOJL3jjbZUmvHE3p-dNeiA7D3L5e9tw-62r9AhVx5kpYWc5lqErqt-1IMJuKrHVhD1Qg71IMuHSU3WsVsXD1uiRjyzMW7WNQgHfp6qW4ByNRggv8D3BPkMBBpMHIky6fIMtHKh1_mswnlty-pAQ4mAZfw520Df3Orrlq1iRT_FHe1iz93jSdqe-27QQKAbwIINEvsx9-AQ6I-UD0mLRqlaN65zgL-Om7vLRSmDmq3nGxJP14zM621zwUv"/>
                <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Featured</div>
            </div>
            <div class="p-8 lg:p-12 flex flex-col justify-center">
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-3">
                    <span class="material-icons-round text-base">calendar_today</span> Oct 24, 2023
                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                    <span>5 min read</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-primary transition-colors">
                    Why Sunset Town is the Best Place for Long-Term Rentals in 2024
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                    Sunset Town isn't just a tourist attraction anymore. With new infrastructure, high-speed internet, and stunning Mediterranean architecture, it's becoming the top choice for expats and digital nomads.
                </p>
                <a class="inline-flex items-center text-primary font-bold hover:text-sky-600 transition-colors" href="#">
                    Read Full Story <span class="material-icons-round ml-1 text-lg">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div class="relative h-56 overflow-hidden">
                <img alt="Luxury Hotel Room" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnuO9AqmZBsMwELfQ4FLo7WHomOGa9mI7eIlppkEeB3AEX3D5d3eT5QCZ72af0ajrRx9Svrfyc-zJaEApdH34AaT-M3vYIcRCV4qWFeveW2R218eux5zcjSaB3W7xqpWtyO3FwHKmxK6rRaa5Y18RHogN5axVFRfQ5P7aqwTlWf6hLVJXYtxQqMjjnq0Xxd2wvSCe3TZBd1KN4pCsOz3iDKsT__Yd1w_6gyFUNz2mnb_xkn2Q1JbfJwfwtTy9aZUy0W22h5b2AtBro"/>
                <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Apartment Hunting</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                    <span>Sep 12, 2023</span> • <span>3 min read</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors">
                    Top 5 Luxury Apartments with Ocean Views
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                    Looking for that perfect morning view? We've curated a list of the most stunning high-rise apartments available for rent right now.
                </p>
                <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="#">
                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                </a>
            </div>
        </article>

        <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div class="relative h-56 overflow-hidden">
                <img alt="Vietnamese Street Food" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfDHQp0LVOfWOrkgw9u7SQrPGkExDE91tBwwc2WiqhWq0aCMx5mTU7W6K58BhUZcH31cpzPNIaZEU1FDPG13cyxoAWcXQoDHg2kepxEgPmA1816C_jrJiGACEjMveEyMzNRb4QODeWoxgtrc3K34jJpOTITSvF5pbyZuB_Xoyt0MNGuN0OjFoiAdLsuLK0pRjJUC-M_VXq_SSXHrNL5NwyH2gJ-zgX4sGoyKE6vKkzgKNITZ387cp9K091dCXR3TqfDdkqxlYgZwW3"/>
                <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text:white text-xs font-bold px-3 py-1 rounded-full">Local Life</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                    <span>Aug 28, 2023</span> • <span>6 min read</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors">
                    Best Local Markets for Fresh Produce
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                    Skip the supermarket and shop like a local. Here is our guide to the freshest seafood, fruits, and vegetables in Duong Dong market.
                </p>
                <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="#">
                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                </a>
            </div>
        </article>

        <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div class="relative h-56 overflow-hidden">
                <img alt="Scooter Rental" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCc1DMdCbfIOVNfD_UKeLFoHLKCZ4fO034Dk_HMSddJJmsjqe7_NU2Dlh36eWad1yT2UBmghQsXR8uECTyjmqDNsMx9NBDG52hfqZInFSp-DYbBCSB4OwWd7tzfleTxseQJLtn1vbvYjygwnfSHZjfkV7bEy94ZAETGYtHZDYFAQjVa4Y7TqGBrCX7AeI6uZhvjMPHjjJoZoNdQEA9J1SVKLQAdG9hZ_zPtyZ0Ygh1pOdEeMWdPNDFZtZuYJZOdvZD7qqcU4K9Ngv-b"/>
                <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Transport</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                    <span>Aug 15, 2023</span> • <span>4 min read</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors">
                    Renting a Motorbike: Safety &amp; Legal Tips
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                    Driving in Vietnam can be chaotic. Learn about the necessary licenses, rental costs, and safety tips before you hit the road.
                </p>
                <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="#">
                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                </a>
            </div>
        </article>

        <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div class="relative h-56 overflow-hidden">
                <img alt="Cable Car Phu Quoc" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_CAcuq1I5YnJIaeaUS2MW5PemPzETbEI9AOJGUrvd2odQHVTAdvaNp7kpSWNqzoonfQ90u-vXU3C18qXB2ZUtaCCEqfq0X-MErJv8JvAjvnam1CWCw9g6qjDWHfzbf70Skw5FCYHQ0qcufsPhK4oQ9bisnyVj70biElgby-B8DvRJSvbRJG7fkbP0uxAO_4m6OrESEZNZZZYMa53S8j_B6DnCNj0yA5IQJJCZ5fpdYys4D5BrW7FkMyCqN6rffij9BeZKbL6KvlRo"/>
                <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Travel Guide</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                    <span>Jul 22, 2023</span> • <span>7 min read</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors">
                    The Ultimate Weekend Itinerary for Visitors
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                    Friends visiting? Here is the perfect 3-day plan covering the Cable Car, Starfish Beach, and the best night markets.
                </p>
                <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="#">
                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                </a>
            </div>
        </article>

        <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div class="relative h-56 overflow-hidden">
                <img alt="Contract Signing" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpWZ08UrxDzEu-DHh-aOkOlf9wfxzxGJqfd3C34UT_8NnQczteDahGUUBRn9q38uLL-RSoGFQVM1dksAUGlD5B1OB9CZFuDrjUMH6oARa9aak7bCDugWWPpcZyVznMXy1my8Yb87jhcewwLcZus6qbb1muoeE9Qr7XQ4Z2QMRJ3NwhD78iLRgAerAdOEhkMGM5pFWOMGQVBur6rk5r7gR5lzBWxQhCZu4fqN-6kcI2_0_rD-SebboKSgzzFa2YkTkUjdUgPMw30US4"/>
                <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Legal</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                    <span>Jul 10, 2023</span> • <span>5 min read</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors">
                    Understanding Rental Contracts in Vietnam
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                    Don't get caught out by hidden clauses. We explain the standard terms for deposits, utility bills, and lease extensions.
                </p>
                <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="#">
                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                </a>
            </div>
        </article>

        <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div class="relative h-56 overflow-hidden">
                <img alt="Coffee Shop" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxiaWBx19dPOvMQfypACdqE6QuMGZMlnijvUYwWAcryNcwLIJkQFIODv1SHTehLIquE_wmKxFXRdnO_4M4ZilVTQcp9RELMTGY6cWUkIiVC59OR4oXRxhGugitupK7OwIDrxFtKrFqdqsYpgmWTgQggylBfs-SGd7fIKT-qfKcb7JwZ5NoJ_kY7vghPWhf3LME50ELn-RmRkSxcN6CI5DLuYuHMQ_cZVBGNsny8O4L5EF660TTaX3OVXcR35U0g5uDJAi7fisGmlRb"/>
                <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Lifestyle</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                    <span>Jun 05, 2023</span> • <span>4 min read</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text:white mb-3 leading-snug group-hover:text-primary transition-colors">
                    Digital Nomad Friendly Cafes in Phu Quoc
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">
                    Need strong WiFi and great coffee? Here are the best spots to work remotely from, with AC and power outlets included.
                </p>
                <a class="inline-flex items-center text-primary text-sm font-bold hover:underline mt-auto" href="#">
                    Read More <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                </a>
            </div>
        </article>
    </div>

    <div class="mt-16 flex justify-center">
        <nav aria-label="Pagination" class="flex items-center gap-2">
            <a class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors" href="#">
                <span class="material-icons-round text-sm">chevron_left</span>
            </a>
            <a class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white font-bold shadow-md shadow-primary/30" href="#">1</a>
            <a class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors" href="#">2</a>
            <a class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors" href="#">3</a>
            <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
            <a class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors" href="#">
                <span class="material-icons-round text-sm">chevron_right</span>
            </a>
        </nav>
    </div>
</main>

<section class="bg-white dark:bg-surface-dark py-16 border-t border-gray-100 dark:border-gray-700">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Don't Miss Out</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
            Get the Latest Phu Quoc Updates
        </h2>
        <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-xl mx-auto">
            Join our newsletter to receive weekly updates on new property listings, island news, and exclusive rental deals.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            <input class="flex-grow px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-600 dark:bg-background-dark dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="Your email address" type="email"/>
            <button class="bg-primary hover:bg-sky-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all hover:scale-105 whitespace-nowrap">
                Subscribe
            </button>
        </div>
        <p class="text-xs text-gray-400 mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
</section>
@endsection
