<style>
    /* Hide native select arrow for custom filter dropdowns on home hero */
    .home-filter-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: none;
    }

    .home-filter-select::-ms-expand {
        display: none;
    }

    /* Toast Notification */
    #toast-container {
        pointer-events: none;
    }

    #toast-container > * {
        pointer-events: auto;
    }

    .toast {
        min-width: 300px;
        max-width: 500px;
        padding: 1rem 1.25rem;
        border-radius: 0.75rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        transform: translateX(400px);
        opacity: 0;
        transition: all 0.3s ease-in-out;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .toast.show {
        transform: translateX(0);
        opacity: 1;
    }

    .toast.success {
        background-color: #10b981;
        color: white;
    }

    .toast.error {
        background-color: #ef4444;
        color: white;
    }

    /* Price Range Slider Container */
    .price-range-container {
        position: relative;
        height: 8px;
    }

    .price-range-track {
        position: absolute;
        width: 100%;
        height: 8px;
        background: #e5e7eb;
        border-radius: 4px;
        top: 0;
        left: 0;
    }

    .dark .price-range-track {
        background: #374151;
    }

    /* Price Range Slider Styles */
    .price-range-input {
        position: absolute;
        width: 100%;
        height: 8px;
        top: 0;
        left: 0;
        margin: 0;
        padding: 0;
        background: transparent;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: none;
        pointer-events: none;
    }

    .price-range-input::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        pointer-events: all;
        position: relative;
        z-index: 3;
        margin-top: -6px;
    }

    .price-range-input::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        pointer-events: all;
        position: relative;
        z-index: 3;
    }

    .price-range-input::-webkit-slider-runnable-track {
        height: 8px;
        background: transparent;
        border: none;
    }

    .price-range-input::-moz-range-track {
        height: 8px;
        background: transparent;
        border: none;
    }

    .price-range-input::-ms-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .price-range-input::-ms-track {
        height: 8px;
        background: transparent;
        border: none;
        color: transparent;
    }

    .price-range-input::-ms-fill-lower,
    .price-range-input::-ms-fill-upper {
        background: transparent;
    }

    /* Price Range Fill Bar */
    #price-range-fill {
        position: absolute;
        height: 8px;
        background: #3b82f6;
        border-radius: 4px;
        top: 0;
        z-index: 1;
        pointer-events: none;
    }

    /* Advance Search Animation */
    #advance-search-section {
        transition: max-height 0.4s ease-in-out, opacity 0.3s ease-in-out, padding-top 0.3s ease-in-out, margin-top 0.3s ease-in-out;
    }

    #advance-search-section.show {
        max-height: 500px;
        opacity: 1;
        padding-top: 1.5rem;
        margin-top: 0.5rem;
    }

    #advance-search-section:not(.show) {
        max-height: 0;
        opacity: 0;
        padding-top: 0;
        margin-top: 0;
    }
</style>


