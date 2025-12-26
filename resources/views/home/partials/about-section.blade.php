<section class="pt-32 pb-24 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-10 md:gap-14">
            <div class="flex-shrink-0">
                <div
                    class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden border-4 border-primary/20 shadow-xl bg-gray-100 dark:bg-gray-800">
                    <img src="{{ $options['agent_photo'] ?? '' }}"
                         alt="{{ $options['agent_name'] ?? 'Hai Nguyen Van' }}" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="flex-1 text-center md:text-left">
                <p class="text-sm font-semibold text-primary mb-2">{{ $options['agent_title'] ?? 'Your friendly neighborhood buddy' }}</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white flex items-center justify-center md:justify-start gap-2 mb-2">
                    {{ $options['agent_name'] ?? 'Hai Nguyen Van' }}
                    <span class="material-symbols-outlined text-primary text-2xl align-middle">verified</span>
                </h2>
                <p class="text-sm uppercase tracking-[0.25em] text-gray-400 dark:text-gray-500 mb-4">{{ $homeAboutHeading ?? 'About Me' }}</p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    {{ $homeAboutIntro ?: "As a local of Phu Quoc with over 6 years in real estate, I understand the local market and my clients' needs.
                    My experience in cities like Ho Chi Minh City has informed my perspective on investment trends and long-term living." }}
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                    {{ $homeAboutDetails ?: "I manage several rental apartments with hundreds of positive Airbnb reviews, giving me insights into what truly makes
                    guests feel at home. With my local network, I'm committed to helping you find a place that fits your lifestyle and budget." }}
                </p>
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <a href="#contact"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary hover:bg-secondary text-white font-semibold shadow-lg shadow-primary/30 transition-all">
                        <span class="material-symbols-outlined text-base mr-2">call</span>
                        Contact Hai Now
                    </a>
                    <p class="text-xs text-gray-500 dark:text-gray-400 max-w-xs">
                        Available via Zalo, WhatsApp and Email. Happy to support you in English or Vietnamese.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

