@extends('layouts.app')

@section('title', (isset($page->title) && $page->title) ? $page->title : 'Phu Quoc Apartments for Rent | Long Term & Short Term Rentals')

@section('metaDescription', (isset($page->meta_description) && $page->meta_description) ? $page->meta_description : 'Find apartments for rent in Phu Quoc for foreigners. Long-term and short-term rentals available now with English speaking agents. Browse listings, compare prices, and book your perfect island home.')

@if($page && isset($page->meta_keywords) && $page->meta_keywords)
    @section('metaKeywords', $page->meta_keywords)
@endif

@section('content')
    <!-- Hero Section -->
    <section class="relative w-full">
        <div
            class="flex min-h-[500px] flex-col gap-6 bg-cover bg-center bg-no-repeat items-center justify-center p-4 lg:p-10"
            data-alt="Beautiful aerial view of Phu Quoc coast with turquoise water"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.6) 100%), url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuClG7bR8dlqJdrBYNmKDlJSOvSernM4HojY_eXD0vgESMwq2jF56aMBsnvul5r1lZGXwpyykq-BaHt9tO0rkd5SnpEcz_6E8vaM1kiAb1Pc_XyGb0c6q-WcU888MuNZd3Hcjlcu00ilCXvrNbsaIxXwgSf6mSfl_-l3szjOBEqw4Wg2R9d5tyOPr8b5-EyFmw05CQPmfRgq6f7dOz6rEacxnwQa19BefLnXdXb58QVF5A23hT1v5vCtQyy8iAiKCmq3yvHH4VeodyF-&quot;);">
            <div class="flex flex-col gap-4 text-center max-w-4xl">
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-[-0.033em]">
                    Apartments for Rent in Phu Quoc for Foreigners
                </h1>
                <h2 class="text-white/90 text-lg md:text-xl font-medium leading-normal max-w-2xl mx-auto">
                    Find Your Perfect Island Home – Long &amp; Short Term Rentals Available Now with English Speaking
                    Agents.
                </h2>
            </div>
            <!-- Quick Search Widget within Hero -->
            <div class="w-full max-w-3xl mt-6 p-2 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20">
                <div class="flex flex-col md:flex-row gap-2">
                    <div class="flex-1 bg-white dark:bg-gray-800 rounded-xl flex items-center px-4 h-14">
                        <span class="material-symbols-outlined text-text-muted">location_on</span>
                        <input
                            class="w-full bg-transparent border-none focus:ring-0 text-text-main dark:text-white placeholder:text-text-muted"
                            placeholder="Area (e.g. Duong Dong)" type="text" fdprocessedid="n5lfkx">
                    </div>
                    <div class="flex-1 bg-white dark:bg-gray-800 rounded-xl flex items-center px-4 h-14">
                        <span class="material-symbols-outlined text-text-muted">home_work</span>
                        <select
                            class="w-full bg-transparent border-none focus:ring-0 text-text-main dark:text-white text-sm"
                            fdprocessedid="9kz9hk">
                            <option>Apartment Type</option>
                            <option>Studio</option>
                            <option>1 Bedroom</option>
                            <option>2 Bedroom</option>
                            <option>Villa</option>
                        </select>
                    </div>
                    <button
                        class="bg-primary hover:bg-[#0fdbc9] text-text-main font-bold h-14 px-8 rounded-xl transition-colors"
                        fdprocessedid="iktty">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Layout -->
    <div class="layout-container flex justify-center py-10 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-12 gap-10 relative">
            <!-- Left Main Column (Content) -->
            <main class="lg:col-span-8 flex flex-col gap-16">
                <!-- Introduction / Why Rent -->
                <section id="why-rent">
                    <h2 class="text-text-main dark:text-white text-3xl font-bold leading-tight mb-6">Why Rent an
                        Apartment in Phu Quoc?</h2>
                    <div
                        class="prose prose-lg dark:prose-invert text-text-main/80 dark:text-white/80 leading-relaxed space-y-4">
                        <p>
                            Phu Quoc offers a unique blend of island tranquility and modern convenience. Whether you are
                            a digital nomad, a retiree, or just looking for a long-term vacation, the island provides
                            affordable luxury living compared to other major Vietnamese cities like Ho Chi Minh City or
                            Hanoi.
                        </p>
                        <p>
                            With an international airport, high-speed 4G/5G internet across the island, and a growing
                            community of expats, Phu Quoc is rapidly becoming a top destination for foreigners. Rentals
                            here range from budget-friendly studios in local neighborhoods to high-end serviced
                            apartments with sea views.
                        </p>
                        <div class="bg-primary/10 border-l-4 border-primary p-6 rounded-r-xl my-6">
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">tips_and_updates</span> Pro Tip for
                                Digital Nomads
                            </h3>
                            <p class="text-sm">Many apartments in the <span class="font-bold">Marina Square</span> area
                                offer dedicated co-working spaces included in the rent. Be sure to ask about internet
                                speeds before signing!</p>
                        </div>
                    </div>
                </section>
                <!-- Featured Listings Carousel -->
                <section id="featured-apartments">
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <h2 class="text-text-main dark:text-white text-2xl font-bold">Featured 1 &amp; 2 Bedroom
                                Units</h2>
                            <p class="text-text-muted text-sm mt-1">Hand-picked properties popular with expats</p>
                        </div>
                        <a class="text-primary font-bold text-sm hover:underline flex items-center" href="#">View All
                            <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span></a>
                    </div>
                    <div class="flex gap-4 overflow-x-auto pb-6 no-scrollbar snap-x">
                        <!-- Card 1 -->
                        <div
                            class="min-w-[300px] md:min-w-[340px] bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 shadow-sm snap-center group cursor-pointer hover:shadow-md transition-all">
                            <div class="h-48 bg-gray-200 relative overflow-hidden">
                                <img
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    data-alt="Modern bright apartment interior with balcony"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmEVPBtCrLS_zsl5P-cbflNZBrm5wDVY6FDtwrcBr5QMweVz-ktgDwjRt4MD-44T2xAteWSPUeerQKsT4isKj1v2iRMqyNdB8DQqC0CyLyY--_d7z2piGXW_lhPaf5R0UELGmYMmWP3NHMOi8hp6tGY6dIH7bKw4lNkDm0oNiFhwQlkq80GWDdq2bz5d1ZGTgdR2kGps51g4cYJZZ6FTE4-YQsxgAZ0NdPx-Kcx8L32lDlmt1njkl6WRR9aA4WSgJS_CUqDnI9BW0L">
                                <div
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur text-xs font-bold px-2 py-1 rounded-md text-text-main">
                                    Long Term
                                </div>
                                <button
                                    class="absolute top-3 right-3 bg-white/20 hover:bg-white p-1.5 rounded-full backdrop-blur text-white hover:text-red-500 transition-colors"
                                    fdprocessedid="fds3h">
                                    <span class="material-symbols-outlined text-sm">favorite</span>
                                </button>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg text-text-main dark:text-white truncate">Sunset Town
                                        Studio</h3>
                                    <p class="text-primary font-bold whitespace-nowrap">$450<span
                                            class="text-xs text-text-muted font-normal">/mo</span></p>
                                </div>
                                <p class="text-sm text-text-muted flex items-center gap-1 mb-4">
                                    <span class="material-symbols-outlined text-base">location_on</span> An Thoi, South
                                    Island
                                </p>
                                <div
                                    class="flex gap-4 border-t border-gray-100 dark:border-gray-700 pt-3 text-sm text-text-main dark:text-gray-300">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">bed</span> 1 Bed</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">bathtub</span> 1 Bath</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">square_foot</span> 45m²</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div
                            class="min-w-[300px] md:min-w-[340px] bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 shadow-sm snap-center group cursor-pointer hover:shadow-md transition-all">
                            <div class="h-48 bg-gray-200 relative overflow-hidden">
                                <img
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    data-alt="Minimalist modern living room in apartment"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBH-S6smKtWOIOMwiLOrPkeKvnrR0-cdigOLZvbStxpkpYAkh6NEZM5Z3mBxSCYvgzOMQGTiG3tv3iw2AZewIDRYrD8JXlguVipHKtiTiutVym9bttu5yqsIMV9-Wlw3x4H2fufpxvWu-AGcVsO7fzQFqjOB3HeP6iwn-JsTFehtE2CUbNlP_09tV-Jaoh3lRtJ0z9zJWS3rlYRm650WplunCdMq2hfEHT3tT4OQHzykTLr0qw9zq7iU_Wh0l-iF3XLyUBi4pGzdtJA">
                                <div
                                    class="absolute top-3 left-3 bg-primary/90 text-text-main backdrop-blur text-xs font-bold px-2 py-1 rounded-md">
                                    Featured
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg text-text-main dark:text-white truncate">Sea View
                                        Condo</h3>
                                    <p class="text-primary font-bold whitespace-nowrap">$650<span
                                            class="text-xs text-text-muted font-normal">/mo</span></p>
                                </div>
                                <p class="text-sm text-text-muted flex items-center gap-1 mb-4">
                                    <span class="material-symbols-outlined text-base">location_on</span> Duong Dong
                                    Center
                                </p>
                                <div
                                    class="flex gap-4 border-t border-gray-100 dark:border-gray-700 pt-3 text-sm text-text-main dark:text-gray-300">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">bed</span> 2 Bed</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">bathtub</span> 2 Bath</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">square_foot</span> 75m²</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div
                            class="min-w-[300px] md:min-w-[340px] bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 shadow-sm snap-center group cursor-pointer hover:shadow-md transition-all">
                            <div class="h-48 bg-gray-200 relative overflow-hidden">
                                <img
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    data-alt="Luxury apartment interior"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfvJhMIIxXO2EXc1SzfffrFbSfi4uaoXwvun41IErfu-BvR6qsvQV3P9VtCKNST44XNc5CJSddiX4WitO1zS-r206lXgI_bbJOzGWgrWlaSV7nRcKmCio9aSHzFpw0YkaID7YeE0Xv-9fxMIAZeU_fQMoiyoPWBdZ9Lr5fjdbjszmMoYQSudK8_WW2u2hzTolARx9NH8eb-RBcDWhApQE-WtQV06Xb_rkg2JnLayht-388wfux8mPTK3fbs_il4QjYmmAjG_GZdRPJ">
                                <div
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur text-xs font-bold px-2 py-1 rounded-md text-text-main">
                                    Short Term
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg text-text-main dark:text-white truncate">Sonasea Villa
                                        Suite</h3>
                                    <p class="text-primary font-bold whitespace-nowrap">$800<span
                                            class="text-xs text-text-muted font-normal">/mo</span></p>
                                </div>
                                <p class="text-sm text-text-muted flex items-center gap-1 mb-4">
                                    <span class="material-symbols-outlined text-base">location_on</span> Bai Truong
                                    (Long Beach)
                                </p>
                                <div
                                    class="flex gap-4 border-t border-gray-100 dark:border-gray-700 pt-3 text-sm text-text-main dark:text-gray-300">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">bed</span> 1 Bed</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">bathtub</span> 1 Bath</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-base text-text-muted">pool</span> Pool</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Best Areas with Map -->
                <section id="best-areas">
                    <h2 class="text-text-main dark:text-white text-3xl font-bold leading-tight mb-6">Best Areas to Live
                        in Phu Quoc</h2>
                    <p class="text-text-main/80 dark:text-white/80 mb-6 leading-relaxed">
                        Choosing the right location is crucial. <strong>Duong Dong</strong> is the bustling heart of the
                        island with night markets and local vibes. <strong>An Thoi</strong> in the south is developing
                        rapidly with modern "Mediterranean-style" apartments. <strong>Bai Truong</strong> offers
                        resort-style living.
                    </p>
                    <div class="relative w-full h-[400px] rounded-2xl overflow-hidden bg-gray-200 group">
                        <img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity"
                             data-alt="Map view of Phu Quoc island with pins" data-location="Phu Quoc Island Map"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlb-79CtHOSgt9N0x1Cmk0_N64SOBhc6SJhSBPr-Wtw9iIwkHnJ9zn_P6rw-mU2ZfXstteIeuR8UpU-bHWe2FuOvKHlLNg9L9_gc5-IshHNHmZPhQwx8jfLVGkP3UfegW3l81BUMM6HOWfTxhD8Dp3sfGLK514OEx66VtuncuygsvjIjyS26FlEKTYqR_QypJIKuvlDIKy9lg9s1RsqkbG04QRq6Bebdh7iYjhGkwL0BeT0U0EVa4CA1-oTXIhq1CqdIyxaSsv8G3D">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <!-- Map Pin 1 -->
                        <div
                            class="absolute top-1/3 left-1/4 transform -translate-x-1/2 flex flex-col items-center cursor-pointer hover:scale-110 transition-transform">
                            <div class="bg-primary text-text-main font-bold text-xs px-2 py-1 rounded shadow-lg mb-1">
                                Duong Dong
                            </div>
                            <span
                                class="material-symbols-outlined text-primary text-4xl drop-shadow-md">location_on</span>
                        </div>
                        <!-- Map Pin 2 -->
                        <div
                            class="absolute bottom-1/4 right-1/3 transform -translate-x-1/2 flex flex-col items-center cursor-pointer hover:scale-110 transition-transform">
                            <div class="bg-white text-text-main font-bold text-xs px-2 py-1 rounded shadow-lg mb-1">An
                                Thoi
                            </div>
                            <span
                                class="material-symbols-outlined text-white text-4xl drop-shadow-md">location_on</span>
                        </div>
                        <div
                            class="absolute bottom-4 left-4 right-4 bg-white/90 dark:bg-gray-800/90 backdrop-blur p-4 rounded-xl">
                            <h4 class="font-bold text-text-main dark:text-white text-sm mb-2">Quick Area Guide</h4>
                            <div class="flex gap-4 text-xs overflow-x-auto no-scrollbar">
                                <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full whitespace-nowrap">🌆 Duong Dong: Nightlife &amp; Local Food</span>
                                <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full whitespace-nowrap">🌅 An Thoi: Modern Condos</span>
                                <span class="bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full whitespace-nowrap">🏖️ Ong Lang: Quiet &amp; Nature</span>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Rental Prices Table -->
                <section id="rental-prices">
                    <h2 class="text-text-main dark:text-white text-3xl font-bold leading-tight mb-6">Rental Prices in
                        Phu Quoc (2024 Update)</h2>
                    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">
                        <table
                            class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-text-muted uppercase tracking-wider"
                                    scope="col">Apartment Type
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-text-muted uppercase tracking-wider"
                                    scope="col">Price Range (Monthly)
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-text-muted uppercase tracking-wider"
                                    scope="col">Best For
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-main dark:text-white">
                                    Studio
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">$250 -
                                    $450
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">Solo
                                    Travelers / Budget
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-main dark:text-white">
                                    1 Bedroom
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">$400 -
                                    $700
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">
                                    Couples / Digital Nomads
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-main dark:text-white">
                                    2 Bedroom
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">$600 -
                                    $1,100
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">
                                    Families / Roommates
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-main dark:text-white">
                                    Luxury Villa
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">
                                    $1,200+
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main dark:text-gray-300">Resort
                                    Lifestyle
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-text-muted mt-2 italic">* Prices vary based on season (High Season: Nov -
                        Apr) and contract length.</p>
                </section>
                <!-- Renting Process -->
                <section id="renting-process">
                    <h2 class="text-text-main dark:text-white text-3xl font-bold leading-tight mb-8">Renting Process for
                        Foreigners</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm relative overflow-hidden">
                            <span
                                class="absolute -right-4 -top-4 text-9xl font-bold text-gray-50 dark:text-gray-700/50 -z-0">1</span>
                            <div class="relative z-10">
                                <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined text-primary font-bold">search</span>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-text-main dark:text-white">Find &amp; View</h3>
                                <p class="text-sm text-text-muted">Browse our listings or contact an agent. We arrange
                                    viewings usually within 24 hours.</p>
                            </div>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm relative overflow-hidden">
                            <span
                                class="absolute -right-4 -top-4 text-9xl font-bold text-gray-50 dark:text-gray-700/50 -z-0">2</span>
                            <div class="relative z-10">
                                <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined text-primary font-bold">contract_edit</span>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-text-main dark:text-white">Contract &amp;
                                    Deposit</h3>
                                <p class="text-sm text-text-muted">Standard deposit is 1-2 months. Contracts are
                                    available in English and Vietnamese.</p>
                            </div>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm relative overflow-hidden">
                            <span
                                class="absolute -right-4 -top-4 text-9xl font-bold text-gray-50 dark:text-gray-700/50 -z-0">3</span>
                            <div class="relative z-10">
                                <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined text-primary font-bold">verified_user</span>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-text-main dark:text-white">Police
                                    Registration</h3>
                                <p class="text-sm text-text-muted">Critical for foreigners. The landlord MUST register
                                    your stay with local police. We ensure this happens.</p>
                            </div>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm relative overflow-hidden">
                            <span
                                class="absolute -right-4 -top-4 text-9xl font-bold text-gray-50 dark:text-gray-700/50 -z-0">4</span>
                            <div class="relative z-10">
                                <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mb-4">
                                    <span class="material-symbols-outlined text-primary font-bold">key</span>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-text-main dark:text-white">Move In</h3>
                                <p class="text-sm text-text-muted">Receive keys, WiFi passwords, and a local guide to
                                    your new neighborhood.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- FAQs -->
                <section id="faqs">
                    <h2 class="text-text-main dark:text-white text-3xl font-bold leading-tight mb-6">Frequently Asked
                        Questions</h2>
                    <div class="flex flex-col gap-4">
                        <details
                            class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 open:border-primary/50 dark:open:border-primary/50 transition-colors">
                            <summary
                                class="flex cursor-pointer list-none items-center justify-between p-6 font-medium text-text-main dark:text-white">
                                <span>Is electricity included in the rent?</span>
                                <span class="transition group-open:rotate-180">
