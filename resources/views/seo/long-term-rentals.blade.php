@extends('layouts.app')

@section('title', (isset($page->title) && $page->title) ? $page->title : '')

@section('metaDescription', (isset($page->meta_description) && $page->meta_description) ? $page->meta_description : 'Find your perfect home for 1 month, 6 months, or a year. The ultimate guide for expats, digital nomads, and retirees looking for long-term rentals in Phu Quoc.')

@if($page && isset($page->meta_keywords) && $page->meta_keywords)
    @section('metaKeywords', $page->meta_keywords)
@endif

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[500px] w-full flex items-center justify-center bg-cover bg-center overflow-hidden"
             data-alt="Stunning modern apartment balcony overlooking the ocean in Phu Quoc at sunset"
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuA_ZwQMbFNn1giwbrvYHdxjroKwCibo3JP3RoATH-1Ec-RbKpVBcCgwqhtbtsUBUFOJjz7NYPJt4jAcpOaozYTeOjWNlSgE7XGygQHQbMhZ9rTzDCEnjFGuHx952f95NPPPKxmour5gzehyMKlqWTo8QEDEQzy67mJMlLYCS-C5bVmvV7wMsY2gLvqLlU46pnfhgEqv5JW51H2aWncepA1M82EKVxIerXmWl6qy4DnhBySF3ogc4FYorJPqqxWjUpyTq2WYPqngELjq');">
        <div
            class="absolute inset-0 bg-gradient-to-t from-background-light dark:from-background-dark to-transparent opacity-20"></div>
        <div class="relative z-10 max-w-[960px] mx-auto px-4 text-center">
<span class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-black uppercase bg-primary rounded-full">
                    Complete Guide 2024
                </span>
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-[-0.033em] mb-4">
                Long-Term Apartment Rentals in Phu Quoc
            </h1>
            <p class="text-white/90 text-lg md:text-xl font-medium max-w-2xl mx-auto">
                Find your perfect home for 1 month, 6 months, or a year. The ultimate guide for expats, digital nomads,
                and retirees.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <button
                    class="h-12 px-8 rounded-xl bg-primary text-[#111817] font-bold text-base hover:scale-105 transition-transform"
                    fdprocessedid="f3ukrh">
                    View Available Listings
                </button>
                <button
                    class="h-12 px-8 rounded-xl bg-white text-[#111817] font-bold text-base hover:bg-gray-100 transition-colors"
                    fdprocessedid="ge2rcq">
                    Talk to an Agent
                </button>
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
                    <div
                        class="p-6 rounded-xl border border-[#dbe6e5] dark:border-[#2a3c3a] bg-surface-light dark:bg-surface-dark flex flex-col gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">savings</span>
                        </div>
                        <h3 class="font-bold text-lg">Cost Savings</h3>
                        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Monthly rates are drastically
                            lower. Save up to 40% compared to nightly bookings.</p>
                    </div>
                    <div
                        class="p-6 rounded-xl border border-[#dbe6e5] dark:border-[#2a3c3a] bg-surface-light dark:bg-surface-dark flex flex-col gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <h3 class="font-bold text-lg">Community</h3>
                        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Connect with a thriving
                            community of expats and digital nomads in Duong Dong.</p>
                    </div>
                    <div
                        class="p-6 rounded-xl border border-[#dbe6e5] dark:border-[#2a3c3a] bg-surface-light dark:bg-surface-dark flex flex-col gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">verified_user</span>
                        </div>
                        <h3 class="font-bold text-lg">Stability</h3>
                        <p class="text-sm text-text-muted-light dark:text-text-muted-dark">Secure contracts and
                            registered residence papers for peace of mind.</p>
                    </div>
                </div>
                <!-- Featured Listings Section -->
                <section>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-text-main-light dark:text-text-main-dark">Featured Monthly
                            Rentals</h2>
                        <a class="text-primary font-medium hover:underline flex items-center gap-1" href="#">
                            View all <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Listing Card 1 -->
                        <div
                            class="group relative rounded-xl overflow-hidden bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] hover:shadow-lg transition-shadow">
                            <div class="relative h-48 w-full">
                                <div
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wider text-black">
                                    Available Now
                                </div>
                                <img alt="Modern studio apartment interior with minimal furniture"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuDB7RypbsjVkLVq6u7clhDdnS7qigeHzirqyeJCLWU4HJ2drvQ0d1bJMut323x6DNEntPWfa9DFLB83hSynirLSjYx3xghQbRmY4ZAThCe4KT-cyXFTwXSaJWkCv2-Xx7bRSDqcLXcTVML2PvwsW0kAl3bjUQg8bwVdIhXz3nahqo3CEP1xo0oq7EZX7i_NH3mU5xRUPcjCcQEgNphmXml3J0bC1AEZyiCIbhmLGPWNClfhg8R4nI1q9YiOi4Xy96bHtPm__c86ihe_">
                            </div>
                            <div class="p-5">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg line-clamp-1">Sunset Sanato Studio</h3>
                                    <div class="text-primary font-bold text-lg whitespace-nowrap">$450<span
                                            class="text-sm font-normal text-text-muted-light dark:text-text-muted-dark">/mo</span>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center gap-1 text-text-muted-light dark:text-text-muted-dark text-sm mb-4">
                                    <span class="material-symbols-outlined text-[18px]">location_on</span>
                                    Duong Bao, Duong To
                                </div>
                                <div
                                    class="flex gap-4 border-t border-[#f0f4f4] dark:border-[#2a3c3a] pt-4 text-sm text-text-muted-light dark:text-text-muted-dark">
                                    <div class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[18px]">bed</span> Studio
                                    </div>
                                    <div class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[18px]">shower</span> 1 Bath
                                    </div>
                                    <div class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[18px]">square_foot</span> 45m²
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Card 2 -->
                        <div
                            class="group relative rounded-xl overflow-hidden bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] hover:shadow-lg transition-shadow">
                            <div class="relative h-48 w-full">
                                <img alt="Luxury one bedroom apartment with large windows and sunlight"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvBjZKSz-zJNii3HFAezYqTf5EFoGBxRkrMCfv9Gj4hyzsHvHZC1ieVRm85GgSavp0xWq584GKpbde4CyoP-HrQymFSBlr-C6El8IhJp2Bh3R63bx_W5aDcfCQchwI-ncnzDN51kc3GXFvin9tfmXr_4HMPntwpVLhuYvryfEzepnhC49uk2tFlys8fT8YNx_L_m_3ExU6oFE3983pEP2GRh0few20bgT8b_qjaoi3-EGMvd8RqzQJxa6gKPwt5RgKBsqiwNCJ1mWo">
                            </div>
                            <div class="p-5">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg line-clamp-1">Marina Plaza Sea View</h3>
                                    <div class="text-primary font-bold text-lg whitespace-nowrap">$750<span
                                            class="text-sm font-normal text-text-muted-light dark:text-text-muted-dark">/mo</span>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center gap-1 text-text-muted-light dark:text-text-muted-dark text-sm mb-4">
                                    <span class="material-symbols-outlined text-[18px]">location_on</span>
                                    Waterfront, Duong Dong
                                </div>
                                <div
                                    class="flex gap-4 border-t border-[#f0f4f4] dark:border-[#2a3c3a] pt-4 text-sm text-text-muted-light dark:text-text-muted-dark">
                                    <div class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[18px]">bed</span> 2 Beds
                                    </div>
                                    <div class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[18px]">shower</span> 2 Bath
                                    </div>
                                    <div class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[18px]">square_foot</span> 85m²
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <!-- Map CTA -->
                <div class="relative w-full h-[300px] rounded-2xl overflow-hidden group cursor-pointer"
                     data-location="Phu Quoc Island Map"
                     style="https://lh3.googleusercontent.com/aida-public/AB6AXuAjrk2gBVLXCHc9uMnOjLgvtSroNnJ5yeH0JVYX9pcMEUrtWj_WKuyIg8iNDKqjZtpM7xnZnja2hHi1TxCfm0jzt_jLab_u74CKJ5Nrl3n6ZEebPLAFjXs_VPSzYNAWQXsgJkc1gSTKNR54QigN5PTcW7wb2Yksh1a9D1V_miYS8bqlYZopzRJheNaI798IYjIrdtJQDKubXB9tPwxzU1QaS_T2F0c3ZFfGuK4QTzqcOHORDmMHlxezIdqpngoUMhlpxw40FpbOUxrT">
                    <img alt="Map view of Phu Quoc island with markers" class="w-full h-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2KXgOHWn1_QPexAIz9MPLbJHP8U9IBUeMjYje6dDlr1Zz4yw6wTMBAkHy7H64SeesnSzbt6M-nNTtcWM0Hj1U3svvja7fM0mgKKw46v-NJKIDWTQV5zTK0ge04lj2BSS0cKO0bpPhDfB-J88nGKopXOxGfnkj_3G8iiQodgKPEyjr53678gxx1jrq19HC22UgP3RcHVEis7Wr8QqAO0qCA2nKWaYcnYzMMAlV6oJwSVsBQe_J_L6iWMRsLlqOKsOogMDfdYjgvVUO">
                    <div
                        class="absolute inset-0 bg-black/40 flex items-center justify-center group-hover:bg-black/50 transition-colors">
                        <button
                            class="flex items-center gap-2 bg-white text-black px-6 py-3 rounded-full font-bold shadow-lg transform group-hover:scale-105 transition-transform"
                            fdprocessedid="k5zxbn">
                            <span class="material-symbols-outlined text-primary">map</span>
                            Browse Rentals on Map
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar (Right - 4 cols) -->
            <aside class="lg:col-span-4 space-y-8">
                <!-- Search Widget -->
                <div
                    class="bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] p-6 rounded-2xl shadow-sm sticky top-24">
                    <h3 class="text-lg font-bold mb-4">Find Your Home</h3>
                    <form class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1.5">
                            <label
                                class="text-xs font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark">Location</label>
                            <select
                                class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary"
                                fdprocessedid="g5sxhk">
                                <option>All Areas</option>
                                <option>Duong Dong</option>
                                <option>An Thoi</option>
                                <option>Ong Lang</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label
                                class="text-xs font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark">Type</label>
                            <select
                                class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary"
                                fdprocessedid="gvep1">
                                <option>Apartment / Condo</option>
                                <option>Private Villa</option>
                                <option>Studio</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label
                                class="text-xs font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark">Budget
                                (Monthly)</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input
                                    class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary"
                                    placeholder="Min" type="number" fdprocessedid="cues3">
                                <input
                                    class="w-full h-11 px-3 rounded-lg border-gray-200 bg-white dark:bg-black/20 dark:border-[#2a3c3a] text-sm focus:border-primary focus:ring-primary"
                                    placeholder="Max" type="number" fdprocessedid="dl49es">
                            </div>
                        </div>
                        <button
                            class="mt-2 w-full h-12 rounded-xl bg-primary text-[#111817] font-bold hover:bg-[#0fdbc9] transition-colors flex items-center justify-center gap-2"
                            type="button" fdprocessedid="uj96pg">
                            <span class="material-symbols-outlined">search</span>
                            Search Rentals
                        </button>
                    </form>
                </div>
                <!-- Agent Contact Card -->
                <div class="bg-[#102220] p-6 rounded-2xl text-white relative overflow-hidden">
                    <!-- Decorative gradient blob -->
                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 bg-primary blur-[60px] opacity-20 rounded-full"></div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold mb-2">Need Local Help?</h3>
                        <p class="text-gray-400 text-sm mb-6">Our local agents speak English and can help you negotiate
                            the best long-term deals.</p>
                        <div class="flex items-center gap-3 mb-6">
                            <img alt="Portrait of a smiling real estate agent"
                                 class="w-12 h-12 rounded-full border-2 border-primary object-cover"
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgflp-NSO7Z_dnpjOATRCl4thGiIiBPSORAJ_7gedCN91KAw3c7oesPs1_jSq494GD95VYaagPJf5EV2MfbVa4ZRUZBbLEMH3VIYO_yadLZ9vO7I29mCGSU-cPjTf4bAsvDN3x9Kmf8STEvr6P38D1hmzJpQCW_hhci5TocSgFFCMEyfzmINEu0oT8FqkITNny28wZmir0ZihiRc12pUrlNOtOlGvYmuOGokoJDGrBDZZOKKPgeJ77y7EYMqrIOx0OJyz5ryTVLHO_">
                            <div>
                                <div class="font-bold">Ms. Lan Anh</div>
                                <div class="text-xs text-primary">Rental Specialist</div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <button
                                class="w-full h-10 rounded-lg bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold text-sm flex items-center justify-center gap-2 transition-colors"
                                fdprocessedid="s4a0mi">
                                <!-- Simple SVG for WhatsApp as Material Symbols doesn't have brand icons -->
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
                                </svg>
                                Chat on WhatsApp
                            </button>
                            <button
                                class="w-full h-10 rounded-lg bg-[#0068FF] hover:bg-[#005ad9] text-white font-bold text-sm flex items-center justify-center gap-2 transition-colors"
                                fdprocessedid="140t8">
                                Chat on Zalo
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Related Links -->
                <div
                    class="bg-surface-light dark:bg-surface-dark border border-[#dbe6e5] dark:border-[#2a3c3a] p-6 rounded-2xl">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-text-muted-light dark:text-text-muted-dark mb-4">
                        You might also like</h3>
                    <ul class="space-y-4">
                        <li>
                            <a class="group flex items-start gap-3" href="#">
                                <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                    <img alt="Motorbike parked on a beach road" class="w-full h-full object-cover"
                                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1srqZCFqQyNLUgHcQV4CzQ3dpKSKXrof3tQC-83q22OFqoCohYLE39RGdgujhsGQdQCPQoB2ymUGGIsTSpjXXLGLBbg81nAxBCaEMCzSqKrnnDU5YKRj5UpiHGSyvuqlvWKjBu8GS3AXF04FFIhJXHm5Kfud2GjgW7B9cB_55eeqa4RazKJkcG2EMSdcyUVtMCiGxUJDdN32JFm69aSnq2JdOcnP-VIsJdyEz_HSwYUEQmFD3MQaf7ZUrkQ1iYT_JNciPyiTP86Ot">
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold group-hover:text-primary transition-colors">Motorbike
                                        Rental Guide</h4>
                                    <p class="text-xs text-text-muted-light dark:text-text-muted-dark">Prices &amp;
                                        Tips</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="group flex items-start gap-3" href="#">
                                <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                    <img alt="Poolside view of a resort" class="w-full h-full object-cover"
                                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBD04KD8BKZRTy2s8dqX-GczcI2XOBMDCzgbX-3vxX1CNS9w1Ix9U_UVC67FOId0i6F69ixTVVuulyHe-B03p8eVJ1o5qTk6hlk8MwedtTm2a-NXGtsQstlxiJgWl4xVuEQNYOgae6kTTzYV1eiiIZZ2fnbiSQ-QWue4q14I1aoCAWgCZksT10o0wVBjzXeSxUB5nX-cxfOcBKxbLvGWbahsiLwpTfFMnbjGMcfFN6h5TuZbrKSoOIRbYX_GlsKDJNumtpPCcVOWWb2">
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold group-hover:text-primary transition-colors">Short-Term
                                        Holiday Stays</h4>
                                    <p class="text-xs text-text-muted-light dark:text-text-muted-dark">Best for 1-2
                                        weeks</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
    <!-- FAQ Section -->
    <section class="bg-[#f0f4f4] dark:bg-[#1a2c2a] py-16">
        <div class="max-w-[960px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold mb-4">Frequently Asked Questions</h2>
                <p class="text-text-muted-light dark:text-text-muted-dark">Common questions about renting apartments in
                    Phu Quoc long-term.</p>
            </div>
            <div class="space-y-4">
                <details
                    class="group bg-white dark:bg-surface-dark p-6 rounded-xl shadow-sm cursor-pointer [&amp;_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between gap-1.5">
                        <h3 class="font-bold text-lg">Do rentals include internet?</h3>
                        <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180">expand_more</span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-muted-light dark:text-text-muted-dark">
                        Most long-term apartments geared towards expats include high-speed WiFi in the rental price.
                        However, private villas may require you to set up your own contract with providers like Viettel
                        or VNPT (approx $10-15/month).
                    </p>
                </details>
                <details
                    class="group bg-white dark:bg-surface-dark p-6 rounded-xl shadow-sm cursor-pointer [&amp;_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between gap-1.5">
                        <h3 class="font-bold text-lg">Can I pay by credit card?</h3>
                        <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180">expand_more</span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-muted-light dark:text-text-muted-dark">
                        Cash (VND) is king in Vietnam. While some modern property management companies accept bank
                        transfers or cards (with a 3% fee), most private landlords prefer monthly cash payments or
                        domestic bank transfers.
                    </p>
                </details>
                <details
                    class="group bg-white dark:bg-surface-dark p-6 rounded-xl shadow-sm cursor-pointer [&amp;_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between gap-1.5">
                        <h3 class="font-bold text-lg">Are pets allowed?</h3>
                        <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180">expand_more</span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-muted-light dark:text-text-muted-dark">
                        It varies. Many condo buildings have strict no-pet policies. Private houses and villas are
                        generally more pet-friendly. Always clarify this before signing the contract.
                    </p>
                </details>
            </div>
        </div>
    </section>
    <!-- Final CTA Strip -->
    <section class="bg-primary py-16">
        <div class="max-w-[1280px] mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-black text-[#111817] mb-2">Ready to move to paradise?</h2>
                <p class="text-[#111817]/80 text-lg font-medium">Browse our full catalog of 200+ verified long-term
                    listings.</p>
            </div>
            <button
                class="flex-shrink-0 bg-[#111817] text-white h-14 px-8 rounded-xl font-bold text-lg hover:bg-black transition-colors shadow-lg"
                fdprocessedid="w47x6h">
                Browse All Rentals
            </button>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .dark {
            color-scheme: dark;
        }

        [& _summary::-webkit-details-marker

        ]
        {
            display: none
        ;
        }
    </style>
@endpush
