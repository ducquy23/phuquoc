@php
    $contactPhone = \App\Models\Option::get('contact_phone', '');
    $contactEmail = \App\Models\Option::get('contact_email', '');
    $contactZaloWhatsapp = \App\Models\Option::get('contact_zalo_whatsapp', $contactPhone);
    $contactPhoneTel = preg_replace('/[^0-9+]/', '', $contactPhone);
    $whatsappNumber = preg_replace('/[^0-9+]/', '', $contactZaloWhatsapp);
    $currentYear = date('Y');
@endphp
<footer class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 pt-20 pb-10 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-1 md:col-span-1">
                <a class="mb-6 block flex items-center" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo_phuquocapartmentsforrent-1.png') }}" alt="Logo" class="w-auto" style="height: 6rem;">
                </a>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-4 font-medium">
                    FIND YOUR SWEET HOME!
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-6">
                    The leading apartment rental platform in Phu Quoc. Finding your perfect island home has never been easier.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-6 text-lg">Explore</h4>
                <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('apartments.index') }}">Apartments</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('motorbikes.index') }}">Motorbikes</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-6 text-lg">Rentals</h4>
                <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('seo.phu-quoc-apartments-for-rent') }}">Apartments for Rent</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('seo.long-term-rentals') }}">Long-Term Rentals</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('seo.monthly-rentals') }}">Monthly Rentals</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-6 text-lg">Company</h4>
                <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                    <li><a class="hover:text-primary transition-colors" href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('search') }}">Search Properties</a></li>
                    @php
                        $aboutPage = \App\Models\Page::where('slug', 'about-us')->where('is_published', true)->first();
                        $termsPage = \App\Models\Page::where('slug', 'terms-conditions')->where('is_published', true)->first();
                        $privacyPage = \App\Models\Page::where('slug', 'privacy-policy')->where('is_published', true)->first();
                    @endphp
                    @if($aboutPage)
                    <li><a class="hover:text-primary transition-colors" href="{{ route('pages.show', $aboutPage->slug) }}">About Us</a></li>
                    @endif
                    @if($termsPage)
                    <li><a class="hover:text-primary transition-colors" href="{{ route('pages.show', $termsPage->slug) }}">Terms &amp; Conditions</a></li>
                    @endif
                    @if($privacyPage)
                    <li><a class="hover:text-primary transition-colors" href="{{ route('pages.show', $privacyPage->slug) }}">Privacy Policy</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-100 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-xs text-gray-400">© {{ $currentYear }} PQ Rentals. All rights reserved.</p>
            <div class="flex space-x-6">
                @php
                    $facebookUrl = \App\Models\Option::get('contact_social_facebook', '#');
                    $instagramUrl = \App\Models\Option::get('contact_social_instagram', '#');
                    $twitterUrl = \App\Models\Option::get('contact_social_twitter', '#');
                @endphp
                @if($facebookUrl && $facebookUrl !== '#')
                <a class="text-gray-400 hover:text-primary transition-colors" href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <span class="material-symbols-outlined text-xl">facebook</span>
                </a>
                @endif
                @if($instagramUrl && $instagramUrl !== '#')
                <a class="text-gray-400 hover:text-primary transition-colors" href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <span class="material-symbols-outlined text-xl">photo_camera</span>
                </a>
                @endif
                @if($twitterUrl && $twitterUrl !== '#')
                <a class="text-gray-400 hover:text-primary transition-colors" href="{{ $twitterUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                    <span class="material-symbols-outlined text-xl">social_leaderboard</span>
                </a>
                @endif
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scroll-to-top" class="fixed bottom-24 right-6 z-40 bg-primary hover:bg-secondary text-white rounded-full p-3 shadow-2xl hover:shadow-3xl transition-all transform hover:scale-110 opacity-0 pointer-events-none translate-y-4" aria-label="Scroll to top" onclick="scrollToTop()">
    <span class="material-symbols-outlined text-2xl">arrow_upward</span>
