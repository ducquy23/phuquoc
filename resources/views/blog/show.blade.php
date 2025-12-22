@extends('layouts.app')

@section('title', 'Why Sunset Town is the Best Place for Long-Term Rentals in 2024 - PQ Rentals')

@section('content')
<main class="pt-8 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 text-center">
        <div class="flex items-center justify-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-6">
            <a class="hover:text-primary transition-colors" href="#">Blog</a>
            <span class="material-icons-round text-xs">chevron_right</span>
            <span class="text-primary font-medium">Living &amp; Travel</span>
        </div>
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 leading-tight tracking-tight">
            Why Sunset Town is the Best Place for Long-Term Rentals in 2024
        </h1>
        <div class="flex items-center justify-center gap-6 text-sm md:text-base">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                    <span class="material-icons-round text-gray-400 text-2xl">person</span>
                </div>
                <div class="text-left">
                    <p class="font-bold text-gray-900 dark:text-white">Sarah Jenkins</p>
                    <p class="text-gray-500 dark:text-gray-400 text-xs">Local Expat Expert</p>
                </div>
            </div>
            <div class="h-8 w-px bg-gray-200 dark:bg-gray-700"></div>
            <div class="text-gray-500 dark:text-gray-400 flex flex-col items-start">
                <span class="flex items-center gap-1"><span class="material-icons-round text-sm">calendar_today</span> Oct 24, 2023</span>
                <span class="text-xs">5 min read</span>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="relative aspect-video md:aspect-[21/9] rounded-3xl overflow-hidden shadow-2xl shadow-primary/10">
            <img alt="Sunset Town Phu Quoc Aerial View" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBT_KR0yCwR9hRvK3TD--qEOJL3jjbZUmvHE3p-dNeiA7D3L5e9tw-62r9AhVx5kpYWc5lqErqt-1IMJuKrHVhD1Qg71IMuHSU3WsVsXD1uiRjyzMW7WNQgHfp6qW4ByNRggv8D3BPkMBBpMHIky6fIMtHKh1_mswnlty-pAQ4mAZfw520Df3Orrlq1iRT_FHe1iz93jSdqe-27QQKAbwIINEvsx9-AQ6I-UD0mLRqlaN65zgL-Om7vLRSmDmq3nGxJP14zM621zwUv"/>
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent pointer-events-none"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="hidden lg:block lg:col-span-2">
            <div class="sticky top-28 flex flex-col gap-4 items-end">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Share</span>
                <button class="w-10 h-10 rounded-full bg-white dark:bg-surface-dark text-[#1877F2] shadow-soft hover:shadow-md hover:-translate-y-1 transition-all flex items-center justify-center border border-gray-100 dark:border-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-white dark:bg-surface-dark text-[#1DA1F2] shadow-soft hover:shadow-md hover:-translate-y-1 transition-all flex items-center justify-center border border-gray-100 dark:border-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path></svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-white dark:bg-surface-dark text-gray-600 dark:text-gray-300 shadow-soft hover:shadow-md hover:-translate-y-1 transition-all flex items-center justify-center border border-gray-100 dark:border-gray-700" title="Copy Link">
                    <span class="material-icons-round text-lg">link</span>
                </button>
            </div>
        </div>

        <article class="col-span-1 lg:col-span-8">
            <div class="prose prose-lg prose-slate dark:prose-invert max-w-none">
                <p class="lead text-xl md:text-2xl text-gray-600 dark:text-gray-300 leading-relaxed mb-8">
                    Sunset Town (Thị Trấn Hoàng Hôn) in southern Phu Quoc isn't just a tourist attraction anymore. With new infrastructure, high-speed internet, and stunning Mediterranean architecture, it's rapidly becoming the top choice for expats and digital nomads looking for a unique island lifestyle.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">The Mediterranean Vibe in Vietnam</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Walking through the streets of Sunset Town feels like stepping into an Italian coastal village. The developers have meticulously recreated the Amalfi Coast aesthetic, complete with vibrant terracotta roofs, cobblestone pathways, and cascading bougainvillea. For long-term residents, this offers a unique psychological benefit: the feeling of living in a curated, beautiful environment that inspires creativity. Unlike the sometimes chaotic streets of Duong Dong, Sunset Town is pedestrian-friendly, quiet, and impeccably clean.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Infrastructure Built for Modern Living</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    One of the biggest concerns for remote workers moving to islands is connectivity. Sunset Town was built recently with modern infrastructure in mind. Fiber optic internet is standard in almost every apartment building, and speeds are reliably high—often exceeding 100Mbps.
                </p>
                <figure class="my-10 rounded-2xl overflow-hidden shadow-lg border border-gray-100 dark:border-gray-700">
                    <img alt="Modern Coffee Shop in Sunset Town" class="w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxiaWBx19dPOvMQfypACdqE6QuMGZMlnijvUYwWAcryNcwLIJkQFIODv1SHTehLIquE_wmKxFXRdnO_4M4ZilVTQcp9RELMTGY6cWUkIiVC59OR4oXRxhGugitupK7OwIDrxFtKrFqdqsYpgmWTgQggylBfs-SGd7fIKT-qfKcb7JwZ5NoJ_kY7vghPWhf3LME50ELn-RmRkSxcN6CI5DLuYuHMQ_cZVBGNsny8O4L5EF660TTaX3OVXcR35U0g5uDJAi7fisGmlRb"/>
                    <figcaption class="p-4 bg-gray-50 dark:bg-surface-dark text-sm text-center text-gray-500 italic">
                        Plenty of modern cafes offer strong WiFi and AC for digital nomads.
                    </figcaption>
                </figure>
                <h3 class="text-xl font-bold text-gray-900 dark:text:white mt-8 mb-3">Accommodation Options</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    The rental market here is shifting from short-term vacation stays to accommodating 6-12 month leases. You can find high-end studio apartments with ocean views starting from as low as $400 USD per month. These units often come fully furnished with modern appliances, smart TVs, and kitchenettes, making the move-in process seamless.
                </p>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Additionally, many buildings offer amenities such as gyms, infinity pools, and 24/7 security, providing a level of comfort and safety that is hard to match elsewhere on the island at this price point.
                </p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Community and Lifestyle</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    While it started as a tourist destination, a real community is forming. The "Kiss Bridge" and the nightly fireworks show are spectacular, but the local life is found in the small expat meetups at the hillside bars and the growing number of western-style restaurants. It is quieter than the main tourist drag, which appeals to those who want to focus on work during the day and relax with a glass of wine by the harbor at sunset.
                </p>
                <div class="bg-primary/5 border border-primary/20 rounded-2xl p-6 my-8">
                    <h4 class="font-bold text-primary mb-2 flex items-center gap-2">
                        <span class="material-icons-round">lightbulb</span> Pro Tip
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        If you are planning to rent here, try to negotiate a contract that includes electricity or water fees, as these can vary. Contact our agents at PQ Rentals for a list of verified landlords who offer "all-inclusive" packages.
                    </p>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-10 mb-4">Conclusion</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    If you are looking for a blend of European charm and Vietnamese island life, Sunset Town is currently the best value proposition in Phu Quoc. The combination of modern housing, reliable internet, and stunning aesthetics makes it a top contender for your next long-term home base.
                </p>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-700">
                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 dark:bg-surface-dark text-gray-600 dark:text-gray-400 text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">#SunsetTown</span>
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 dark:bg-surface-dark text-gray-600 dark:text-gray-400 text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">#DigitalNomad</span>
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 dark:bg-surface-dark text-gray-600 dark:text-gray-400 text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">#LongTermRental</span>
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 dark:bg-surface-dark text-gray-600 dark:text-gray-400 text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">#PhuQuocLiving</span>
                </div>
            </div>
            <div class="lg:hidden mt-8 flex items-center justify-between border-y border-gray-100 dark:border-gray-700 py-4">
                <span class="font-bold text-gray-900 dark:text-white">Share this article:</span>
                <div class="flex gap-4">
                    <button class="text-gray-500 hover:text-primary"><span class="material-icons-round">share</span></button>
                    <button class="text-gray-500 hover:text-[#1877F2]">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg>
                    </button>
                    <button class="text-gray-500 hover:text-[#1DA1F2]">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path></svg>
                    </button>
                </div>
            </div>
        </article>

        <div class="hidden lg:block lg:col-span-2">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text:white">Related Articles</h2>
            <button class="text-primary font-medium hover:text-sky-600 flex items-center text-sm">
                View All <span class="material-icons-round text-base ml-1">arrow_forward</span>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
                <div class="relative h-48 overflow-hidden">
                    <img alt="Luxury Hotel Room" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnuO9AqmZBsMwELfQ4FLo7WHomOGa9mI7eIlppkEeB3AEX3D5d3eT5QCZ72af0ajrRx9Svrfyc-zJaEApdH34AaT-M3vYIcRCV4qWFeveW2R218eux5zcjSaB3W7xqpWtyO3FwHKmxK6rRaa5Y18RHogN5axVFRfQ5P7aqwTlWf6hLVJXYtxQqMjjnq0Xxd2wvSCe3TZBd1KN4pCsOz3iDKsT__Yd1w_6gyFUNz2mnb_xkn2Q1JbfJwfwtTy9aZUy0W22h5b2AtBro"/>
                    <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Apartment Hunting</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-gray-900 dark:text:white mb-2 leading-snug group-hover:text-primary transition-colors">
                        Top 5 Luxury Apartments with Ocean Views
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                        Looking for that perfect morning view? We've curated a list of the most stunning high-rise apartments.
                    </p>
                    <button class="inline-flex items-center text-primary text-xs font-bold hover:underline mt-auto">
                        Read More
                    </button>
                </div>
            </article>
            <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
                <div class="relative h-48 overflow-hidden">
                    <img alt="Vietnamese Street Food" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfDHQp0LVOfWOrkgw9u7SQrPGkExDE91tBwwc2WiqhWq0aCMx5mTU7W6K58BhUZcH31cpzPNIaZEU1FDPG13cyxoAWcXQoDHg2kepxEgPmA1816C_jrJiGACEjMveEyMzNRb4QODeWoxgtrc3K34jJpOTITSvF5pbyZuB_Xoyt0MNGuN0OjFoiAdLsuLK0pRjJUC-M_VXq_SSXHrNL5NwyH2gJ-zgX4sGoyKE6vKkzgKNITZ387cp9K091dCXR3TqfDdkqxlYgZwW3"/>
                    <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Local Life</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 leading-snug group-hover:text-primary transition-colors">
                        Best Local Markets for Fresh Produce
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                        Skip the supermarket and shop like a local. Guide to the freshest seafood in Duong Dong market.
                    </p>
                    <button class="inline-flex items-center text-primary text-xs font-bold hover:underline mt-auto">
                        Read More
                    </button>
                </div>
            </article>
            <article class="group bg-white dark:bg-surface-dark rounded-2xl overflow-hidden shadow-soft hover:shadow-hover border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
                <div class="relative h-48 overflow-hidden">
                    <img alt="Scooter Rental" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCc1DMdCbfIOVNfD_UKeLFoHLKCZ4fO034Dk_HMSddJJmsjqe7_NU2Dlh36eWad1yT2UBmghQsXR8uECTyjmqDNsMx9NBDG52hfqZInFSp-DYbBCSB4OwWd7tzfleTxseQJLtn1vbvYjygwnfSHZjfkV7bEy94ZAETGYtHZDYFAQjVa4Y7TqGBrCX7AeI6uZhvjMPHjjJoZoNdQEA9J1SVKLQAdG9hZ_zPtyZ0Ygh1pOdEeMWdPNDFZtZuYJZOdvZD7qqcU4K9Ngv-b"/>
                    <span class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-gray-800 dark:text-white text-xs font-bold px-3 py-1 rounded-full">Transport</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 leading-snug group-hover:text-primary transition-colors">
                        Renting a Motorbike: Safety &amp; Legal Tips
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                        Driving in Vietnam can be chaotic. Learn about the necessary licenses and rental costs.
                    </p>
                    <button class="inline-flex items-center text-primary text-xs font-bold hover:underline mt-auto">
                        Read More
                    </button>
                </div>
            </article>
        </div>
    </div>
</main>
@endsection


