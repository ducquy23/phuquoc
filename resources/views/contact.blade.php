@extends('layouts.app')

@section('title', 'Contact Us - PQRentals')

@section('content')
<header class="relative bg-gradient-to-br from-blue-50 to-white dark:from-gray-900 dark:to-background-dark pt-16 pb-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 dark:opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 mt-24">
            Get in Touch with <span class="text-primary">PQRentals</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
            Whether you're looking for a long-term apartment, a holiday rental, or just need some local advice, we're here to help you find your perfect spot in Phu Quoc.
        </p>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 pb-20 relative z-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-8">
            <!-- Agent Card -->
            <div class="bg-card-light dark:bg-card-dark rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
                <div class="flex items-center gap-4 mb-6">
                    <img alt="Agent Photo" class="w-16 h-16 rounded-full object-cover border-2 border-primary" src="{{ $options['agent_photo'] }}">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $options['agent_name'] }}</h3>
                        <p class="text-primary text-sm font-medium">{{ $options['agent_title'] }}</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-6 leading-relaxed">
                    "{{ $options['agent_bio'] }}"
                </p>

                <div class="space-y-4">
                    <a class="flex items-center gap-3 text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors group" href="mailto:{{ $options['contact_email'] }}">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-icons text-xl">email</span>
                        </div>
                        <span class="font-medium">{{ $options['contact_email'] }}</span>
                    </a>
                    <a class="flex items-center gap-3 text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors group" href="tel:{{ str_replace(' ', '', $options['contact_phone']) }}">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-icons text-xl">phone</span>
                        </div>
                        <span class="font-medium">{{ $options['contact_phone'] }}</span>
                    </a>
                    <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300 group">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
                            <span class="material-icons text-xl">location_on</span>
                        </div>
                        <span class="font-medium">{{ $options['contact_location'] }}</span>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider font-semibold mb-3">Follow us</p>
                    <div class="flex gap-4">
                        @if($options['social_twitter'] && $options['social_twitter'] !== '#')
                        <a class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all" href="{{ $options['social_twitter'] }}" target="_blank" rel="noopener">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
                        </a>
                        @endif
                        @if($options['social_facebook'] && $options['social_facebook'] !== '#')
                        <a class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all" href="{{ $options['social_facebook'] }}" target="_blank" rel="noopener">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg>
                        </a>
                        @endif
                        @if($options['social_instagram'] && $options['social_instagram'] !== '#')
                        <a class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-primary hover:text-white dark:hover:bg-primary dark:hover:text-white transition-all" href="{{ $options['social_instagram'] }}" target="_blank" rel="noopener">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path></svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Office Hours -->
            <div class="bg-card-light dark:bg-card-dark rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="material-icons text-primary">schedule</span>
                    Office Hours
                </h3>
                <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-300">
                    <li class="flex justify-between">
                        <span>Monday - Friday</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $options['office_hours_weekdays'] }}</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Saturday</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $options['office_hours_saturday'] }}</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sunday</span>
                        <span class="font-medium {{ $options['office_hours_sunday'] === 'Closed' ? 'text-red-500' : 'text-gray-900 dark:text-white' }}">{{ $options['office_hours_sunday'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-card-light dark:bg-card-dark rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Send us a Message</h2>
                @if(session('success'))
                <div id="success-toast" class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg flex items-center gap-3">
                    <span class="material-icons-round text-green-600 dark:text-green-400">check_circle</span>
                    <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
                </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" id="contact-form">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="name">Your Name <span class="text-red-500">*</span></label>
                            <input class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-primary focus:border-primary px-4 py-3 @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" type="text" required/>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="email">Email Address <span class="text-red-500">*</span></label>
                            <input class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-primary focus:border-primary px-4 py-3 @error('email') border-red-500 @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" type="email" required/>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="phone">Phone Number</label>
                        <input class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-primary focus:border-primary px-4 py-3 @error('phone') border-red-500 @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+84 902-607-024" type="tel"/>
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="interest">I'm interested in...</label>
                        <select class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-primary focus:border-primary px-4 py-3" id="interest" name="interest">
                            <option value="Long-term Rental Apartment" {{ old('interest') == 'Long-term Rental Apartment' ? 'selected' : '' }}>Long-term Rental Apartment</option>
                            <option value="Short-term Holiday Stay" {{ old('interest') == 'Short-term Holiday Stay' ? 'selected' : '' }}>Short-term Holiday Stay</option>
                            <option value="Motorbike Rental" {{ old('interest') == 'Motorbike Rental' ? 'selected' : '' }}>Motorbike Rental</option>
                            <option value="General Inquiry" {{ old('interest') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2" for="message">Message <span class="text-red-500">*</span></label>
                        <textarea class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-primary focus:border-primary px-4 py-3 @error('message') border-red-500 @enderror" id="message" name="message" placeholder="Tell us what you are looking for..." rows="4" required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="w-full md:w-auto bg-primary hover:bg-secondary text-white font-bold py-3.5 px-8 rounded-lg shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2" type="submit" id="submit-btn">
                        <span id="submit-text">Send Message</span>
                        <span class="material-icons text-sm" id="submit-icon">send</span>
                    </button>
                </form>
            </div>

            <!-- Map -->
            <div class="bg-card-light dark:bg-card-dark rounded-2xl shadow-xl p-2 border border-gray-100 dark:border-gray-700 h-80 relative overflow-hidden">
                <div class="absolute inset-0 z-0">
                    <div class="map-container w-full h-full bg-gray-200 dark:bg-gray-800 rounded-xl overflow-hidden relative">
                        <iframe allowfullscreen="" class="filter grayscale-[20%] dark:invert-[90%] dark:hue-rotate-180" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31434.30606766467!2d103.99846271083984!3d10.027962499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a78c62b49eda17%3A0x806ac5813735391c!2sSunset%20Town%2C%20Phu%20Quoc!5e0!3m2!1sen!2s!4v1689241234567!5m2!1sen!2s" style="border:0;" width="100%"></iframe>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -mt-8 pointer-events-none z-10">
                            <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-xl flex items-center gap-2 border-l-4 border-primary animate-bounce">
                                <div class="text-xs font-bold text-gray-900 dark:text-white">PQRentals Office</div>
                            </div>
                            <div class="w-0 h-0 border-l-[8px] border-l-transparent border-t-[10px] border-t-white dark:border-t-gray-800 border-r-[8px] border-r-transparent mx-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<style>
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
        border-radius: 1rem;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const submitIcon = document.getElementById('submit-icon');
    const successToast = document.getElementById('success-toast');

    // Auto-hide success toast after 5 seconds
    if (successToast) {
        setTimeout(() => {
            successToast.style.transition = 'opacity 0.5s ease';
            successToast.style.opacity = '0';
            setTimeout(() => successToast.remove(), 500);
        }, 5000);
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            submitText.textContent = 'Sending...';
            submitIcon.textContent = 'hourglass_empty';
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
        });
    }
});
</script>
@if($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('contact-form').scrollIntoView({ behavior: 'smooth', block: 'center' });
});
</script>
@endif
@endpush