</button>

<!-- Floating WhatsApp Button -->
@if($contactZaloWhatsapp)
<div class="fixed bottom-6 right-6 z-50 flex items-center gap-3 group" id="whatsapp-widget">
    <!-- Chat Bubble -->
    <div class="hidden md:block bg-white dark:bg-gray-800 rounded-2xl shadow-2xl px-4 py-3 border border-gray-200 dark:border-gray-700 transform translate-x-0 opacity-100 transition-all duration-300">
        <p class="text-sm font-semibold text-gray-900 dark:text-white whitespace-nowrap">Need Help? Chat with us</p>
    </div>
    <!-- WhatsApp Icon Button -->
    <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" class="bg-[#25D366] hover:bg-[#20BA5A] text-white rounded-full p-4 shadow-2xl hover:shadow-3xl transition-all transform hover:scale-110 flex items-center justify-center relative" aria-label="Chat with us on WhatsApp">
        <!-- Pulse Animation -->
        <span class="absolute inset-0 rounded-full bg-[#25D366] animate-ping opacity-75"></span>
        <!-- WhatsApp Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 relative z-10">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>
</div>

<style>
    @keyframes pulse-ring {
        0% {
            transform: scale(0.8);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.5;
        }
        100% {
            transform: scale(1.4);
            opacity: 0;
        }
    }
    #whatsapp-widget a:hover .animate-ping {
        animation: pulse-ring 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endif

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

<script>
    // Toast Notification Function
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toast-container');
        if (!toastContainer) return;

        const toast = document.createElement('div');
        toast.className = `toast ${type} flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg max-w-md transform translate-x-full transition-all duration-300`;

        const icon = type === 'success'
            ? '<span class="material-symbols-outlined">check_circle</span>'
            : '<span class="material-symbols-outlined">error</span>';

        toast.innerHTML = `
            ${icon}
            <span class="flex-1 text-sm font-medium">${message}</span>
            <button onclick="this.parentElement.remove()" class="text-white/80 hover:text-white">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        `;

        toastContainer.appendChild(toast);

        // Trigger animation
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 10);

        // Auto remove after 5 seconds
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.remove(), 300);
        }, 5000);
    }

    // Newsletter Form Handler
    document.addEventListener('DOMContentLoaded', function() {
        const newsletterForm = document.getElementById('newsletter-form');
        const newsletterEmail = document.getElementById('newsletter-email');
        const newsletterSubmit = document.getElementById('newsletter-submit');

        if (newsletterForm) {
            newsletterForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                const email = newsletterEmail.value.trim();

                if (!email) {
                    showToast('Please enter a valid email address', 'error');
                    return;
                }

                // Disable submit button
                newsletterSubmit.disabled = true;
                newsletterSubmit.textContent = 'Subscribing...';

                try {
                    const response = await fetch('{{ route("blog.subscribe") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ email: email })
                    });

                    const data = await response.json();

                    if (data.success) {
                        showToast(data.message || 'Thank you for subscribing!', 'success');
                        newsletterEmail.value = '';
                    } else {
                        showToast(data.message || 'Something went wrong. Please try again.', 'error');
                    }
                } catch (error) {
                    console.error('Newsletter subscription error:', error);
                    showToast('Network error. Please try again later.', 'error');
                } finally {
                    // Re-enable submit button
                    newsletterSubmit.disabled = false;
                    newsletterSubmit.textContent = 'Join';
                }
            });
        }
    });

    // Scroll to Top Button
    const scrollToTopBtn = document.getElementById('scroll-to-top');

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Show/hide scroll to top button
    window.addEventListener('scroll', function() {
        if (scrollToTopBtn) {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                scrollToTopBtn.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                scrollToTopBtn.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
            }
        }
    });
</script>

<style>
    .toast {
        background-color: #10b981;
        color: white;
    }
    .toast.error {
        background-color: #ef4444;
    }
    .toast.success {
        background-color: #10b981;
    }
</style>
