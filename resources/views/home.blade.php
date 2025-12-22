@extends('layouts.app')

@section('title', 'Phu Quoc Apartment Rentals')

@section('content')
<section class="relative min-h-[90vh] flex flex-col pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Beautiful sea view through window" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzZtWeCVkfPUNzvMLQxfEmP3FzQBdYERRVtMTrY-jSx1jIDrEBpA9YhKwaAF7zJ3pdJ8fIqDLyLVfjpB6heImm6HToq8Ng8uTFJ6h8wOLE2M1H1CGb-5Y936YQctkhSiQZHlDUEMtKm_DBp7j-Mswog0o0SxvVqh3cFjbQjaupPLvR0VLLUgDxhKvWv0SL7fTXeWU4SHm-vLftMXMzmzgOWPzhk8sbHU-lxI3igxY8_0Ys7YUYFQ-PJdLl-Z1LAYQDwwCfwLc2-V7I"/>
        <div class="absolute inset-0 bg-white/20 dark:bg-black/40"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex-1 flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-6xl lg:text-[4rem] font-bold text-gray-900 dark:text-white mb-6 leading-tight tracking-tight drop-shadow-sm">
            Discover Your Perfect <span class="text-primary">Phu Quoc</span> <br class="hidden md:block"/> Apartment for Rent
        </h1>
        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-200 max-w-2xl mx-auto mb-12 font-medium drop-shadow-sm">
            Find the best long-term and short-term rentals with stunning ocean views.
        </p>
        <div class="w-full max-w-5xl bg-white dark:bg-surface-dark rounded-[2rem] shadow-float p-8 border border-gray-100 dark:border-gray-700/50 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-1 w-full">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                        <input class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all placeholder-gray-400" placeholder="Keyword" type="text"/>
                    </div>
                    <div class="flex bg-gray-100 dark:bg-gray-800 p-1.5 rounded-full w-full md:w-auto shrink-0">
                        <button class="flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold bg-primary text-white shadow-sm transition-all">All</button>
                        <button class="flex-1 md:flex-none px-8 py-2 rounded-full text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">Available</button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative group">
                        <select class="w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            <option>All Main Locations</option>
                            <option>Sunset Town</option>
                            <option>An Thoi</option>
                            <option>Duong Dong</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select class="w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            <option>All Types</option>
                            <option>Studio</option>
                            <option>1 Bedroom</option>
                            <option>2 Bedrooms</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                    <div class="relative group">
                        <select class="w-full pl-4 pr-10 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:ring-primary focus:border-primary appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                            <option>All Beds</option>
                            <option>1 Bed</option>
                            <option>2 Beds</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-2">
                    <a class="inline-flex items-center text-sm font-medium text-primary bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors" href="#">
                        <span class="material-symbols-outlined text-sm mr-2">info</span>
                        Looking for certain features?
                    </a>
                    <div class="flex items-center gap-6 w-full md:w-auto justify-end">
                        <a class="hidden md:inline-flex items-center text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined text-xl mr-1">tune</span>
                            Advance Search
                        </a>
                        <button class="w-full md:w-40 bg-primary hover:bg-secondary text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-full max-w-2xl z-20">
            <div class="bg-white dark:bg-surface-dark rounded-2xl shadow-float p-3 flex items-center gap-4 border border-gray-100 dark:border-gray-700">
                <div class="relative w-40 h-28 rounded-xl overflow-hidden shrink-0">
                    <img alt="Featured Apartment" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDms_FNhLLxe-Nloyhv-339Ogd8l-cpI83QgWbA6fsyY9WZBRMAG00Ztz4AeuMXg-3n7VYZxqEnL4O_3WWXZGB9lx_Xr2hlF5p5SiZi_CdodhaYLAxq5vNs0VPsSX_JJ7nFrR5pIiQAJbCOorF_jf6OTfvLHZDDBoTURGA4-B5EXlRbZsyCiZh3HDnes99QAOUqwv_wxONuWxP0dCuDUDRCuIXhNAEaCP4K28y1dh2kf_LVyW_2G8nWgTICpR9TspneCftKYnMmC4nv"/>
                    <div class="absolute top-2 left-2 bg-primary text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-sm">Featured</div>
                </div>
                <div class="flex-1 pr-2">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white mb-0.5 leading-snug">18th Floor Sunset Town Phu Quoc | One Bedroom</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Sea + Firework View</p>
                    <div class="flex items-center gap-4 text-xs font-medium text-gray-600 dark:text-gray-300">
                        <span class="flex items-center"><span class="material-symbols-outlined text-sm mr-1 text-primary">bed</span> 1 Bed</span>
                        <span class="flex items-center"><span class="material-symbols-outlined text-sm mr-1 text-primary">square_foot</span> 50 m²</span>
                    </div>
                </div>
                <div class="text-right pr-4 border-l border-gray-100 dark:border-gray-700 pl-4">
                    <div class="text-[10px] font-bold text-primary mb-1 uppercase tracking-wide">Available</div>
                    <div class="text-2xl font-extrabold text-gray-900 dark:text-white leading-none mb-1">$732</div>
                    <div class="text-[10px] text-gray-400 font-medium">/ Monthly</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-32 pb-20 bg-white dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center justify-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-2xl mb-6 shadow-sm">
            <span class="material-symbols-outlined text-primary text-4xl">apartment</span>
        </div>
        <p class="text-xs font-bold tracking-[0.2em] text-gray-400 dark:text-gray-500 uppercase mb-3">Your Gateway to Phu Quoc Rentals</p>
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-8">Welcome To Phu Quoc Apartment For Rent</h2>
        <div class="w-20 h-1.5 bg-primary mx-auto mb-10 rounded-full"></div>
        <div class="prose prose-lg dark:prose-invert mx-auto text-gray-600 dark:text-gray-300 leading-relaxed">
            <p class="mb-6">
                Your trusted partner for finding the perfect Phu Quoc apartment for rent long term at affordable prices! We specialize in budget-friendly Phu Quoc apartments for rent long term, offering a variety of properties from luxurious villas to cozy hotels, with options for short-term stays also available to suit your needs.
            </p>
            <p>
                Our friendly team is dedicated to enhancing your Phu Quoc experience with insider tips on the best attractions. Explore the island with ease using our affordable motorbike rental service, perfect for both extended stays in a Phu Quoc apartment for rent long term and shorter visits.
            </p>
        </div>
    </div>
