@extends('layouts.app')

@section('title', '18th Floor Sunset Town Phu Quoc | PQ Rentals')

@section('content')
<main class="pb-16 pt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <nav class="flex mb-4 text-sm text-gray-500 dark:text-gray-400">
                <a class="hover:text-primary" href="#">Home</a>
                <span class="mx-2">/</span>
                <a class="hover:text-primary" href="#">Rentals</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 dark:text-gray-200">Sunset Town</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="bg-primary/10 text-primary text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Featured</span>
                        <span class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Available Now</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white leading-tight">18th Floor Sunset Town Phu Quoc | One Bedroom</h1>
                    <div class="flex items-center gap-2 mt-2 text-gray-600 dark:text-gray-400">
                        <span class="material-symbols-outlined text-primary text-lg">location_on</span>
                        <span>An Thoi, Sunset Town, Phu Quoc Island</span>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex items-baseline justify-end gap-1">
                        <span class="text-3xl font-bold text-primary">$732</span>
                        <span class="text-gray-500 dark:text-gray-400 font-medium">/ Monthly</span>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Approx. 18,000,000 VND</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10 h-[500px]">
            <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-2xl cursor-pointer">
                <img alt="Living room with ocean view" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnHbx1vlhT0Hs4BqmTsv5eGO2IxMr5ySF8WqHNDf7EjsRFTYbkfCeJwPcgdCBayOkAlPKQNX0Tk4GWKDrxRlK_Ql1mgfsvVuZuUwIvrEUIiv6vyrxZjd517KDb2nT5Gdao9tuhIyEgWrH7WG4P0DU6Yj77S2gEi-n2EO0E96i_TjxcfKpMin2YkIwbLwtqhAM89ocbGZF5mm3tG6wxBmqOD5_t-2hDxo3YmX5GC_bDe7PhXOfwI45UDDlFfUlnUTJIxopC5uexf6FB"/>
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition"></div>
            </div>
            <div class="relative group overflow-hidden rounded-2xl cursor-pointer h-full">
                <img alt="Modern bedroom" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHuGzjLBRzvDrASO3qM7T3FGRxur53yUYWyWrqXarRqfN4W4hkcQ9saz2_KAMjFegqbic7xTKmHOYKOap_Is93CDvIFyImFJI_PtbwA_GgK3q0xcUsFlOtBkDte56vN7JOgCwkKe2BbwtsM8XT2JkZQp-ax9m0OWkXBVK9jYFDqnUgOr0hiqDQa3nA4qOGVQ0RXM1xTkDKyCZCDE5zt2PlrPWmKLjBea7qCy4k34EnReDHaGSglO2E7AOBVQYJYXiASqjkQzF_28zT"/>
            </div>
            <div class="relative group overflow-hidden rounded-2xl cursor-pointer h-full">
                <img alt="Kitchen view" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWmGWWyZ6QWK-UuS9zU7mpH-vhwgTDtsSOUBBBOnlYmGl6yW6pHSEm0fqTSRu0bsM0a7-9HwKPIfkd8QEh9NpU6V8Oqq9QfAGN3vzq04vqKziq-yYt61bMxOfHlyFFTBdbF06CxKaJqxK0XeV5x2SuglAUQ8s3PwdJDk7jay4dT0e_QpYfQBjpdC0orumGtvmMb-k4K84hTQV8mswe5svgY2MR5vSHg_qHxQLhtziHWE4_a2cvoB2s_m8BtrRV67X5GAX8gczpVSt9"/>
            </div>
            <div class="relative group overflow-hidden rounded-2xl cursor-pointer h-full">
                <img alt="Bathroom" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQaIGnboMQOfmAvXvwNmmSdGRwdCM4XLOLq3WcL9OHi9Huw_Y6OuqshbmA6KETiLzofSOI3kWX_R5LoemmXoWPvJWqUBpJ-Etujmi1RZ1eZeTg7RpNgr-FuLMlbiY5ldoILYdjD7JqkUfKdXFI4yZ07P_DSRdTZDbi1mf3BuGl3qtRH_-4GOAQgbqakpthjCYiQ3lH7y7dwdBy79ArScPcCoPAFpmzxdO1fY048RTkatX6T0JjYL_6Z-iAisdy8jxMBA-YDxyqPr1X"/>
            </div>
            <div class="relative group overflow-hidden rounded-2xl cursor-pointer h-full">
                <img alt="Balcony view" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBh3eN4MGKTlR0BAf-cTIZFQMKQ6rEXJseoI2gNb82FGoxUUhA3sBfOFWycgwv1v6vjZIP0MS46bqdZv1XrqNRNPGim6jcV9VX93b1TaPJOJkYVVeI99Y0qG_EEi3bxqIrLKUTMLMvvfBrkRTMxcpmokbNb4zq1vId5HLhT2UCB4VOV3JHAxuAy-782AFKERTnk_9ONn38pnL5aeC8zxcG1Fe_foaIeygcfxefIjBys6Qt1pZtNHr4drGboS61CLvAPfkCtsZj9Y-w3"/>
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <span class="text-white font-medium flex items-center gap-2">
                        <span class="material-symbols-outlined">grid_view</span> See all photos
                    </span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white dark:bg-surface-dark p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm flex flex-wrap gap-8 justify-between md:justify-start">
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                            <span class="material-symbols-outlined">bed</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">Bedrooms</p>
                            <p class="font-bold text-gray-900 dark:text-white">1 Bed</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                            <span class="material-symbols-outlined">shower</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">Bathrooms</p>
                            <p class="font-bold text-gray-900 dark:text-white">1 Bath</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                            <span class="material-symbols-outlined">square_foot</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">Area Size</p>
                            <p class="font-bold text-gray-900 dark:text-white">50 m²</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
                            <span class="material-symbols-outlined">landscape</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">View</p>
                            <p class="font-bold text-gray-900 dark:text-white">Sea &amp; Firework</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">About this property</h3>
                    <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Experience luxury living at its finest on the 18th floor of the iconic Sunset Town complex. This stunning one-bedroom apartment offers breathtaking panoramic views of the ocean and the famous nightly fireworks display.
                        </p>
                        <p class="mb-4">
                            The apartment features a modern open-plan layout, a fully equipped kitchen with high-end appliances, and a spacious balcony perfect for enjoying your morning coffee or evening cocktails.
                        </p>
                        <p>
                            Located just steps away from the beach, vibrant restaurants, and local markets, this is the perfect base for your long-term stay in Phu Quoc. Includes high-speed WiFi and weekly cleaning service.
                        </p>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-700">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Property Amenities</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>Air Conditioning</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>High-Speed Wifi</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>Swimming Pool</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>Fitness Center</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>Smart TV</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>24/7 Security</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>Washing Machine</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-sm">check_circle</span>
                                <span>Balcony</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-surface-dark p-8 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Location</h3>
                        <a class="text-primary text-sm font-medium hover:underline flex items-center gap-1" href="#">
                            Open in Google Maps <span class="material-symbols-outlined text-sm">open_in_new</span>
                        </a>
                    </div>
                    <div class="bg-gray-200 dark:bg-gray-800 rounded-xl h-64 w-full flex items-center justify-center relative overflow-hidden group">
                        <img alt="Map Preview" class="absolute inset-0 w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKmtCDcLoY0uJRo2adnLu9ADr_fwhb3StdWD9EYo_NHoz6N5eq04PymAYDnelYVsoLKbRMRyQmFJdWCG6FeNvEjJ8MJabkiOoVHP6L5MMYvaI0Xrn4zm1fDKt4XR02SdTe5U2i5ipdGdSCaOm56sJ8-6HLinac0GnimUCFmTWHSmiy9xwHIob77zlSsKQdqPADy3af1mKJeUJTSlMBzd9G_WdFVORQMD8IMzdyGPDKMYOz80uPHOcbIWKcK0QKuKmmgpzagMkgtfpC"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                        <div class="relative z-10 bg-white dark:bg-surface-dark px-4 py-2 rounded-lg shadow-lg flex items-center gap-2 animate-bounce">
                            <span class="material-symbols-outlined text-red-500">location_on</span>
                            <span class="font-bold text-gray-900 dark:text-white">Sunset Town</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Nearby Attractions</h4>
                        <ul class="space-y-3">
                            <li class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Kiss Bridge</span>
                                <span class="font-medium text-gray-900 dark:text-white">0.5 km</span>
                            </li>
                            <li class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Sun World Cable Car Station</span>
                                <span class="font-medium text-gray-900 dark:text-white">1.2 km</span>
                            </li>
                            <li class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Khem Beach</span>
                                <span class="font-medium text-gray-900 dark:text-white">3.0 km</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <div class="bg-white dark:bg-surface-dark p-6 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-lg">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Interested in this apartment?</h3>
                        <div class="flex items-center gap-4 mb-6">
                            <img alt="Agent Avatar" class="w-14 h-14 rounded-full object-cover border-2 border-white dark:border-gray-600 shadow-md" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBc4Oj3IjGFpcZY6TY_uhNiVyY8AlyPUs1sQw_M2zUxubUSusL67YGW6Eo2i0XGVb0YlV-scKfa5ed9ocpycjN7MbfWCItpJ2fOw-d2BZRFkcApyiKKaRImuuH4fKN1W6B5OThPo1bgSNynXTsHr-5FygQ-jSjcVroZe1GN3A8EgN7T431u9b2UOIhE9DAdyhKcRT_IrSSE6Ezbozh2HVuyQ50ZSZVaaHoKDaUWe9Cb9GTAxADan-x5DzRhZNKukPnOEQ8PV9_Y9LJD"/>
                            <div>
                                <p class="font-bold text-gray-900 dark:text-white">Sarah Nguyen</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Senior Rental Agent</p>
                                <div class="flex gap-1 mt-1 text-yellow-400 text-xs">
                                    <span class="material-symbols-outlined text-[14px]">star</span>
                                    <span class="material-symbols-outlined text-[14px]">star</span>
                                    <span class="material-symbols-outlined text-[14px]">star</span>
                                    <span class="material-symbols-outlined text-[14px]">star</span>
                                    <span class="material-symbols-outlined text-[14px]">star</span>
                                </div>
                            </div>
                        </div>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Your Name</label>
                                <input class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" placeholder="John Doe" type="text"/>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Phone / WhatsApp / Zalo</label>
                                <input class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" placeholder="+84 ..." type="tel"/>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                                <textarea class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" placeholder="I'm interested in this property..." rows="3"></textarea>
                            </div>
                            <button class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 rounded-xl shadow-lg shadow-primary/30 transition transform active:scale-95" type="button">
                                Send Inquiry
                            </button>
                        </form>
                        <div class="mt-4 flex gap-2">
                            <button class="flex-1 flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-2.5 rounded-lg text-sm font-medium transition">
                                <span class="material-symbols-outlined text-sm">chat</span> WhatsApp
                            </button>
                            <button class="flex-1 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg text-sm font-medium transition">
                                <span class="material-symbols-outlined text-sm">forum</span> Zalo
                            </button>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-600 to-primary p-6 rounded-2xl shadow-lg text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                        <h4 class="font-bold text-lg mb-2 relative z-10">Need a Motorbike?</h4>
                        <p class="text-indigo-100 text-sm mb-4 relative z-10">Rent a reliable scooter to explore the island freely. Special rates for long-term tenants.</p>
                        <a class="inline-block bg-white text-primary font-bold text-sm px-4 py-2 rounded-lg hover:bg-gray-100 transition relative z-10" href="#">
                            View Rentals
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16">
            <div class="flex justify-between items-end mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Similar Properties</h3>
                <a class="text-primary font-medium hover:underline flex items-center" href="#">View all <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group bg-white dark:bg-surface-dark rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <span class="absolute top-3 left-3 bg-white dark:bg-surface-dark px-2 py-1 rounded text-xs font-bold shadow-sm z-10">Apartment</span>
                        <img alt="Studio Apartment" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbdTDnFnDq4qiKYXglPz_cAXcxTslR6PvIyU5qzTmMU4h-jotmwNxOGNTVZR3w7k_yClBnKA7QPH4J_vzgrBO39bL2h0sHR3YgCcgkKSilz094dK32VI5rewNzDNv2Hk3WcItZxS_1FMzsAR6iLl05nhemL7cLk1Rppee-uHv21t6sF_nFiVkmZLJmlS0QEsTDtzvZ1ibztkygS5In6lXPrFi5gILJmjQC18UZDyXQsbh_dAQFsD2PY5t3lEBnjaEpF7W9f78llqyD"/>
                        <div class="absolute bottom-3 right-3 bg-black/60 text-white px-2 py-1 rounded text-xs font-medium backdrop-blur-sm">
                            $550 / mo
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2 group-hover:text-primary transition">Cozy Sunset Town Studio</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span> Sunset Town
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400 border-t border-gray-100 dark:border-gray-700 pt-4">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">bed</span> Studio</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">shower</span> 1 Bath</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">square_foot</span> 35m²</span>
                        </div>
                    </div>
                </div>
                <div class="group bg-white dark:bg-surface-dark rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <span class="absolute top-3 left-3 bg-white dark:bg-surface-dark px-2 py-1 rounded text-xs font-bold shadow-sm z-10">Villa</span>
                        <img alt="Villa" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKux_VH9w67y8kjUGbqtoDICFNu342GxWELE2o-JJBEyWcSQ6OicM-j6ssWlTIC91neH2EX6HDUX9ZQkbumKNBJjoC_7kX0qf4xUGrxPpPAgCUY0PslKtIHke7INCZntrLnJ92kDioODv-NNxE2PJTNZPzzuGaZSjcTdHsJPgNGysEST5x9CbzhYoiX-8-w7Uj88fo8q-dXrVJeDpThmYajo_Usj1mV2e0-srf426McXk5H382YI1Z7FnsEF3EOO2rvG4wFRStqoPD"/>
                        <div class="absolute bottom-3 right-3 bg-black/60 text-white px-2 py-1 rounded text-xs font-medium backdrop-blur-sm">
                            $1,200 / mo
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2 group-hover:text-primary transition">Beachfront Mini Villa</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span> Bai Khem
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400 border-t border-gray-100 dark:border-gray-700 pt-4">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">bed</span> 2 Beds</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">shower</span> 2 Baths</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">square_foot</span> 80m²</span>
                        </div>
                    </div>
                </div>
                <div class="group bg-white dark:bg-surface-dark rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <span class="absolute top-3 left-3 bg-white dark:bg-surface-dark px-2 py-1 rounded text-xs font-bold shadow-sm z-10">Apartment</span>
                        <img alt="Apartment 3" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2tA7OYjSTfPU_qbbccA6BOPytfpT_5BlNtr49NFH6g0TIdw-TxFWkDNntlY__X590man9o4UEzF0puQICIlyY5K-RR6iek1N8q7k5GcS4voitdXFdNIsmrVSyPFejBO0G55KCmCQLT138gjK1JZBqTzjK8W5vM2NVDc9OisFEo4ROnl_e3smHoobu2z9Ao5JO6rC85yLGmZbiW_KUa-fhlBhKy6SdTNv0grSCbeLviiBDJ19GLVjUeJ-7QjrK7fOkPOoVpxE_2omx"/>
                        <div class="absolute bottom-3 right-3 bg-black/60 text-white px-2 py-1 rounded text-xs font-medium backdrop-blur-sm">
                            $650 / mo
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2 group-hover:text-primary transition">Ocean View 1BR Condo</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span> Sunset Town
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400 border-t border-gray-100 dark:border-gray-700 pt-4">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">bed</span> 1 Bed</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">shower</span> 1 Bath</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">square_foot</span> 45m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection