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
</style>

