<section class="py-24 bg-blue-50/50 dark:bg-gray-900 transition-colors duration-300" id="contact">
    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="bg-white dark:bg-surface-dark rounded-[2.5rem] shadow-float overflow-hidden flex flex-col md:flex-row border border-gray-100 dark:border-gray-700">
            <div class="w-full md:w-1/2 p-10 md:p-14 lg:p-16 flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">Contact Our
                    Agent</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-10 text-lg leading-relaxed">Ready to book your stay or
                    have questions about living in Phu Quoc? Reach out to us directly.</p>
                <div class="space-y-8">
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                        <span
                            class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                            <span class="material-symbols-outlined">phone</span>
                        </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">
                                Phone</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $contactInfo['phone'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                        <span
                            class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                            <span class="material-symbols-outlined">email</span>
                        </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">
                                Email</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $contactInfo['email'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-blue-50 dark:bg-gray-800 rounded-2xl transition-colors">
                        <div class="flex-shrink-0">
                        <span
                            class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 text-primary">
                            <span class="material-symbols-outlined">chat</span>
                        </span>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-0.5">
                                Zalo / WhatsApp</p>
                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $contactInfo['zalo_whatsapp'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-full md:w-1/2 bg-gray-50 dark:bg-gray-800/50 p-10 md:p-14 lg:p-16 flex flex-col justify-center border-l border-gray-100 dark:border-gray-700">
                <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="interest" value="General Inquiry">

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="name">Name
                            <span class="text-red-500">*</span></label>
                        <input
                            class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                            id="name" name="name" placeholder="Your full name" type="text" required/>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="email">Email
                            <span class="text-red-500">*</span></label>
                        <input
                            class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                            id="email" name="email" placeholder="your@email.com" type="email" required/>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="phone">Phone</label>
                        <input
                            class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                            id="phone" name="phone" placeholder="+84 ..." type="tel"/>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2" for="message">Message</label>
                        <textarea
                            class="w-full px-5 py-3.5 rounded-xl border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all resize-none"
                            id="message" name="message" placeholder="How can we help you?" rows="5"></textarea>
                    </div>

                    <button id="contact-submit-btn"
                            class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed"
                            type="submit">
                        <span id="contact-submit-text">Send Message</span>
                        <span id="contact-submit-loading" class="hidden">Sending...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