</section>
<section class="py-24 bg-background-light dark:bg-background-dark transition-colors duration-300" id="apartments">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Discover Latest Apartments</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">Newest Apartments in Phu Quoc</p>
            </div>
            <a class="inline-flex items-center text-primary font-bold hover:text-secondary transition-colors group" href="#">
                View All Properties <span class="material-symbols-outlined ml-1 group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 group border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Apartment 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBi3c4a6_DCSMQ_01ARy4f04Ds5s1zG5A_u-KDrIExTuFuOcfR3b-MW7ioVwhM7p8Llg_RyJP1EbeDF47HZDrJsOmKTnre7cxrMQjS5dkeId77QQh-ehTJ8Iz_y8mqdivOqOV1x0r0oBPtGtEPxHTjO9IjE_kqXPdnoLpKj4vYZzexz4ON6ADeJIjtleXOQd9KdEs_JEhabEHN7iEyqrfA92GpxtHHzyvAFexrxJX8ThhBrMCo7Qv33IAnH-PXf_6m4Q_EOAhsFjbp-"/>
                    <div class="absolute top-4 left-4 flex gap-2">
                        <span class="bg-white/95 dark:bg-gray-900/95 text-gray-800 dark:text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm backdrop-blur-sm">Available</span>
                        <span class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Featured</span>
                        <span class="bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Trendy</span>
                    </div>
                    <div class="absolute top-4 right-4 bg-black/60 text-white text-xs font-medium px-2.5 py-1 rounded-lg flex items-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-sm mr-1">photo_camera</span> 9
                    </div>
                    <button class="absolute bottom-4 right-4 p-2.5 bg-white dark:bg-gray-800 rounded-full text-gray-400 hover:text-red-500 transition-colors shadow-lg hover:scale-110 transform duration-200">
                        <span class="material-symbols-outlined text-xl">favorite</span>
                    </button>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-tight">18th Floor Sunset Town Phu Quoc | One Bedroom Apartment | Sea + Firework View</h3>
                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-5">
                        <span class="material-symbols-outlined text-sm mr-1 text-primary">location_on</span>
                        22H9+XVH, An Thoi, Phu Quoc, Kien Giang 92000
                    </div>
                    <div class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-5 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mb-0.5">Apartment</p>
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white">$732 <span class="text-xs font-medium text-gray-500">/ Monthly</span></p>
                        </div>
                        <div class="flex gap-4">
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">bed</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">1</p>
                            </div>
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">square_foot</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">50 m²</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-4 font-medium">Added: June 13, 2022</p>
                </div>
            </div>
            <div class="bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 group border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Apartment 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQ2cwt6p-HFtL58uQwx6BXv5bwDp6vZ6Cscnuc84Trt64rYdLRXXaqMYavaCjnKcfHdTOiPbJQPxmm824eBvwd39tqGoorHvp-CCpbc4WI-wEZgbc2TDUFCje3yEL8IYZCOU-krX9FFSjFdpx0qFvxITPe3dx3L5B9PsL33i_0wYqZEhH5Qfmp63A91fCpBTpmLwgjSC36JwQ2StQTFtwmTjH_pcW6eXmvFHvIbuv60eKNBnIFKDCGCjV_q6Rvh9nQkfpPpcB__YzO"/>
                    <div class="absolute top-4 left-4 flex gap-2">
                        <span class="bg-white/95 dark:bg-gray-900/95 text-gray-800 dark:text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm backdrop-blur-sm">Available</span>
                        <span class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Featured</span>
                    </div>
                    <div class="absolute top-4 right-4 bg-black/60 text-white text-xs font-medium px-2.5 py-1 rounded-lg flex items-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-sm mr-1">photo_camera</span> 5
                    </div>
                    <button class="absolute bottom-4 right-4 p-2.5 bg-white dark:bg-gray-800 rounded-full text-gray-400 hover:text-red-500 transition-colors shadow-lg hover:scale-110 transform duration-200">
                        <span class="material-symbols-outlined text-xl">favorite</span>
                    </button>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-tight">Sunset Town Phu Quoc | Studio Apartment | Sea + Firework View</h3>
                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-5">
                        <span class="material-symbols-outlined text-sm mr-1 text-primary">location_on</span>
                        22H9+XVH, An Thoi, Phu Quoc, Kien Giang 92000
                    </div>
                    <div class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-5 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mb-0.5">Apartment</p>
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white">$481 <span class="text-xs font-medium text-gray-500">/ Monthly</span></p>
                        </div>
                        <div class="flex gap-4">
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">bed</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">1</p>
                            </div>
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">square_foot</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">28 m²</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-4 font-medium">Added: May 28, 2022</p>
                </div>
            </div>
            <div class="bg-white dark:bg-surface-dark rounded-3xl shadow-card hover:shadow-float transition-all duration-300 group border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                <div class="relative h-72 overflow-hidden">
                    <img alt="Apartment 3" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjjFglknGtRJJR-Srw8oLJw60VYEBP8UOxa15onSmh4n84rwbKkbGmkKbEHZ15S0lCrIL05ELXKWeZZj7fiW7PNtTJRBXk2-7cuimRgB2IuFTxbwue2-9WF8zGT4LaptWhZ8mvVVo_wVTv-D9n8HkbzMTRZ6EwjAe7j8yPyNOUa8sjCY8oUuM_WsTQ_ufDvZyyy2pSnvPuJQngdVlWGCRgpSr1TvBAc0TpdfqD3E45EE-kQquH8FIQ0CxVpa8-6AruNlEz2dzs8nJO"/>
                    <div class="absolute top-4 left-4 flex gap-2">
                        <span class="bg-white/95 dark:bg-gray-900/95 text-gray-800 dark:text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm backdrop-blur-sm">Available</span>
                        <span class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Featured</span>
                    </div>
                    <div class="absolute top-4 right-4 bg-black/60 text-white text-xs font-medium px-2.5 py-1 rounded-lg flex items-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-sm mr-1">photo_camera</span> 12
                    </div>
                    <button class="absolute bottom-4 right-4 p-2.5 bg-white dark:bg-gray-800 rounded-full text-gray-400 hover:text-red-500 transition-colors shadow-lg hover:scale-110 transform duration-200">
                        <span class="material-symbols-outlined text-xl">favorite</span>
                    </button>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-tight">Sunset Town Phu Quoc | Three Bedroom Apartment | Sea + City View</h3>
                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-5">
                        <span class="material-symbols-outlined text-sm mr-1 text-primary">location_on</span>
                        22H9+XVH, An Thoi, Phu Quoc, Kien Giang 92000
                    </div>
                    <div class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-5 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium mb-0.5">Apartment</p>
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white">$1,080 <span class="text-xs font-medium text-gray-500">/ Monthly</span></p>
                        </div>
                        <div class="flex gap-4">
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">bed</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">3</p>
                            </div>
                            <div class="text-center">
                                <span class="material-symbols-outlined text-gray-400 text-xl mb-1">square_foot</span>
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-300">92 m²</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-4 font-medium">Added: May 28, 2022</p>
                </div>
            </div>
        </div>
        <div class="mt-16 flex justify-center items-center gap-4">
            <button class="w-10 h-10 rounded-full bg-primary text-white shadow-lg flex items-center justify-center hover:bg-secondary transition-colors"><span class="material-symbols-outlined">chevron_left</span></button>
            <div class="flex gap-2">
                <button class="w-2.5 h-2.5 rounded-full bg-primary"></button>
                <button class="w-2.5 h-2.5 rounded-full bg-gray-300 dark:bg-gray-700 hover:bg-primary transition-colors"></button>
                <button class="w-2.5 h-2.5 rounded-full bg-gray-300 dark:bg-gray-700 hover:bg-primary transition-colors"></button>
                <button class="w-2.5 h-2.5 rounded-full bg-gray-300 dark:bg-gray-700 hover:bg-primary transition-colors"></button>
            </div>
            <button class="w-10 h-10 rounded-full bg-primary text-white shadow-lg flex items-center justify-center hover:bg-secondary transition-colors"><span class="material-symbols-outlined">chevron_right</span></button>
        </div>
        <div class="mt-8 text-center">
            <button class="bg-primary hover:bg-secondary text-white font-bold py-3 px-10 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5">
                View All
            </button>
        </div>
    </div>
