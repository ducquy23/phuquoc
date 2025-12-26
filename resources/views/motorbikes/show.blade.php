@extends('layouts.app')

@section('title', $motorbike->name . ' - Motorbike Rental | PQRentals')

@section('content')
<main class="pb-16 pt-8">
    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 mt-24">
        <nav class="flex items-center flex-wrap gap-2 text-sm" aria-label="Breadcrumb">
            <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
               href="{{ route('home') }}">
                <span class="material-icons-round text-base mr-1">home</span>
                Home
            </a>
            <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
            <a class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors no-underline"
               href="{{ route('motorbikes.index') }}">Motorbikes</a>
            <span class="material-icons-round text-xs text-gray-400">chevron_right</span>
            <span class="text-gray-900 dark:text-white font-medium">{{ $motorbike->name }}</span>
        </nav>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mt-8">
                <div class="order-2 md:order-1">
                    <div class="flex items-center gap-3 mb-2">
                        @if($motorbike->is_featured)
                            <span class="bg-primary/10 text-primary text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Featured</span>
                        @endif
                        @if($motorbike->status === 'available')
                            <span class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Available</span>
                        @elseif($motorbike->status === 'maintenance')
                            <span class="bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Maintenance</span>
                        @else
                            <span class="bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wide">Unavailable</span>
                        @endif
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white leading-tight">{{ $motorbike->name }}</h1>
                    <div class="flex items-center gap-4 mt-4 text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-primary text-lg">settings</span>
                            <span class="text-sm font-medium">{{ $motorbike->type_display }}</span>
                        </div>
                        @if($motorbike->engine_size)
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-primary text-lg">speed</span>
                            <span class="text-sm font-medium">{{ $motorbike->engine_size }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="order-1 md:order-2 text-left md:text-right">
                    <div class="flex items-baseline md:justify-end gap-1">
                        <span class="text-3xl font-bold text-primary">{{ $motorbike->formatted_price_daily }}</span>
                        <span class="text-gray-500 dark:text-gray-400 font-medium">/ Day</span>
                    </div>
                    @if($motorbike->price_monthly)
                    <div class="flex items-baseline md:justify-end gap-1 mt-2">
                        <span class="text-xl font-bold text-gray-700 dark:text-gray-300">{{ $motorbike->formatted_price_monthly }}</span>
                        <span class="text-gray-500 dark:text-gray-400 font-medium text-sm">/ Month</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Image Gallery -->
        <div class="mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg">
                <div class="aspect-[16/10] bg-gray-100 dark:bg-gray-900 flex items-center justify-center">
                    <img src="{{ $motorbike->featured_image_url }}"
                         alt="{{ $motorbike->name }}"
                         class="w-full h-full object-contain p-8"
                         onerror="this.src='{{ asset('assets/images/Image-not-found.png') }}'"
                    />
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Description -->
                @if($motorbike->description)
                <div class="bg-white dark:bg-card-dark rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Description</h2>
                    <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                        <p>{{ $motorbike->description }}</p>
                    </div>
                </div>
                @endif

                <!-- Specifications -->
                <div class="bg-white dark:bg-card-dark rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Specifications</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <span class="material-symbols-outlined text-primary text-2xl">settings</span>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Transmission</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $motorbike->type_display }}</p>
                            </div>
                        </div>
                        @if($motorbike->engine_size)
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <span class="material-symbols-outlined text-primary text-2xl">speed</span>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Engine Size</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $motorbike->engine_size }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <span class="material-symbols-outlined text-primary text-2xl">attach_money</span>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Daily Rate</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $motorbike->formatted_price_daily }}</p>
                            </div>
                        </div>
                        @if($motorbike->price_monthly)
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <span class="material-symbols-outlined text-primary text-2xl">calendar_month</span>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Monthly Rate</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $motorbike->formatted_price_monthly }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Contact Card -->
                <div class="bg-white dark:bg-card-dark rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Rent This Motorbike</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Daily Rate</p>
                            <p class="text-2xl font-bold text-primary">{{ $motorbike->formatted_price_daily }}</p>
                        </div>
                        @if($motorbike->price_monthly)
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Monthly Rate</p>
                            <p class="text-xl font-bold text-gray-700 dark:text-gray-300">{{ $motorbike->formatted_price_monthly }}</p>
                        </div>
                        @endif
                        @php
                            $contactPhone = \App\Models\Option::get('contact_phone', '');
                            $contactPhoneTel = preg_replace('/[^0-9+]/', '', $contactPhone);
                        @endphp
                        <a href="tel:{{ $contactPhoneTel }}" class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined">call</span>
                            Contact Us
                        </a>
                        <a href="{{ route('contact') }}" class="w-full bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold py-3 px-6 rounded-xl transition-all flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined">mail</span>
                            Send Message
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Similar Motorbikes -->
        @if($similarMotorbikes->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Similar Motorbikes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($similarMotorbikes as $similar)
                <a href="{{ route('motorbikes.show', $similar->slug) }}" class="group bg-white dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-xl dark:shadow-none dark:hover:shadow-lg dark:hover:shadow-primary/5 border border-gray-100 dark:border-slate-700 transition-all duration-300 flex flex-col">
                    <div class="relative h-48 overflow-hidden bg-white dark:bg-gray-900">
                        <img alt="{{ $similar->name }}"
                             class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500"
                             src="{{ $similar->featured_image_url }}"
                             onerror="this.src='{{ asset('assets/images/Image-not-found.png') }}'"
                        />
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors mb-1">{{ $similar->name }}</h3>
                        <p class="text-xs font-medium text-gray-500 mb-3 uppercase tracking-wide">
                            {{ $similar->type_display }}@if($similar->engine_size) • {{ $similar->engine_size }}@endif
                        </p>
                        <div class="mt-auto">
                            <div class="text-xl font-extrabold text-slate-900 dark:text-white">{{ $similar->formatted_price_daily }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400 font-medium">/ Day</div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</main>
@endsection

