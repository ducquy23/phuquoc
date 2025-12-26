@extends('layouts.app')

@section('title', 'Motorbike Rentals - PQRentals')

@push('styles')
    <style>
        .motorbike-filter-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
        }
        .motorbike-filter-select::-ms-expand {
            display: none;
        }
    </style>
@endpush

@section('content')
<div class="relative pt-32 pb-12 lg:pt-40 lg:pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Phu Quoc motorbike rental" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBS9zEx_i7sWV_cy7etH0N8N-neo42QqqZyEeHscpX9AHBiPFo5xh883AS9BjNw5Ab21qHZwWbZqKM-PHPCBSc0jxdCxhQmP5L73pvfmwnydnkyBUqsPHr2ftNLw4PpbKTBwlJCg3Y92pyDS1QKPCFiA_iNzBRVpDNJcbdP5vcTew7fzhPVQxHt4zIUuW6hRZv6EE6sa9J9TGXp7fnl_Ay47mUoRj-GT6AU-Ur9bXKl3WLjzQT1cYkNsML5r0cRSeurHAHbzNhVcvTu"/>
        <div class="absolute inset-0 bg-gradient-to-b from-white/90 via-white/40 to-white/90 dark:from-background-dark/95 dark:via-background-dark/60 dark:to-background-dark/95"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 dark:text-white mb-6 leading-tight">
            Explore Phu Quoc with <span class="text-primary">Freedom</span><br class="hidden md:block"/> Motorbike Rentals
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300 mb-10 max-w-2xl mx-auto font-medium">
            Rent reliable scooters and motorbikes for your adventure. Best daily and monthly rates available.
        </p>
        <form method="GET" action="{{ route('motorbikes.index') }}" class="bg-white dark:bg-card-dark rounded-3xl shadow-xl dark:shadow-2xl dark:shadow-black/50 p-6 max-w-5xl mx-auto border border-gray-100 dark:border-gray-700 backdrop-blur-sm">
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <div class="relative flex-grow">
                    <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input name="search" value="{{ $filters['search'] ?? '' }}" class="w-full pl-12 pr-4 py-3 bg-gray-50 dark:bg-slate-800 border-none rounded-xl text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-primary transition-all" placeholder="Search by name, engine size..." type="text"/>
                </div>
                <div class="flex bg-gray-100 dark:bg-slate-800 p-1 rounded-xl self-start md:self-auto">
                    <button type="button" id="status-filter-all" data-status="all" class="status-filter-btn px-6 py-2 rounded-lg {{ ($filters['status'] ?? 'all') === 'all' ? 'bg-primary text-white' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }} text-sm font-semibold shadow-sm transition-all">All</button>
                    <button type="button" id="status-filter-available" data-status="available" class="status-filter-btn px-6 py-2 rounded-lg {{ ($filters['status'] ?? 'all') === 'available' ? 'bg-primary text-white' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }} text-sm font-medium transition-all">Available</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="relative group">
                    <select name="type" class="motorbike-filter-select w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option value="all" {{ ($filters['type'] ?? 'all') === 'all' ? 'selected' : '' }}>All Types</option>
                        <option value="automatic" {{ ($filters['type'] ?? '') === 'automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="manual" {{ ($filters['type'] ?? '') === 'manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                </div>
                <div class="relative group">
                    <select name="sort" class="motorbike-filter-select w-full appearance-none pl-4 pr-10 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer">
                        <option value="sort_order" {{ ($filters['sort'] ?? 'sort_order') === 'sort_order' ? 'selected' : '' }}>Default Order</option>
                        <option value="price" {{ ($filters['sort'] ?? '') === 'price' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="name" {{ ($filters['sort'] ?? '') === 'name' ? 'selected' : '' }}>Name: A to Z</option>
                    </select>
                    <span class="material-icons-round absolute right-3 top-1/2 -translate-y-1/2 text-primary pointer-events-none group-hover:scale-110 transition-transform">expand_more</span>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-sky-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
                    <span class="material-icons-round">search</span>
                    Search
                </button>
            </div>
        </form>
    </div>
</div>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 mt-5">
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Available Motorbikes</h2>
            <p class="text-slate-500 dark:text-slate-400">Showing {{ $motorbikes->total() }} {{ Str::plural('motorbike', $motorbikes->total()) }} available</p>
        </div>
    </div>
    <div id="motorbikes-container">
        @include('motorbikes.partials.motorbikes-list', ['motorbikes' => $motorbikes])
    </div>
</main>
@endsection

@push('scripts')
<script>
    // Status Filter Buttons
    (function() {
        const statusFilterButtons = document.querySelectorAll('.status-filter-btn');
        
        if (statusFilterButtons.length > 0) {
            statusFilterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const status = this.getAttribute('data-status');
                    const url = new URL(window.location);
                    
                    if (status === 'all') {
                        url.searchParams.delete('status');
                    } else {
                        url.searchParams.set('status', status);
                    }
                    
                    window.location.href = url.toString();
                });
            });
        }
    })();
</script>
@endpush