</section>
<section class="py-24 bg-white dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-4">Motorbike Rentals</h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg">Explore Phu Quoc island with freedom. We offer reliable scooters and motorbikes for your adventure at the best daily and monthly rates.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Scooter" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcYTgIi_nKfaR-uY-94KD3WyVh6Lm5Unlj2n1cNBi4as7FgB_iIVIW42b_Szi89oPNSHAlfyP0mZBoeJERP3Qe4ohMjwTswh3F65THkBrepYAyAFIkwDLoGVhrQOWLIiRq-TtAulvJximSDlPulGxSqMJ13HBEY0c0yMnTVvTqtT0sMbFwZApL4lNIvsx2sPKpXxDnF0__M0YieWwveQCaYLPsrnvLNIjPoQ0mtDX4SYqCIyEFa9ze02WyARHbIGUXNznHEtTR7A-g"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Honda Vision</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Automatic • 110cc</p>
                <div class="text-primary font-extrabold text-lg">$5 / Day</div>
            </div>
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Airblade" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCIijwAXZ8vUBq1sUbsVaLmr5jX11i0r1XF6jZnTriFlo4TIGLomg0kdHYn5GmFoXtnwrTR0-zRMkT1lpslSeQlCP82G918VPcbLKvM2oh57a-Tapkfn06I2pQOsqknWNrq2BZbqN-tOWxhMqXYL5oxbOaL2qqpd-XR0YUjgz14SArdl8rXcbOHoAsX96VkMtiw6QvSEcC9sp4JGXIzcAMNb5qH5YFdvxlFbfHts_EyP1qGrN0D9dDAGBmljButQfWizJoMh43tHnm3"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Honda Airblade</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Automatic • 125cc</p>
                <div class="text-primary font-extrabold text-lg">$7 / Day</div>
            </div>
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Manual Bike" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZYYVrv3lzj44n58I9VkdYW8hyW18x9MRQn6nwPHhxY5SY00NIjfmqkrBvYd47o9UBvU_upoj1Vvm5T3P9fC2_OX0-TKtIA8VbAXKPXy7uWMMpnB4eIlxl2Pzky0yP3Ztj7tLVeyhURTafvb4xrWcm7A3a_eI-x-MVnSzPC2gD7GvQrz5Ts3hRR_Srp95k2LdlUtzUCHtaak7jdun26l4MEzIEuK1gj2oD2OhJ4Fm0xhrGS-Jj3LMMZi7oOlzwrrI2EeuYcwL_rhmJ"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Yamaha Exciter</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Manual • 150cc</p>
                <div class="text-primary font-extrabold text-lg">$9 / Day</div>
            </div>
            <div class="bg-gray-50 dark:bg-surface-dark rounded-2xl p-6 text-center border border-transparent hover:border-gray-200 dark:hover:border-gray-700 hover:shadow-xl transition-all duration-300 group">
                <div class="mb-6 rounded-xl overflow-hidden bg-white dark:bg-gray-900 aspect-[4/3] flex items-center justify-center">
                    <img alt="Large Scooter" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJnY6OGiy-pnK4NJUCmakhzO-xifPG1ZCTmweOeLlxywkgnLJXQKA-aU1uRsbOy0C8zlYAo8nGGEIoJngIerX6zAVXcrY7KKJSFswx_wLjK4HUgXFz41TzU_xM9ft51PSpeLb33Ihx-hvBHJIFTUioqEDxg0srY64AfvzCR-994vbH17lYJ5QqLwWD25p8oZPoNjoGJVZ47LaR5_YymfZbwEVGdBSFTc80QYrfxSOy6NDRFeEDnR7r7yMs8EqsKHRpIAlFVCMzea4k"/>
                </div>
                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1">Honda PCX</h3>
                <p class="text-xs font-medium text-gray-500 mb-4 uppercase tracking-wide">Automatic • 150cc</p>
                <div class="text-primary font-extrabold text-lg">$11 / Day</div>
            </div>
        </div>
        <div class="text-center mt-10">
            <a class="text-primary font-bold hover:text-secondary underline decoration-2 underline-offset-4 transition-colors" href="#">View Rental Requirements</a>
        </div>
    </div>
