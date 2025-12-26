<footer class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 pt-20 pb-10 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-1 md:col-span-1">
                <a class="mb-6 block flex items-center" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo_phuquocapartmentsforrent-1.png') }}" alt="Logo" class="w-auto" style="height: 6rem;">
                </a>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-6">
                    The leading apartment rental platform in Phu Quoc. Finding your perfect island home has never been easier.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-6 text-lg">Explore</h4>
                <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                    <li><a class="hover:text-primary transition-colors" href="#">Home</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Apartments</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Villas</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Motorbikes</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-6 text-lg">Company</h4>
                <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                    <li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Contact</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Terms &amp; Conditions</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-6 text-lg">Newsletter</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">Subscribe for the latest updates and offers.</p>
                <div class="flex">
                    <input class="flex-1 px-4 py-3 rounded-l-xl border border-r-0 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Your email" type="email"/>
                    <button class="bg-primary text-white px-5 py-3 rounded-r-xl hover:bg-secondary text-sm font-bold transition-colors">Join</button>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-100 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-xs text-gray-400">© 2023 PQ Rentals. All rights reserved.</p>
            <div class="flex space-x-6">
                <a class="text-gray-400 hover:text-primary transition-colors" href="#"><i class="fa-brands fa-facebook text-xl"></i><span class="material-symbols-outlined text-xl">social_leaderboard</span></a>
                <a class="text-gray-400 hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">photo_camera</span></a>
            </div>
        </div>
    </div>
</footer>