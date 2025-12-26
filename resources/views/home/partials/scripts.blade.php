<script>
    // Guest Gallery Slider
    (function () {
        const track = document.getElementById('guest-gallery-track');
        const prevBtn = document.getElementById('guest-gallery-prev');
        const nextBtn = document.getElementById('guest-gallery-next');
        const dots = document.querySelectorAll('.guest-gallery-dot');

        if (!track || !prevBtn || !nextBtn) return;

        const slides = track.querySelectorAll('div');
        const totalSlides = slides.length;
        let currentIndex = 0;

        // Get slide width based on screen size
        function getSlideWidth() {
            const trackWidth = track.offsetWidth;
            if (window.innerWidth >= 1024) {
                // lg: 32% + gap
                return (trackWidth / 3) + 16; // 32% + gap
            } else if (window.innerWidth >= 768) {
                // md: 48% + gap
                return (trackWidth / 2) + 16; // 48% + gap
            } else {
                // mobile: 100%
                return trackWidth;
            }
        }

        function updateSlider() {
            const slideWidth = getSlideWidth();
            const translateX = -currentIndex * slideWidth;
            track.style.transform = `translateX(${translateX}px)`;

            // Update dots
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.remove('bg-gray-300', 'dark:bg-gray-600');
                    dot.classList.add('bg-primary');
                    dot.classList.add('w-8'); // Make active dot wider
                } else {
                    dot.classList.remove('bg-primary', 'w-8');
                    dot.classList.add('bg-gray-300', 'dark:bg-gray-600');
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateSlider();
        }

        // Event listeners
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => goToSlide(index));
        });

        // Auto-play (optional - uncomment if needed)
        // let autoPlayInterval = setInterval(nextSlide, 5000);
        // track.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        // track.addEventListener('mouseleave', () => {
        //     autoPlayInterval = setInterval(nextSlide, 5000);
        // });

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateSlider, 250);
        });

        // Initialize
        updateSlider();
    })();

    // Toast Notification Function
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toast-container');
        if (!toastContainer) return;

        const toast = document.createElement('div');
        toast.className = `toast ${type} flex items-center gap-3 p-4 rounded-xl shadow-lg`;
        toast.innerHTML = `
            <span class="material-symbols-outlined">${type === 'success' ? 'check_circle' : 'error'}</span>
            <span class="flex-1 font-medium">${message}</span>
            <button onclick="this.parentElement.remove()" class="text-white/80 hover:text-white">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        `;

        toastContainer.appendChild(toast);

        // Trigger animation
        setTimeout(() => {
            toast.classList.add('show');
        }, 10);

        // Auto remove after 5 seconds
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 5000);
    }

    // Status Filter Buttons (All/Available)
    (function() {
        const statusFilterButtons = document.querySelectorAll('.status-filter-btn');
        const statusHiddenInput = document.getElementById('hero-status-filter');
        
        if (statusFilterButtons.length > 0) {
            statusFilterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active state from all buttons
                    statusFilterButtons.forEach(btn => {
                        btn.classList.remove('bg-primary', 'text-white', 'shadow-sm');
                        btn.classList.add('text-gray-500', 'dark:text-gray-400');
                    });
                    
                    // Add active state to clicked button
                    this.classList.remove('text-gray-500', 'dark:text-gray-400');
                    this.classList.add('bg-primary', 'text-white', 'shadow-sm');
                    
                    // Update hidden input with status value
                    const status = this.getAttribute('data-status');
                    if (statusHiddenInput) {
                        statusHiddenInput.value = status;
                    }
                });
            });
        }
    })();

    // Hero Search - Advance Search Toggle
    (function() {
        const advanceSearchToggle = document.getElementById('advance-search-toggle');
        const advanceSearchSection = document.getElementById('advance-search-section');
        const advanceSearchText = document.getElementById('advance-search-text');
        
        if (advanceSearchToggle && advanceSearchSection) {
            advanceSearchToggle.addEventListener('click', function() {
                const isShown = advanceSearchSection.classList.contains('show');
                
                if (isShown) {
                    advanceSearchSection.classList.remove('show');
                    advanceSearchText.textContent = 'Advance Search';
                    advanceSearchToggle.querySelector('.material-symbols-outlined').textContent = 'tune';
                } else {
                    advanceSearchSection.classList.add('show');
                    advanceSearchText.textContent = 'Hide Advance Search';
                    advanceSearchToggle.querySelector('.material-symbols-outlined').textContent = 'tune';
                }
            });
        }

        // Price Range Slider
        const priceMin = document.getElementById('price-min');
        const priceMax = document.getElementById('price-max');
        const priceMinDisplay = document.getElementById('price-min-display');
        const priceMaxDisplay = document.getElementById('price-max-display');
        const priceRangeFill = document.getElementById('price-range-fill');
        const priceMinValue = document.getElementById('price-min-value');
        const priceMaxValue = document.getElementById('price-max-value');

        if (priceMin && priceMax && priceMinDisplay && priceMaxDisplay && priceRangeFill) {
            function updatePriceRange() {
                let min = parseInt(priceMin.value);
                let max = parseInt(priceMax.value);
                const minLimit = parseInt(priceMin.min);
                const maxLimit = parseInt(priceMax.max);
                
                // Ensure min doesn't exceed max
                if (min > max) {
                    const temp = min;
                    min = max;
                    max = temp;
                    priceMin.value = min;
                    priceMax.value = max;
                }
                
                // Ensure max doesn't go below min
                if (max < min) {
                    const temp = max;
                    max = min;
                    min = temp;
                    priceMin.value = min;
                    priceMax.value = max;
                }
                
                // Update displays with formatting
                priceMinDisplay.textContent = '$' + min.toLocaleString();
                priceMaxDisplay.textContent = '$' + max.toLocaleString();
                
                // Update hidden inputs
                if (priceMinValue) priceMinValue.value = min;
                if (priceMaxValue) priceMaxValue.value = max;
                
                // Update fill bar position - calculate based on slider container width
                const range = maxLimit - minLimit;
                if (range > 0) {
                    const minPercent = ((min - minLimit) / range) * 100;
                    const maxPercent = ((max - minLimit) / range) * 100;
                    
                    // Ensure percentages are within bounds
                    const leftPercent = Math.max(0, Math.min(100, minPercent));
                    const rightPercent = Math.max(0, Math.min(100, maxPercent));
                    const widthPercent = Math.max(0, rightPercent - leftPercent);
                    
                    priceRangeFill.style.left = leftPercent + '%';
                    priceRangeFill.style.width = widthPercent + '%';
                }
            }

            // Make both sliders interactive - enable pointer events on the inputs
            priceMin.style.pointerEvents = 'all';
            priceMax.style.pointerEvents = 'all';
            
            // Set z-index dynamically based on values
            function updateZIndex() {
                const minVal = parseInt(priceMin.value);
                const maxVal = parseInt(priceMax.value);
                
                if (minVal <= maxVal) {
                    priceMin.style.zIndex = '2';
                    priceMax.style.zIndex = '3';
                } else {
                    priceMin.style.zIndex = '3';
                    priceMax.style.zIndex = '2';
                }
            }

            priceMin.addEventListener('input', function() {
                updatePriceRange();
                updateZIndex();
            });
            
            priceMax.addEventListener('input', function() {
                updatePriceRange();
                updateZIndex();
            });
            
            // Initialize
            updatePriceRange();
            updateZIndex();
        }

        // Handle form submission - ensure price values are set
        const heroSearchForm = document.getElementById('hero-search-form');
        if (heroSearchForm) {
            heroSearchForm.addEventListener('submit', function(e) {
                // Update hidden inputs with current values before submit
                if (priceMinValue && priceMaxValue) {
                    priceMinValue.value = priceMin ? priceMin.value : '';
                    priceMaxValue.value = priceMax ? priceMax.value : '';
                }
            });
        }
    })();

    // Contact Form AJAX Submission
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = document.getElementById('contact-submit-btn');
            const submitText = document.getElementById('contact-submit-text');
            const submitLoading = document.getElementById('contact-submit-loading');
            const formData = new FormData(this);

            // Disable submit button
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            submitLoading.classList.remove('hidden');

            // Send AJAX request
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    // Check if response is ok
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        }).catch(() => {
                            throw new Error('Server error');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Show success toast
                        showToast(data.message || 'Thank you! Your message has been sent successfully.', 'success');

                        // Reset form
                        contactForm.reset();
                    } else {
                        // Show error toast with validation errors if available
                        let errorMessage = data.message || 'Something went wrong. Please try again.';

                        // If there are validation errors, show first error
                        if (data.errors && Object.keys(data.errors).length > 0) {
                            const firstError = Object.values(data.errors)[0];
                            errorMessage = Array.isArray(firstError) ? firstError[0] : firstError;
                        }

                        showToast(errorMessage, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    let errorMessage = 'An error occurred. Please try again later.';

                    // Handle validation errors
                    if (error.errors && Object.keys(error.errors).length > 0) {
                        const firstError = Object.values(error.errors)[0];
                        errorMessage = Array.isArray(firstError) ? firstError[0] : firstError;
                    } else if (error.message) {
                        errorMessage = error.message;
                    }

                    showToast(errorMessage, 'error');
                })
                .finally(() => {
                    // Re-enable submit button
                    submitBtn.disabled = false;
                    submitText.classList.remove('hidden');
                    submitLoading.classList.add('hidden');
                });
        });
    }
</script>