</section>
<section class="py-24 bg-blue-50/50 dark:bg-gray-900 transition-colors duration-300" id="contact">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-surface-dark rounded-[2.5rem] shadow-float overflow-hidden flex flex-col md:flex-row border border-gray-100 dark:border-gray-700">
            <div class="w-full md:w-1/2 p-10 md:p-14 lg:p-16 flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">Contact Our Agent</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-10 text-lg leading-relaxed">Ready to book your stay or have questions about living in Phu Quoc? Reach out to us directly.</p>
                <div class="space-y-8">
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                                <span class="material-symbols-outlined">phone</span>
                            </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">Phone</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">+84 902-607-024</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                                <span class="material-symbols-outlined">email</span>
                            </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">Email</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">booking@pqrentals.com</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                                <span class="material-symbols-outlined">chat</span>
                            </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">Zalo / WhatsApp</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">+84 902-607-024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 bg-gray-50 dark:bg-gray-800/50 p-10 md:p-14 lg:p-16 flex flex-col justify-center border-l border-gray-100 dark:border-gray-700">
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="name">Name</label>
                        <input class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" id="name" placeholder="Your full name" type="text"/>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="email">Email</label>
                        <input class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" id="email" placeholder="your@email.com" type="email"/>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="message">Message</label>
                        <textarea class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all resize-none" id="message" placeholder="How can we help you?" rows="5"></textarea>
                    </div>
                    <button class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95" type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection