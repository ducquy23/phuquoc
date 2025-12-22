<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Phu Quoc Apartment Rentals')</title>
    
    @hasSection('metaDescription')
        <meta name="description" content="@yield('metaDescription')">
    @endif

    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#0EA5E9", // Sky 500
                        secondary: "#0284C7", // Sky 600
                        "background-light": "#F9FAFB", // Gray 50
                        "background-dark": "#111827", // Gray 900
                        "surface-light": "#FFFFFF",
                        "surface-dark": "#1F2937", // Gray 800
                        "text-light": "#1F2937", // Gray 800
                        "text-dark": "#F3F4F6", // Gray 100
                    },
                    fontFamily: {
                        display: ["Poppins", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        'xl': "0.75rem",
                        '2xl': "1rem",
                        '3xl': "1.5rem",
                        '4xl': "2rem",
                    },
                    boxShadow: {
                        'soft': '0 20px 40px -15px rgba(0,0,0,0.05)',
                        'card': '0 4px 20px -2px rgba(0,0,0,0.05)',
                        'float': '0 25px 50px -12px rgba(0,0,0,0.15)',
                    }
                },
            },
        };
    </script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #475569;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-display antialiased transition-colors duration-300">
    
    @include('partials.header')
    
    @yield('content')
    
    @include('partials.footer')
    
    <script>
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
        }
    </script>
    
    @stack('scripts')
</body>
</html>