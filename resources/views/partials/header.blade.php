@php
    $contactPhone = \App\Models\Option::get('contact_phone', '');
    $contactPhoneDisplay = $contactPhone;
    $contactPhoneTel = preg_replace('/[^0-9+]/', '', $contactPhone);
@endphp
<header class="fixed w-full top-0 z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm shadow-sm transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center">
                <a class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight flex items-center gap-1" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo_phuquocapartmentsforrent-1.png') }}" alt="Logo" class="logo-header w-auto" style="height: 8.5rem;">
                </a>
            </div>
            <nav class="hidden md:flex items-center space-x-1">
                <a class="{{ request()->routeIs('home') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-6 py-2.5 rounded-full transition-all font-medium" href="{{ route('home') }}">Home</a>
                <a class="{{ request()->routeIs('apartments.*') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-6 py-2.5 rounded-full transition-all font-medium" href="{{ route('apartments.index') }}">Apartments</a>
                <a class="{{ request()->routeIs('blog.*') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-6 py-2.5 rounded-full transition-all font-medium" href="{{ route('blog.index') }}">Blog</a>
                <a class="{{ request()->routeIs('contact') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-6 py-2.5 rounded-full transition-all font-medium" href="{{ route('contact') }}">Contact</a>
            </nav>
            <div class="hidden lg:flex items-center space-x-6">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Need Help? Call us now!</span>
                <a class="inline-flex items-center justify-center px-6 py-2.5 border border-transparent text-sm font-bold rounded-full text-white bg-primary hover:bg-secondary shadow-lg shadow-primary/25 transition-all transform hover:-translate-y-0.5" href="tel:{{ $contactPhoneTel }}">
                    <span class="material-symbols-outlined text-sm mr-2 fill-current">call</span>
                    {{ $contactPhoneDisplay }}
                </a>
                <button class="p-2.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors focus:outline-none" onclick="document.documentElement.classList.toggle('dark')">
                    <span class="material-symbols-outlined text-[20px]">dark_mode</span>
                </button>
            </div>
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-toggle" class="text-gray-600 dark:text-gray-300 p-2" onclick="toggleMobileMenu()">
                    <span id="mobile-menu-icon" class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 pt-2 border-t border-gray-200 dark:border-gray-700">
            <nav class="flex flex-col space-y-2 mt-2">
                <a class="{{ request()->routeIs('home') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-4 py-2.5 rounded-lg transition-all font-medium" href="{{ route('home') }}" onclick="closeMobileMenu()">Home</a>
                <a class="{{ request()->routeIs('apartments.*') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-4 py-2.5 rounded-lg transition-all font-medium" href="{{ route('apartments.index') }}" onclick="closeMobileMenu()">Apartments</a>
                <a class="{{ request()->routeIs('blog.*') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-4 py-2.5 rounded-lg transition-all font-medium" href="{{ route('blog.index') }}" onclick="closeMobileMenu()">Blog</a>
                <a class="{{ request()->routeIs('contact') ? 'text-primary font-semibold bg-blue-50 dark:bg-blue-900/20' : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary' }} px-4 py-2.5 rounded-lg transition-all font-medium" href="{{ route('contact') }}" onclick="closeMobileMenu()">Contact</a>
                <div class="pt-2 border-t border-gray-200 dark:border-gray-700 mt-2">
                    <a class="inline-flex items-center justify-center w-full px-4 py-2.5 border border-transparent text-sm font-bold rounded-lg text-white bg-primary hover:bg-secondary shadow-lg shadow-primary/25 transition-all" href="tel:{{ $contactPhoneTel }}">
                        <span class="material-symbols-outlined text-sm mr-2 fill-current">call</span>
                        {{ $contactPhoneDisplay }}
                    </a>
                </div>
                <div class="pt-2">
                    <button class="w-full flex items-center justify-center px-4 py-2.5 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors" onclick="document.documentElement.classList.toggle('dark')">
                        <span class="material-symbols-outlined text-lg mr-2">dark_mode</span>
                        <span class="text-sm font-medium">Toggle Dark Mode</span>
                    </button>
                </div>
            </nav>
        </div>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('mobile-menu-icon');

        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            icon.textContent = 'close';
        } else {
            menu.classList.add('hidden');
            icon.textContent = 'menu';
        }
    }

    function closeMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('mobile-menu-icon');
        menu.classList.add('hidden');
        icon.textContent = 'menu';
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobile-menu');
        const toggle = document.getElementById('mobile-menu-toggle');

        if (menu && toggle && !menu.contains(event.target) && !toggle.contains(event.target)) {
            if (!menu.classList.contains('hidden')) {
                closeMobileMenu();
            }
        }
    });
</script>
