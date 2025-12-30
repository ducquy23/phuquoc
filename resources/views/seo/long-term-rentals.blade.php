@extends('layouts.app')

@section('title', (isset($page->title) && $page->title) ? $page->title : '')

@section('metaDescription', (isset($page->meta_description) && $page->meta_description) ? $page->meta_description : '')

@if($page && isset($page->meta_keywords) && $page->meta_keywords)
    @section('metaKeywords', $page->meta_keywords)
@endif

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[500px] w-full flex items-center justify-center bg-cover bg-center overflow-hidden"
             data-alt="Stunning modern apartment balcony overlooking the ocean in Phu Quoc at sunset"
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)), url('{{ (isset($page->hero_background_image_url) && $page->hero_background_image_url) ? $page->hero_background_image_url : "https://lh3.googleusercontent.com/aida-public/AB6AXuA_ZwQMbFNn1giwbrvYHdxjroKwCibo3JP3RoATH-1Ec-RbKpVBcCgwqhtbtsUBUFOJjz7NYPJt4jAcpOaozYTeOjWNlSgE7XGygQHQbMhZ9rTzDCEnjFGuHx952f95NPPPKxmour5gzehyMKlqWTo8QEDEQzy67mJMlLYCS-C5bVmvV7wMsY2gLvqLlU46pnfhgEqv5JW51H2aWncepA1M82EKVxIerXmWl6qy4DnhBySF3ogc4FYorJPqqxWjUpyTq2WYPqngELjq" }}');">
        <div
            class="absolute inset-0 bg-gradient-to-t from-background-light dark:from-background-dark to-transparent opacity-20"></div>
        <div class="relative z-10 max-w-[960px] mx-auto px-4 text-center">
            @if(isset($page->hero_badge_text) && $page->hero_badge_text)
                <span class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-black uppercase bg-primary rounded-full">
                    {{ $page->hero_badge_text }}
                </span>
            @else
                <span class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-black uppercase bg-primary rounded-full">
                    N/A
                </span>
            @endif
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-[-0.033em] mb-4">
                {{ (isset($page->hero_title) && $page->hero_title) ? $page->hero_title : 'Long-Term Apartment Rentals in Phu Quoc' }}
            </h1>
            <p class="text-white/90 text-lg md:text-xl font-medium max-w-2xl mx-auto">
                {{ (isset($page->hero_subtitle) && $page->hero_subtitle) ? $page->hero_subtitle : 'Find your perfect home for 1 month, 6 months, or a year. The ultimate guide for expats, digital nomads, and retirees.' }}
            </p>
            @php
                $primaryCtaText = $page->hero_cta_primary_text ?? null;
                $primaryCtaLink = $page->hero_cta_primary_link ?: route('apartments.index');
                $secondaryCtaText = $page->hero_cta_secondary_text ?? null;
                $secondaryCtaLink = $page->hero_cta_secondary_link ?: route('contact');
            @endphp
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ $primaryCtaLink }}"
                   class="h-12 px-8 rounded-xl bg-primary text-[#111817] font-bold text-base hover:scale-105 transition-transform flex items-center justify-center">
                    {{ $primaryCtaText ?: 'View Available Listings' }}
                </a>
                <a href="{{ $secondaryCtaLink }}"
                   class="h-12 px-8 rounded-xl bg-white text-[#111817] font-bold text-base hover:bg-gray-100 transition-colors flex items-center justify-center">
                    {{ $secondaryCtaText ?: 'Talk to an Agent' }}
                </a>
            </div>
        </div>
    </section>
    <!-- Breadcrumbs -->
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center gap-2 text-sm text-text-muted-light dark:text-text-muted-dark">
            <a class="hover:text-primary" href="#">Home</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <a class="hover:text-primary" href="#">Rentals</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="text-text-main-light dark:text-text-main-dark font-medium">Long-Term Rentals</span>
        </div>
    </div>
    <!-- Two Column Layout: Content + Sidebar -->
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Main Content Column (Left - 8 cols) -->
            <div class="lg:col-span-8 flex flex-col gap-12">
                <!-- Intro Text Block (SEO Heavy) -->
                <article
                    class="prose prose-lg dark:prose-invert max-w-none text-text-muted-light dark:text-text-muted-dark">
                    <h2 class="text-2xl font-bold text-text-main-light dark:text-text-main-dark mb-4">Why Choose
                        Long-Term Rentals in Phu Quoc?</h2>
                    <p class="mb-4">
                        Phu Quoc Island isn't just a weekend getaway destination anymore. With its rapidly improving
                        infrastructure, stable high-speed internet, and growing international community, it has become a
                        prime location for <strong>digital nomads</strong> and expats looking for a slice of tropical
                        paradise.
                    </p>
                    <p>
                        Opting for a <strong>long-term apartment rental in Phu Quoc</strong> (typically defined as 1
                        month or longer) offers significant advantages over short stays. You unlock monthly rates that
                        are often 30-50% cheaper than daily hotel rates, gain access to residential amenities like full
                        kitchens, and truly immerse yourself in the local "island life" culture.
                    </p>
                </article>
                <!-- Feature Icons Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @if(isset($page->features) && is_array($page->features) && count($page->features) > 0)
                        @foreach($page->features as $feature)
                            <div
                                class="p-6 rounded-xl border border-[#dbe6e5] dark:border-[#2a3c3a] bg-surface-light dark:bg-surface-dark flex flex-col gap-3">
                                @if(isset($feature['icon']) && $feature['icon'])
                                    <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined">{{ $feature['icon'] }}</span>
                                    </div>
                                @endif
                                <h3 class="font-bold text-lg">{{ $feature['title'] ?? '' }}</h3>
                                <p class="text-sm text-text-muted-light dark:text-text-muted-dark">{{ $feature['description'] ?? '' }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Featured Listings Section -->
                <section>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-text-main-light dark:text-text-main-dark">Featured Monthly
                            Rentals</h2>
                        <a class="text-primary font-medium hover:underline flex items-center gap-1" href="{{ route('apartments.index') }}">
                            View all <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                    @if(isset($featuredApartments) && $featuredApartments->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($featuredApartments as $apartment)
                                <a href="{{ route('apartments.show', $apartment->slug) }}"
                                   class="group relative rounded-xl overflow-hidden bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] hover:shadow-lg transition-shadow block">
                                    <div class="relative h-48 w-full">
                                        @if($apartment->is_featured)
                                            <div
                                                class="absolute top-3 left-3 bg-primary/90 backdrop-blur text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wider text-white">
                                                Featured
                                            </div>
                                        @endif
                                        @if($apartment->status === 'available')
                                            <div
                                                class="absolute top-3 right-3 bg-white/90 backdrop-blur text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wider text-black">
                                                {{ $apartment->status_badge_text }}
                                            </div>
                                        @endif
                                        <img alt="{{ $apartment->title }}"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                             src="{{ $apartment->featured_image_url }}"
                                             onerror="this.src='{{ asset('assets/images/Image-not-found.png') }}'">
                                    </div>
                                    <div class="p-5">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="font-bold text-lg line-clamp-1 group-hover:text-primary transition-colors">{{ $apartment->title }}</h3>
                                            <div class="text-primary font-bold text-lg whitespace-nowrap">
                                                {{ $apartment->formatted_price_monthly }}<span
                                                    class="text-sm font-normal text-text-muted-light dark:text-text-muted-dark">/mo</span>
                                            </div>
                                        </div>
                                        @if($apartment->address || $apartment->ward)
                                            <div
                                                class="flex items-center gap-1 text-text-muted-light dark:text-text-muted-dark text-sm mb-4">
                                                <span class="material-symbols-outlined text-[18px]">location_on</span>
                                                {{ $apartment->address ?? ($apartment->ward ? $apartment->ward->name : '') }}
                                            </div>
                                        @endif
                                        <div
                                            class="flex gap-4 border-t border-[#f0f4f4] dark:border-[#2a3c3a] pt-4 text-sm text-text-muted-light dark:text-text-muted-dark">
                                            @if($apartment->bedrooms_display)
                                                <div class="flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-[18px]">bed</span>
                                                    {{ $apartment->bedrooms_display }}
                                                </div>
                                            @endif
                                            @if($apartment->bathrooms)
                                                <div class="flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-[18px]">shower</span>
                                                    {{ $apartment->bathrooms }} Bath
                                                </div>
                                            @endif
                                            @if($apartment->area)
                                                <div class="flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-[18px]">square_foot</span>
                                                    {{ number_format($apartment->area, 0) }}m²
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 text-gray-500 dark:text-gray-400">
                            <p class="text-sm">No featured apartments available at the moment.</p>
                            <a href="{{ route('apartments.index') }}" class="mt-4 inline-block text-primary hover:underline">
                                Browse all apartments →
                            </a>
                        </div>
                    @endif
                </section>
                <!-- Detailed Guide Content -->
                <section class="flex flex-col gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">history_toggle_off</span>
                            Typical Rental Durations
                        </h3>
                        <p class="text-text-muted-light dark:text-text-muted-dark leading-relaxed">
                            While "long-term" generally implies anything over a month, most landlords in Phu Quoc prefer
                            contracts of <strong>3 to 6 months</strong>. Committing to a 6-month or 1-year lease often
                            gives you significant bargaining power to negotiate the monthly rate down. Be aware that
                            during peak season (November to March), prices for short 1-month extensions can spike.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">gavel</span>
                            Legal Aspects for Foreigners
                        </h3>
                        <p class="text-text-muted-light dark:text-text-muted-dark leading-relaxed mb-3">
                            Renting as a foreigner in Vietnam is straightforward, but documentation is key. Your
                            landlord is required to register your stay with the local police.
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-text-muted-light dark:text-text-muted-dark">
                            <li><strong>Contract:</strong> Ensure you have a bilingual rental contract
                                (English/Vietnamese).
                            </li>
                            <li><strong>Deposit:</strong> Standard practice is 1-2 months' rent as a security deposit.
                            </li>
                            <li><strong>Utilities:</strong> Electricity is usually charged separately per kWh. Water and
                                internet are sometimes included.
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">explore</span>
                            Best Neighborhoods for Expats
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div
                                class="bg-white dark:bg-surface-dark p-4 rounded-lg border border-[#f0f4f4] dark:border-[#2a3c3a]">
                                <h4 class="font-bold mb-2">Duong Dong</h4>
                                <p class="text-sm text-text-muted-light dark:text-text-muted-dark">The central hub.
                                    Busy, full of markets, night markets, and local life. Best for convenience.</p>
                            </div>
                            <div
                                class="bg-white dark:bg-surface-dark p-4 rounded-lg border border-[#f0f4f4] dark:border-[#2a3c3a]">
                                <h4 class="font-bold mb-2">An Thoi / Sunset Town</h4>
                                <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Southern tip. Modern
                                    developments, stunning architecture, and quieter beaches.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Map Section -->
                @if(isset($page->map_embed_url) && $page->map_embed_url)
                    <div class="relative w-full h-[300px] rounded-2xl overflow-hidden">
                        <iframe
                            src="{{ $page->map_embed_url }}"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @endif
            </div>
            <!-- Sidebar (Right - 4 cols) -->
            <aside class="lg:col-span-4 space-y-8">
                <!-- Search Widget -->
                @if(!isset($page->show_sidebar_search) || $page->show_sidebar_search)
                    <div class="bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] p-6 rounded-2xl shadow-sm sticky top-24">
                        <h3 class="text-lg font-bold mb-2">
                            {{ (isset($page->sidebar_search_title) && $page->sidebar_search_title) ? $page->sidebar_search_title : 'Find Your Home' }}
                        </h3>
                        @if(isset($page->sidebar_search_description) && $page->sidebar_search_description)
                            <p class="text-sm text-text-muted-light dark:text-text-muted-dark mb-4">
                                {{ $page->sidebar_search_description }}
                            </p>
                        @endif
                        <form class="flex flex-col gap-4" method="GET" action="{{ route('search') }}">
                            <div class="flex flex-col gap-1.5">
                                <label
                                    class="text-xs font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark">Location</label>
                                <select
                                    name="location"
                                    class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary">
                                    @foreach(($heroLocations ?? []) as $index => $location)
                                        @php
                                            $value = $index === 0 ? 'all' : $location;
                                        @endphp
                                        <option value="{{ $value }}" {{ request('location', 'all') === $value ? 'selected' : '' }}>
                                            {{ $location }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label
                                    class="text-xs font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark">Type</label>
                                <select
                                    name="property_type"
                                    class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary">
                                    @foreach(($heroPropertyTypes ?? []) as $index => $type)
                                        @php
                                            $value = $index === 0 ? 'all' : $type;
                                        @endphp
                                        <option value="{{ $value }}" {{ request('property_type', 'all') === $value ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label
                                    class="text-xs font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark">Budget
                                    (Monthly)</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input
                                        name="price_min"
                                        class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary"
                                        placeholder="Min" type="number">
                                    <input
                                        name="price_max"
                                        class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary"
                                        placeholder="Max" type="number">
                                </div>
                            </div>
                            <button
                                class="mt-2 w-full h-12 rounded-xl bg-primary text-[#111817] font-bold hover:bg-[#0fdbc9] transition-colors flex items-center justify-center gap-2"
                                type="submit">
                                <span class="material-symbols-outlined">search</span>
                                {{ (isset($page->sidebar_search_button_text) && $page->sidebar_search_button_text) ? $page->sidebar_search_button_text : 'Search Rentals' }}
                            </button>
                        </form>
                    </div>
                @endif
                <!-- Agent Contact Card -->
                @if(!isset($page->show_sidebar_agent) || $page->show_sidebar_agent)
                <div class="bg-[#102220] p-6 rounded-2xl text-white relative overflow-hidden">
                    <!-- Decorative gradient blob -->
                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 bg-primary blur-[60px] opacity-20 rounded-full"></div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold mb-2">
                            {{ $contactAgent['name'] ?? 'Need Local Help?' }}
                        </h3>
                        <div class="flex items-center gap-3 mb-6">
                            <img alt="Portrait of a smiling real estate agent"
                                 class="w-12 h-12 rounded-full border-2 border-primary object-cover"
                                 src="{{ isset($contactAgent['photo']) && $contactAgent['photo'] ? asset('storage/' . $contactAgent['photo']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBgflp-NSO7Z_dnpjOATRCl4thGiIiBPSORAJ_7gedCN91KAw3c7oesPs1_jSq494GD95VYaagPJf5EV2MfbVa4ZRUZBbLEMH3VIYO_yadLZ9vO7I29mCGSU-cPjTf4bAsvDN3x9Kmf8STEvr6P38D1hmzJpQCW_hhci5TocSgFFCMEyfzmINEu0oT8FqkITNny28wZmir0ZihiRc12pUrlNOtOlGvYmuOGokoJDGrBDZZOKKPgeJ77y7EYMqrIOx0OJyz5ryTVLHO_' }}">
                            <div>
                                <div class="font-bold">
                                    {{ $contactAgent['name'] ?? '' }}
                                </div>
                                <div class="text-xs text-primary">
                                    {{ $contactAgent['title'] ?? '' }}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            @if(!empty($contactAgent['zalo_whatsapp']))
                                <a href="https://wa.me/{{ $contactAgent['zalo_whatsapp'] }}"
                                   target="_blank" rel="noopener"
                                   class="w-full h-10 rounded-lg bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold text-sm flex items-center justify-center gap-2 transition-colors">
                                <!-- Simple SVG for WhatsApp as Material Symbols doesn't have brand icons -->
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
                                </svg>
                                Chat on WhatsApp
                                </a>

                                <a href="https://zalo.me/{{ urlencode($contactAgent['zalo_whatsapp']) }}"
                                   target="_blank" rel="noopener"
                                   class="w-full h-10 rounded-lg bg-[#0068FF] hover:bg-[#005ad9] text-white font-bold text-sm flex items-center justify-center gap-2 transition-colors">
                                    Chat on Zalo
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <!-- Related Links -->
                @if(!isset($page->show_sidebar_related) || $page->show_sidebar_related)
                    <div
                        class="bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] p-6 rounded-2xl">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark mb-4">
                            You might also like</h3>

                        @if(isset($relatedMotorbikes) && $relatedMotorbikes->count() > 0)
                            <ul class="space-y-4">
                                @foreach($relatedMotorbikes as $bike)
                                    <li>
                                        <a class="group flex items-start gap-3" href="{{ route('motorbikes.show', $bike->slug) }}">
                                            <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                                <img alt="{{ $bike->name }}" class="w-full h-full object-cover"
                                                     src="{{ $bike->featured_image_url }}">
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-sm font-bold group-hover:text-primary transition-colors">
                                                    {{ $bike->name }}
                                                </h4>
                                                <p class="text-xs text-text-muted-light dark:text-text-muted-dark">
                                                    {{ $bike->formatted_price_daily ?? '' }} / day &middot; {{ $bike->type_display }}
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            </aside>
        </div>
    </div>
    <!-- FAQ Section -->
    <section class="bg-[#f0f4f4] dark:bg-[#1a2c2a] py-16">
        <div class="max-w-[960px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold mb-4">Frequently Asked Questions</h2>
                <p class="text-text-muted-light dark:text-text-muted-dark">Common questions about renting apartments in Phu Quoc long-term.</p>
            </div>
            <div class="space-y-4">
                @if(isset($page->faqs) && is_array($page->faqs) && count($page->faqs) > 0)
                    @foreach($page->faqs as $faq)
                        <details
                            class="group bg-white dark:bg-surface-dark p-6 rounded-xl shadow-sm cursor-pointer [&amp;_summary::-webkit-details-marker]:hidden">
                            <summary class="flex items-center justify-between gap-1.5">
                                <h3 class="font-bold text-lg">{{ $faq['question'] ?? '' }}</h3>
                                <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180">expand_more</span>
                            </summary>
                            <p class="mt-4 leading-relaxed text-text-muted-light dark:text-text-muted-dark">
                                {{ $faq['answer'] ?? '' }}
                            </p>
                        </details>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
