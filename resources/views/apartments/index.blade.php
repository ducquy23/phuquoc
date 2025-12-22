@extends('layouts.app')

@section('title', 'PQRentals - Apartment Listings')

@section('content')
<div class="relative pt-32 pb-12 lg:pt-40 lg:pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Phu Quoc ocean view through window" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBS9zEx_i7sWV_cy7etH0N8N-neo42QqqZyEeHscpX9AHBiPFo5xh883AS9BjNw5Ab21qHZwWbZqKM-PHPCBSc0jxdCxhQmP5L73pvfmwnydnkyBUqsPHr2ftNLw4PpbKTBwlJCg3Y92pyDS1QKPCFiA_iNzBRVpDNJcbdP5vcTew7fzhPVQxHt4zIUuW6hRZv6EE6sa9J9TGXp7fnl_Ay47mUoRj-GT6AU-Ur9bXKl3WLjzQT1cYkNsML5r0cRSeurHAHbzNhVcvTu"/>
        <div class="absolute inset-0 bg-gradient-to-b from-white/90 via-white/40 to-white/90 dark:from-background-dark/95 dark:via-background-dark/60 dark:to-background-dark/95"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 dark:text-white mb-6 leading-tight">
            Discover Your Perfect <span class="text-primary">Phu Quoc</span><br class="hidden md:block"/> Apartment for Rent
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300 mb-10 max-w-2xl mx-auto font-medium">
            Find the best long-term and short-term rentals with stunning ocean views, modern amenities, and prime locations.
        </p>
        <div class="bg-white dark:bg-card-dark rounded-3xl shadow-xl dark:shadow-2xl dark:shadow-black/50 p-6 max-w-5xl mx-auto border border-gray-100 dark:border-gray-700 backdrop-blur-sm">
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <div class="relative flex-grow">
                    <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-gray-50 dark:bg-slate-800 border-none rounded-xl text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-primary transition-all" placeholder="Search by keyword..." type="text"/>
                </div>
                <div class="flex bg-gray-100 dark:bg-slate-800 p-1 rounded-xl self-start md:self-auto">
                    <button class="px-6 py-2 rounded-lg bg-primary text-white text-sm font-semibold shadow-sm transition-all">All</button>
                    <button class="px-6 py-2 rounded-lg text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white text-sm font-medium transition-all">Available</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="relative">
                    <select class="w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option>All Main Locations</option>
                        <option>Sunset Town</option>
                        <option>An Thoi</option>
                        <option>Duong Dong</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                </div>
                <div class="relative">
                    <select class="w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option>All Types</option>
                        <option>Apartment</option>
                        <option>Villa</option>
                        <option>Studio</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                </div>
                <div class="relative">
                    <select class="w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option>All Beds</option>
                        <option>1 Bed</option>
                        <option>2 Beds</option>
                        <option>3+ Beds</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                </div>
                <button class="w-full bg-primary hover:bg-sky-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
                    <span class="material-icons-round">search</span>
                    Search
                </button>
            </div>
        </div>
    </div>