<span class="material-symbols-outlined">expand_more</span>
</span>
                            </summary>
                            <div class="group-open:animate-fadeIn px-6 pb-6 text-text-muted text-sm leading-relaxed">
                                Typically, no. Electricity is usually charged separately at the state rate (approx 3,000
                                - 4,000 VND per kWh). Water and internet are often included in serviced apartments but
                                check your specific contract.
                            </div>
                        </details>
                        <details
                            class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 open:border-primary/50 dark:open:border-primary/50 transition-colors">
                            <summary
                                class="flex cursor-pointer list-none items-center justify-between p-6 font-medium text-text-main dark:text-white">
                                <span>Can I get a contract for less than 6 months?</span>
                                <span class="transition group-open:rotate-180">
<span class="material-symbols-outlined">expand_more</span>
</span>
                            </summary>
                            <div class="group-open:animate-fadeIn px-6 pb-6 text-text-muted text-sm leading-relaxed">
                                Yes, short-term rentals (1-3 months) are available, especially in the low season
                                (May-Oct). However, prices for short-term stays are generally 15-20% higher than 6-12
                                month contracts.
                            </div>
                        </details>
                        <details
                            class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 open:border-primary/50 dark:open:border-primary/50 transition-colors">
                            <summary
                                class="flex cursor-pointer list-none items-center justify-between p-6 font-medium text-text-main dark:text-white">
                                <span>Is Phu Quoc pet friendly?</span>
                                <span class="transition group-open:rotate-180">
<span class="material-symbols-outlined">expand_more</span>
</span>
                            </summary>
                            <div class="group-open:animate-fadeIn px-6 pb-6 text-text-muted text-sm leading-relaxed">
                                Generally, yes! Many landlords accept pets, especially in standalone houses or villas.
                                Some serviced apartment buildings may have restrictions, so always declare your pet
                                upfront.
                            </div>
                        </details>
                    </div>
                </section>
                <!-- Transport Link CTA -->
                <div
                    class="bg-background-dark dark:bg-black rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-primary opacity-10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                    <div class="relative z-10">
                        <h3 class="text-white text-xl font-bold mb-2">Need a ride for your new home?</h3>
                        <p class="text-gray-400 text-sm max-w-md">We also provide reliable motorbike rentals for
                            foreigners. Monthly rates available.</p>
                    </div>
                    <a class="relative z-10 whitespace-nowrap bg-primary text-text-main font-bold px-6 py-3 rounded-xl hover:bg-opacity-90 transition-opacity"
                       href="#">
                        Check Motorbikes
                    </a>
                </div>
            </main>
            <!-- Right Sidebar (Sticky) -->
            <aside class="hidden lg:block lg:col-span-4 h-full">
                <div class="sticky top-24 flex flex-col gap-6">
                    <!-- Table of Contents -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm">
                        <h3 class="font-bold text-lg mb-4 text-text-main dark:text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">toc</span> On This Page
                        </h3>
                        <nav class="flex flex-col gap-2">
                            <a class="text-sm text-text-muted hover:text-primary transition-colors py-1 pl-2 border-l-2 border-transparent hover:border-primary"
                               href="#why-rent">Why Phu Quoc?</a>
                            <a class="text-sm text-text-muted hover:text-primary transition-colors py-1 pl-2 border-l-2 border-transparent hover:border-primary"
                               href="#featured-apartments">Featured Listings</a>
                            <a class="text-sm text-text-muted hover:text-primary transition-colors py-1 pl-2 border-l-2 border-transparent hover:border-primary"
                               href="#best-areas">Best Areas</a>
                            <a class="text-sm text-text-muted hover:text-primary transition-colors py-1 pl-2 border-l-2 border-transparent hover:border-primary"
                               href="#rental-prices">Price Guide</a>
                            <a class="text-sm text-text-muted hover:text-primary transition-colors py-1 pl-2 border-l-2 border-transparent hover:border-primary"
                               href="#renting-process">Renting Process</a>
                            <a class="text-sm text-text-muted hover:text-primary transition-colors py-1 pl-2 border-l-2 border-transparent hover:border-primary"
                               href="#faqs">FAQs</a>
                        </nav>
                    </div>
                    <!-- Agent Contact Card -->
                    <div class="bg-background-dark text-white rounded-2xl p-6 shadow-lg relative overflow-hidden group">
                        <!-- Abstract bg decoration -->
                        <div
                            class="absolute -right-10 -top-10 w-40 h-40 bg-primary opacity-20 rounded-full blur-2xl group-hover:opacity-30 transition-opacity duration-500"></div>
                        <div class="relative z-10 flex flex-col items-center text-center">
                            <div class="w-20 h-20 rounded-full border-4 border-primary p-1 mb-4">
                                <img class="w-full h-full rounded-full object-cover"
                                     data-alt="Portrait of a smiling female real estate agent"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7kBzOBeTVbL_qWvGpOMgH-y0b0Tjl6UbOIydw6OCeOfq2VkVpbz5GqfGh3Kcke1E8UYq-ltz3aXS1JrcdyOXxuInw-VAsprQKRnkt4Eo4_qYt7GmqnVIeh3p1bTn0L3sKgEXM8UwxVYPFxycPnEugprZkep5TZU8zf3fZc4SIVt6LvmoyVSLqqlDGOmCvacAVkkMYMmASk3p-6aWxE740Zzg_X8Csoy5EqWgi1jpiyyUOrgAJxQidozJyLVmOR2XI4cpL7-PVR09N">
                            </div>
                            <h3 class="font-bold text-xl mb-1">Talk to an Expert</h3>
                            <p class="text-gray-400 text-sm mb-6">Need help finding a place? Our English speaking agents
                                are here.</p>
                            <button
                                class="w-full bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold h-12 rounded-xl flex items-center justify-center gap-2 mb-3 transition-colors"
                                fdprocessedid="u8w1t">
                                <!-- WhatsApp Icon simulated with simple text/svg or using material symbol as placeholder if specific brand icon not allowed, using material icon for 'chat' -->
                                <span class="material-symbols-outlined">chat</span> Chat on WhatsApp
                            </button>
                            <button
                                class="w-full bg-white/10 hover:bg-white/20 text-white font-bold h-12 rounded-xl flex items-center justify-center gap-2 transition-colors"
                                fdprocessedid="qa2c5z">
                                <span class="material-symbols-outlined">mail</span> Email Us
                            </button>
                        </div>
                    </div>
                    <!-- Testimonial Mini -->
                    <div class="bg-primary/10 rounded-2xl p-6 border border-primary/20">
                        <div class="flex gap-1 text-primary mb-3">
                            <span class="material-symbols-outlined text-sm">star</span>
                            <span class="material-symbols-outlined text-sm">star</span>
                            <span class="material-symbols-outlined text-sm">star</span>
                            <span class="material-symbols-outlined text-sm">star</span>
                            <span class="material-symbols-outlined text-sm">star</span>
                        </div>
                        <p class="text-sm text-text-main dark:text-white italic mb-4">"Found my dream studio in An Thoi
                            within 2 days. The team helped with the police registration too!"</p>
                        <p class="text-xs font-bold text-text-muted">— Sarah J., from UK</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <!-- Mobile Sticky Action Bar (Visible only on small screens) -->
    <div class="lg:hidden fixed bottom-4 left-4 right-4 z-40">
        <div class="bg-background-dark text-white rounded-xl p-4 shadow-xl flex items-center justify-between gap-4">
            <div class="flex flex-col">
                <span class="text-xs text-gray-400">Questions?</span>
                <span class="font-bold text-sm">Chat with an Agent</span>
            </div>
            <button class="bg-primary text-text-main font-bold px-6 py-2 rounded-lg text-sm">
                WhatsApp
            </button>
        </div>
    </div>
    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }

                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function (msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
    <iframe id="jam-coms-8d259cc3-75eb-41dc-bd4b-9e96b6c0ec86"
            src="chrome-extension://iohjgamcilhbgmhbnllfolmkmmekfmci/icom.html?t=MTU0NTc1Njk1MTA1Njk3MTpbWyJuYW1lIiwiaWZyYW1lLWNvbSJdLFsidGFiSWQiLDEzMTQxMzMxNDRdXQ"
            style="display: none; width: 0px; height: 0px;"></iframe>
    <iframe id="jam-ui"
            src="chrome-extension://iohjgamcilhbgmhbnllfolmkmmekfmci/iui.html?t=NTE4NTU5OTQ1NzU5MTAzNTpbWyJuYW1lIiwiaWZyYW1lLWphbS11aSJdLFsidGFiSWQiLDEzMTQxMzMxNDRdXQ"></iframe>
    <span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span>
@endsection

@push('styles')
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
@endpush
