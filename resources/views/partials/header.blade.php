<header class="fixed w-full top-0 z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm shadow-sm transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center">
                <a class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight flex items-center gap-1" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo_phuquocapartmentsforrent-1.png') }}" alt="Logo" class="logo-header w-auto" style="height: 8.5rem;">
                </a>
            </div>
            <nav class="hidden md:flex items-center space-x-1">
                <a class="text-primary font-semibold bg-blue-50 dark:bg-blue-900/20 px-6 py-2.5 rounded-full transition-all" href="#">Home</a>
                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-medium px-6 py-2.5 transition-colors" href="#apartments">Properties</a>
                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary font-medium px-6 py-2.5 transition-colors" href="#contact">Contact</a>
            </nav>
            <div class="hidden lg:flex items-center space-x-6">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Need Help? Call us now!</span>
                <a class="inline-flex items-center justify-center px-6 py-2.5 border border-transparent text-sm font-bold rounded-full text-white bg-primary hover:bg-secondary shadow-lg shadow-primary/25 transition-all transform hover:-translate-y-0.5" href="tel:+84902607024">
                    <span class="material-symbols-outlined text-sm mr-2 fill-current">call</span>
                    +84 902-607-024
                </a>
                <button class="p-2.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors focus:outline-none" onclick="document.documentElement.classList.toggle('dark')">
                    <span class="material-symbols-outlined text-[20px]">dark_mode</span>
                </button>
            </div>
            <div class="md:hidden flex items-center">
                <button class="text-gray-600 dark:text-gray-300 p-2">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</header>