</div>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Available Properties</h2>
            <p class="text-slate-500 dark:text-slate-400">Showing 24 properties in Phu Quoc</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Sort by:</span>
            <div class="relative">
                <select class="appearance-none pl-4 pr-10 py-2 bg-white dark:bg-card-dark border border-gray-200 dark:border-slate-700 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer shadow-sm">
                    <option>Newest Listed</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
                <span class="material-icons-round absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-base">expand_more</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <span class="absolute top-4 left-4 z-10 bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">Featured</span>
                <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                    <span class="material-icons-round text-xl">favorite_border</span>
                </button>
                <img alt="Apartment Interior" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9_UQG88xOTlW6nq4_OzUWNTDREW7_1vKNkSuLzEPO0pBRo2dZqnpFZd0pIg8sw8Dbfcae7a_Ky4AQLRaLzYb1oKIQTlzXegvfB1HIWlYLjqzK82S5vekp3YqpvfpMupy_c4-md1RCdSRlvoF0F0t8sUvkbM1c9tYSutXcNRq_WmTpkcbcpn3gzfHbB4uHR0rs5kJ7OGFUy0nMjTPCpJFtEP5AObryQqqLR40qiFaao5YIg5CQo-SkN0dXd-Ehlq1d_1JjROAb5Bjz"/>
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent h-20"></div>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">18th Floor Sunset Town Phu Quoc</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Sea + Firework View</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">king_bed</span>
                        <span class="text-sm font-semibold">1 Bed</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">square_foot</span>
                        <span class="text-sm font-semibold">50 m²</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">bathtub</span>
                        <span class="text-sm font-semibold">1 Bath</span>
                    </div>
                </div>
                <div class="mt-auto flex justify-between items-center pt-2">
                    <div>
                        <p class="text-xs font-semibold text-primary mb-0.5">Available</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-slate-900 dark:text-white">$732</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        </div>
        <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <span class="absolute top-4 left-4 z-10 bg-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">New</span>
                <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                    <span class="material-icons-round text-xl">favorite_border</span>
                </button>
                <img alt="Modern Studio" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBy8sdIijezaI6_iZgs6b-EGrn3qwmHMrmIjJw7EtzonPFpnnL7BwbrsVBHXaCBWPix92BNk_6XSefEzXVtALSiSYowcUIcGzELD19o4kSLcVZkTIuP1VYu6G0gk27bzYCGOp1whc1y4hXU7iyZfZTWlSDFVb_cI7EeCHnNk-VyqiDMJn6WQmqAFfmBUUWXgJCQyqQiadJZZMsVuCZQWaOGnhVsJ47TOQt3PUbhxDAPjO7KactbIUlDqwWn5DR-7Hn0WpnxnrqG9I58"/>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">Modern Studio An Thoi Center</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">City View, Close to Market</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">king_bed</span>
                        <span class="text-sm font-semibold">Studio</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">square_foot</span>
                        <span class="text-sm font-semibold">35 m²</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">bathtub</span>
                        <span class="text-sm font-semibold">1 Bath</span>
                    </div>
                </div>
                <div class="mt-auto flex justify-between items-center pt-2">
                    <div>
                        <p class="text-xs font-semibold text-emerald-500 mb-0.5">Available Now</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-slate-900 dark:text-white">$450</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        </div>
        <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                    <span class="material-icons-round text-xl">favorite_border</span>
                </button>
                <img alt="Luxury Villa" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzUO05pg9yVPGKwsoFpuzPX9wWKXSAAZc-NGL-HYOwWvhhCLx-yQQ900t_ZqS35QZFbcL712132hT3Vp7Ucuiq4MgU2zai-Due_O8pW_USfhNZ4mnNOkNfEgt90hys0PmtRlOPSTqmPD0AqGYQjz9xLaWyKMtjGSoDyCzuJqU9xgjlWmNTgtD95jf_4b3zWybKeW3Usu6eMB12LY0RvLTtge8MJ32LC6Fil9dtcrpwFPmwYdznKKJ4Iwe7ntcB_6WuWa4Oy9AXKd0h"/>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">Luxury 3BR Villa with Pool</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Beachfront, Private Pool</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">king_bed</span>
                        <span class="text-sm font-semibold">3 Beds</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">square_foot</span>
                        <span class="text-sm font-semibold">180 m²</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">pool</span>
                        <span class="text-sm font-semibold">Pool</span>
                    </div>
                </div>
                <div class="mt-auto flex justify-between items-center pt-2">
                    <div>
                        <p class="text-xs font-semibold text-primary mb-0.5">Available Dec 1st</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-slate-900 dark:text-white">$2,100</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        </div>
        <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                    <span class="material-icons-round text-xl">favorite_border</span>
                </button>
                <img alt="Cozy Apartment" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA11aCH-vgz1rUEwc7Jsz_ebOjAEUS9eoOMfERUQbNUc1HtLf-8LCXrlGbcj7qXsin7MTeGw1osE5k2zwI0SHEn-DbNG015PY3Td4vTQmwYYvIeMMqJKaTsQIJkh_FKAegly6k9QcNKroJoBgzcHADRYkmfLAb6RPiNaxepFDlssd_KLYD2c6_sKIFZ534dCtdrwthnKsRW0K_vPgn3PEJycVzUbtSiSw2P_jpgA_CRhjL_-6h-i1WibuniJF0lbhmJ5C_DyHIK85bI"/>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">Cozy 2BR Duong Dong Apartment</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Central Location, Quiet Area</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">king_bed</span>
                        <span class="text-sm font-semibold">2 Beds</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">square_foot</span>
                        <span class="text-sm font-semibold">75 m²</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">bathtub</span>
                        <span class="text-sm font-semibold">2 Bath</span>
                    </div>
                </div>
                <div class="mt-auto flex justify-between items-center pt-2">
                    <div>
                        <p class="text-xs font-semibold text-primary mb-0.5">Available</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-slate-900 dark:text-white">$650</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        </div>
        <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <span class="absolute top-4 left-4 z-10 bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-md uppercase tracking-wider">Hot</span>
                <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                    <span class="material-icons-round text-xl">favorite_border</span>
                </button>
                <img alt="Studio Flat" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_4ZNUAiKP_219l8TqWgK7fEIHpwJc07LeG1FClArrexd2pBQFt3bJAkdgZtiPxuXQMYBoEC83MaaNb8ddNNXUf0D0Mejkgj8wSHgMqgQl3434OCR58rT6xDX6f-1Yc3AkkuDMe2DxrmZdhgxfo78r1-Ug-eOqv_S_FM7u5_vvVlDdyVYR58sOux04i_I0QBmEHYX8RhgZiW4z8dExybES7RWWWwixUtWFXLB3DPu18UxvWORGpF2ZTMAaVte5Mr00ocpgdwjz_wAz"/>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">Compact Studio near Night Market</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Walking distance to nightlife</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">king_bed</span>
                        <span class="text-sm font-semibold">Studio</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">square_foot</span>
                        <span class="text-sm font-semibold">28 m²</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">bathtub</span>
                        <span class="text-sm font-semibold">1 Bath</span>
                    </div>
                </div>
                <div class="mt-auto flex justify-between items-center pt-2">
                    <div>
                        <p class="text-xs font-semibold text-primary mb-0.5">Available</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-slate-900 dark:text-white">$350</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        </div>
        <div class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <button class="absolute top-4 right-4 z-10 p-2 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full text-white transition-colors">
                    <span class="material-icons-round text-xl">favorite_border</span>
                </button>
                <img alt="Serviced Apartment" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOgUakz-fz0V2OExFfpiC8DYoQh4USqoHiTw8qV1BDPw0KWYReK15BurhxZO_0smCsQDOrZGDHWga8v9sNcdUs9jIxlcED2x9vaETlRnKMKYWVbKAZk3dgPOkKXGcTlRP0GyKzWpkByPA7tH9mjG--kZ_1mOJb--3g4ApvHWa6I0QfpQXoKM4boUaJzZIx7qMTkXXDlKe-eLwLTPU13kFjiDppN3SgLeNN7YyQSSqJq4eoJm6G7MeABl5H5vwjUx2sz52tBuh4AFJ3"/>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors">Premium Serviced Apartment</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Cleaning included, Gym Access</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">king_bed</span>
                        <span class="text-sm font-semibold">1 Bed</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">square_foot</span>
                        <span class="text-sm font-semibold">45 m²</span>
                    </div>
                    <div class="w-px h-4 bg-gray-200 dark:bg-slate-600"></div>
                    <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="material-icons-round text-primary text-lg">fitness_center</span>
                        <span class="text-sm font-semibold">Gym</span>
                    </div>
                </div>
                <div class="mt-auto flex justify-between items-center pt-2">
                    <div>
                        <p class="text-xs font-semibold text-primary mb-0.5">Available</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-extrabold text-slate-900 dark:text-white">$550</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Monthly</span>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-gray-50 dark:bg-slate-700 hover:bg-primary hover:text-white dark:hover:bg-primary text-slate-700 dark:text-slate-200 text-sm font-semibold rounded-lg transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-16 flex justify-center">
        <nav class="flex items-center gap-2">
            <button class="p-2 rounded-lg border border-gray-200 dark:border-slate-700 text-slate-500 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                <span class="material-icons-round text-lg">chevron_left</span>
            </button>
            <button class="w-10 h-10 rounded-lg bg-primary text-white font-bold text-sm shadow-lg shadow-primary/30">1</button>
            <button class="w-10 h-10 rounded-lg border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 font-medium text-sm transition-colors">2</button>
            <button class="w-10 h-10 rounded-lg border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 font-medium text-sm transition-colors">3</button>
            <span class="text-slate-400 px-1">...</span>
            <button class="w-10 h-10 rounded-lg border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 font-medium text-sm transition-colors">8</button>
            <button class="p-2 rounded-lg border border-gray-200 dark:border-slate-700 text-slate-500 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                <span class="material-icons-round text-lg">chevron_right</span>
            </button>
        </nav>
    </div>
</main>
@endsection

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
</style>
@endpush