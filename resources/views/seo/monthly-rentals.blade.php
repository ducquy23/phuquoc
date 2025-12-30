@extends('layouts.app')

@section('title', (isset($page->title) && $page->title) ? $page->title : 'Monthly Apartment Rentals in Phu Quoc - Flexible Short-Term Stays')

@section('metaDescription', (isset($page->meta_description) && $page->meta_description) ? $page->meta_description : 'Find the perfect monthly apartment rental in Phu Quoc. Flexible short-term stays for digital nomads and tourists with no long-term contracts.')

@if($page && isset($page->meta_keywords) && $page->meta_keywords)
    @section('metaKeywords', $page->meta_keywords)
@endif

@section('content')
<!-- Hero Section -->
<section class="relative flex flex-col items-center justify-center min-h-[600px] w-full bg-cover bg-center bg-no-repeat" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('{{ ($page && isset($page->hero_background_image_url) && $page->hero_background_image_url) ? $page->hero_background_image_url : "https://lh3.googleusercontent.com/aida-public/AB6AXuA0DqCZbI61cEmyT2NoP-THh8ywcVGtuZap1k8XCJe6QCoKz87DOYYh2mBoy_g-KY0y73hVGlYTh0iM8uKkbBEMt536LW8GSbfiHRRmO29HjemOCEQIM5S3-2ps_vvPgNC17S4TCxb58DlRUo5x7rKD7HEQLKticIDB15jxCnB0XjzVgvtcY6aHEGmL5fgSPLFdFFWybATl1vhxfrtjn3iWxLx5llKBaGgHtzTazTRQunrxBsqnlgY5kMVyOrG5vx883NKspd9VwWTt" }}');">
    <div class="layout-content-container flex flex-col max-w-[960px] px-4 md:px-10 text-center gap-6 py-20">
        @if($page && isset($page->hero_badge_text) && $page->hero_badge_text)
            <span class="inline-block px-3 py-1 rounded-full bg-primary/20 backdrop-blur-sm border border-primary/30 text-primary text-xs font-bold uppercase tracking-wider mb-2 w-fit mx-auto">
                {{ $page->hero_badge_text }}
            </span>
        @else
            <span class="inline-block px-3 py-1 rounded-full bg-primary/20 backdrop-blur-sm border border-primary/30 text-primary text-xs font-bold uppercase tracking-wider mb-2 w-fit mx-auto">
                #1 Rental Agency in Phu Quoc
            </span>
        @endif
        <h1 class="text-white text-4xl md:text-6xl font-black leading-tight tracking-[-0.033em]">
            {{ (isset($page->hero_title) && $page->hero_title) ? $page->hero_title : 'Monthly Apartment Rentals in Phu Quoc' }}
        </h1>
        <p class="text-gray-100 text-lg md:text-xl font-medium max-w-[720px] mx-auto leading-relaxed">
            {{ (isset($page->hero_subtitle) && $page->hero_subtitle) ? $page->hero_subtitle : 'Flexible stays for digital nomads & tourists. Find your perfect short-term home, from budget studios to luxury sea-view condos, with no long-term contracts.' }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-4">
            @if($page && isset($page->hero_cta_primary_text) && isset($page->hero_cta_primary_link) && $page->hero_cta_primary_text && $page->hero_cta_primary_link)
                <a href="{{ $page->hero_cta_primary_link }}" class="flex items-center justify-center rounded-xl h-12 px-8 bg-primary hover:bg-[#0fd6c5] text-[#111817] text-base font-bold transition-all transform hover:scale-105">
                    {{ $page->hero_cta_primary_text }}
                </a>
            @else
                <a href="{{ route('apartments.index') }}" class="flex items-center justify-center rounded-xl h-12 px-8 bg-primary hover:bg-[#0fd6c5] text-[#111817] text-base font-bold transition-all transform hover:scale-105">
                    Browse Listings
                </a>
            @endif
            @if($page && isset($page->hero_cta_secondary_text) && isset($page->hero_cta_secondary_link) && $page->hero_cta_secondary_text && $page->hero_cta_secondary_link)
                <a href="{{ $page->hero_cta_secondary_link }}" class="flex items-center justify-center rounded-xl h-12 px-8 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white text-base font-bold transition-all">
                    {{ $page->hero_cta_secondary_text }}
                </a>
            @else
                <a href="{{ route('contact') }}" class="flex items-center justify-center rounded-xl h-12 px-8 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white text-base font-bold transition-all">
                    Talk to an Agent
                </a>
            @endif
        </div>
    </div>
</section>

<!-- Stats / Trust Signals -->
<section class="w-full bg-white dark:bg-[#1a2c2a] border-b border-gray-100 dark:border-gray-800">
    <div class="layout-content-container max-w-[960px] mx-auto px-4 py-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="flex flex-col gap-1">
            <span class="text-3xl font-bold text-primary">500+</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Happy Guests</span>
        </div>
        <div class="flex flex-col gap-1">
            <span class="text-3xl font-bold text-primary">50+</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Premium Units</span>
        </div>
        <div class="flex flex-col gap-1">
            <span class="text-3xl font-bold text-primary">24/7</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Local Support</span>
        </div>
        <div class="flex flex-col gap-1">
            <span class="text-3xl font-bold text-primary">0%</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Booking Fees</span>
        </div>
    </div>
</section>

<!-- Feature Section: Why Rent Monthly -->
<section class="py-16 px-4 md:px-10 bg-background-light dark:bg-background-dark">
    <div class="layout-content-container flex flex-col max-w-[960px] mx-auto gap-12">
        <div class="text-center max-w-[720px] mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-[#111817] dark:text-white mb-4">Why Rent Monthly with Us?</h2>
            <p class="text-gray-600 dark:text-gray-300">Detailed for travelers needing more than a hotel room but less than a year lease.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex flex-col gap-4 p-6 rounded-2xl bg-white dark:bg-[#1a2c2a] shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-800">
                <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">calendar_month</span>
                </div>
                <h3 class="text-xl font-bold text-[#111817] dark:text-white">Flexible Contracts</h3>
                <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Stay for 1 month or 6 months—you decide. We specialize in short-term rental agreements that fit your travel plans.</p>
            </div>
            <div class="flex flex-col gap-4 p-6 rounded-2xl bg-white dark:bg-[#1a2c2a] shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-800">
                <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">payments</span>
                </div>
                <h3 class="text-xl font-bold text-[#111817] dark:text-white">All-Inclusive Pricing</h3>
                <p class="text-gray-500 dark:text-gray-400 leading-relaxed">No surprises. Electricity, high-speed Wi-Fi, cleaning services, and water are clearly outlined or included.</p>
            </div>
            <div class="flex flex-col gap-4 p-6 rounded-2xl bg-white dark:bg-[#1a2c2a] shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-800">
                <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">support_agent</span>
                </div>
                <h3 class="text-xl font-bold text-[#111817] dark:text-white">Local Agent Support</h3>
                <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Direct contact with English-speaking agents via WhatsApp or Zalo. We help with visa extensions and motorbike rentals too.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Listings Grid -->
<section class="py-16 px-4 md:px-10 bg-white dark:bg-[#1a2c2a]">
    <div class="layout-content-container flex flex-col max-w-[960px] mx-auto">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-[#111817] dark:text-white">Featured Monthly Rentals</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Curated apartments available for immediate move-in.</p>
            </div>
            <a href="{{ route('apartments.index') }}" class="hidden md:flex items-center text-primary font-bold hover:underline gap-1">
                View all listings 
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="group flex flex-col rounded-xl overflow-hidden bg-background-light dark:bg-background-dark border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="relative aspect-[4/3] w-full bg-gray-200 overflow-hidden">
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD4qz21q-Kjc6G9zM2khW33owF4p96pXeHnEOxBjtuk0s1fFbA858AncEM_k36Lr3LCnwey9zk8cFWghIPVli5iG7nVCNZitQ_OUwEjw3rWK4FH4z6f_7Cyn4D_6rwMfn0VP_qzmHxm39O09OKN7j-EWnWwkFNnzsIHV_zzyc4FU7G30FiULT8D6MFEAdGFgeB2pQLvKnGUwl5mMttN2W6xDngz0cBeIEnaYS_RXJLReMZHN2LLCY8zxJcxbhojEDnGdym3kuNFrRBJ');"></div>
                    <div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-[#111817] dark:text-white">
                        Available Now
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-2">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-[#111817] dark:text-white group-hover:text-primary transition-colors">Sunrise Condo</h3>
                        <p class="text-primary font-bold text-lg whitespace-nowrap">$450<span class="text-xs font-normal text-gray-500 ml-1">/mo</span></p>
                    </div>
                    <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-sm">
                        <span class="material-symbols-outlined text-[18px]">location_on</span>
                        <span>Near Night Market</span>
                    </div>
                    <div class="flex gap-3 mt-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">bed</span> 1 Bed</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">wifi</span> Fast Wifi</span>
                    </div>
                </div>
            </div>
            <div class="group flex flex-col rounded-xl overflow-hidden bg-background-light dark:bg-background-dark border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="relative aspect-[4/3] w-full bg-gray-200 overflow-hidden">
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB2j_BL3kEYhKWfB43kV01C7Uyvj-dQDWdveN-48SmEfJrM1P0uOQoNEMxODPFuAkC9TY__812cHQ13gVva8wVA-XNzTBG7LGBr0Gq9xY21xELK_Pa9q4l4ZSssIpHc43FimBoRxGUedhoBkcipYMg_dM01MwDEPDGb_-L2GtnKiiCpzVCaGHVLNNjXeJxR1MB49jeQqLuN7zqd5zmofPxOcGDZhX3M-ooQ3VXHg_sYo74g5JURtIGl3zkSKgpPJAqinxg4AlApTGeS');"></div>
                    <div class="absolute top-3 left-3 bg-primary text-[#111817] px-2 py-1 rounded text-xs font-bold">
                        Sea View
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-2">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-[#111817] dark:text-white group-hover:text-primary transition-colors">Ocean Breeze Studio</h3>
                        <p class="text-primary font-bold text-lg whitespace-nowrap">$600<span class="text-xs font-normal text-gray-500 ml-1">/mo</span></p>
                    </div>
                    <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-sm">
                        <span class="material-symbols-outlined text-[18px]">location_on</span>
                        <span>Long Beach Area</span>
                    </div>
                    <div class="flex gap-3 mt-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">bed</span> Studio</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">ac_unit</span> A/C</span>
                    </div>
                </div>
            </div>
            <div class="group flex flex-col rounded-xl overflow-hidden bg-background-light dark:bg-background-dark border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="relative aspect-[4/3] w-full bg-gray-200 overflow-hidden">
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDKacNxwgif0pcq8jjfJpgEPsNv6hdAB9VmG-QLomiZfTQSCIN8sH-44IdxEm4iCGD-GgfdPg3GRqx85BoHjC66Dg__15f11nWN48E049iQmXfCJtLu8jj-9kMZaOAEuBuCpHwqrgHO5ICBSiaNqx-xiwqNNqIyMdAd-o8sF1mooTZjWsH-jlB3JPOyJodS-KVxOBGL9LxCl_WMVHCzk6r5Hw02KN2n4L0xIKXFyBxJHkcdj-bXvhzEbkc1brSCOLqtlxVl-cEfBk5N');"></div>
                    <div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-[#111817] dark:text-white">
                        Luxury
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-2">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-[#111817] dark:text-white group-hover:text-primary transition-colors">Sunset Garden Villa</h3>
                        <p class="text-primary font-bold text-lg whitespace-nowrap">$850<span class="text-xs font-normal text-gray-500 ml-1">/mo</span></p>
                    </div>
                    <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-sm">
                        <span class="material-symbols-outlined text-[18px]">location_on</span>
                        <span>Ong Lang Beach</span>
                    </div>
                    <div class="flex gap-3 mt-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">bed</span> 2 Bed</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">pool</span> Pool</span>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('apartments.index') }}" class="md:hidden mt-8 w-full h-12 rounded-xl border border-gray-200 dark:border-gray-700 font-bold text-[#111817] dark:text-white text-center flex items-center justify-center">
            View All Listings
        </a>
    </div>
</section>

<!-- SEO Content & Map Section -->
<section class="py-16 px-4 md:px-10 bg-background-light dark:bg-background-dark">
    <div class="layout-content-container max-w-[960px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="flex flex-col gap-6">
            <h2 class="text-2xl md:text-3xl font-bold text-[#111817] dark:text-white">
                Living in Phu Quoc: A Guide for Monthly Renters
            </h2>
            <div class="prose prose-sm dark:prose-invert text-gray-600 dark:text-gray-300">
                <p class="mb-4">
                    Phu Quoc Island offers a unique blend of tropical relaxation and modern convenience, making it a top destination for digital nomads. Unlike staying in expensive hotels, opting for <strong>monthly apartment rentals</strong> gives you the freedom of a home base with significant cost savings.
                </p>
                <p class="mb-4">
                    Most of our apartments are located near key areas like <strong>Duong Dong</strong> (the main town) or the quieter <strong>Ong Lang Beach</strong> area. These locations provide easy access to international supermarkets, coworking cafes, and vibrant night markets.
                </p>
                <ul class="flex flex-col gap-2 mt-4">
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-xl">check_circle</span>
                        <span>Kitchenettes for home cooking</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-xl">check_circle</span>
                        <span>Work-friendly desks and chairs</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-xl">check_circle</span>
                        <span>Motorbike parking included</span>
                    </li>
                </ul>
            </div>
            <a href="{{ route('blog.index') }}" class="w-fit mt-2 px-6 py-3 bg-[#111817] dark:bg-white text-white dark:text-[#111817] rounded-lg font-bold hover:opacity-90 transition-opacity">
                Read Our Area Guide
            </a>
        </div>
        <div class="relative h-[400px] w-full rounded-2xl overflow-hidden shadow-lg group">
            <img alt="Map view of Phu Quoc island showing rental locations" class="absolute inset-0 w-full h-full object-cover" src="https://via.placeholder.com/800x400">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                <div class="text-white">
                    <h3 class="font-bold text-lg">Explore Locations</h3>
                    <p class="text-sm opacity-90">Click to see apartments on the map</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section for Rich Snippets -->
<section class="py-16 px-4 md:px-10 bg-white dark:bg-[#1a2c2a]">
    <div class="layout-content-container max-w-[800px] mx-auto flex flex-col gap-8">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-[#111817] dark:text-white">Frequently Asked Questions</h2>
        <div class="flex flex-col gap-4">
            <details class="group border border-gray-200 dark:border-gray-700 rounded-lg p-5">
                <summary class="flex justify-between items-center font-bold text-lg cursor-pointer list-none text-[#111817] dark:text-white">
                    <span>What is included in the monthly rent?</span>
                    <span class="transition group-open:rotate-180">
                        <span class="material-symbols-outlined">expand_more</span>
                    </span>
                </summary>
                <p class="text-gray-600 dark:text-gray-300 mt-3">
                    Typically, our monthly packages include high-speed Wi-Fi, water, and trash collection. Electricity is usually charged separately by the meter (standard government rate). Some premium units include housekeeping twice a week.
                </p>
            </details>
            <details class="group border border-gray-200 dark:border-gray-700 rounded-lg p-5">
                <summary class="flex justify-between items-center font-bold text-lg cursor-pointer list-none text-[#111817] dark:text-white">
                    <span>Do I need to sign a long-term contract?</span>
                    <span class="transition group-open:rotate-180">
                        <span class="material-symbols-outlined">expand_more</span>
                    </span>
                </summary>
                <p class="text-gray-600 dark:text-gray-300 mt-3">
                    No! We specialize in flexible terms. You can rent month-to-month. A deposit of one month is typically required for stays longer than a month, but short-term options are available.
                </p>
            </details>
            <details class="group border border-gray-200 dark:border-gray-700 rounded-lg p-5">
                <summary class="flex justify-between items-center font-bold text-lg cursor-pointer list-none text-[#111817] dark:text-white">
                    <span>Can you help with motorbike rentals?</span>
                    <span class="transition group-open:rotate-180">
                        <span class="material-symbols-outlined">expand_more</span>
                    </span>
                </summary>
                <p class="text-gray-600 dark:text-gray-300 mt-3">
                    Yes, we have a fleet of motorbikes available for rent at discounted rates for our tenants. We can have the bike waiting for you at your apartment upon arrival.
                </p>
            </details>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-4 md:px-10 bg-background-light dark:bg-background-dark">
    <div class="layout-content-container max-w-[960px] mx-auto rounded-3xl bg-primary px-8 py-12 md:px-16 md:py-16 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative z-10 flex flex-col items-center gap-6">
            <h2 class="text-3xl md:text-4xl font-black text-[#111817]">Ready to move to paradise?</h2>
            <p class="text-[#111817]/80 text-lg max-w-[600px] font-medium">Contact our local agent today to check availability for your dates. We respond within 1 hour during business hours.</p>
            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
                <a href="https://wa.me/84902607024" target="_blank" class="flex items-center justify-center gap-2 rounded-xl h-12 px-8 bg-[#111817] text-white text-base font-bold hover:bg-black transition-colors shadow-lg">
                    <span class="material-symbols-outlined">chat</span>
                    Chat on WhatsApp
                </a>
                <a href="{{ route('apartments.index') }}" class="flex items-center justify-center gap-2 rounded-xl h-12 px-8 bg-white text-[#111817] text-base font-bold hover:bg-gray-50 transition-colors shadow-lg">
                    Browse Apartments
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
