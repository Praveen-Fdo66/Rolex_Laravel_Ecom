@include('layouts.mainNavigation')


<div class="relative min-h-screen flex items-center justify-center bg-gray-100 overflow-hidden -mb-[120px]">
    <!-- Background image with blur -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm brightness-75 z-0 ">
    <img src="{{ asset('images/image 1.jpg') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover" />

    </div>

    <!-- Foreground content -->
    <div class="relative z-10 bg-white/80 backdrop-blur-md rounded-xl shadow-lg p-10 max-w-2xl text-center">
        <h1 class="text-4xl font-bold text-green-700 mb-6">Your Order Has Been Reserved</h1>
        <p class="text-xl text-gray-700 mb-4">
            Thank you for reserving <strong>{{ $productName }}</strong> with us.
        </p>
        <p class="text-lg text-gray-600">Our team will contact you shortly to confirm the details.</p>

        <a href="{{ route('home') }}" class="mt-6 inline-block bg-blue-950 text-white px-6 py-3 rounded-lg hover:bg-blue-900 transition">
            Back to Home
        </a>
    </div>
</div>

@include("layouts.footerNav")
        

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuToggle = document.getElementById('menu-toggle'); // Menu button
            const mobileNav = document.getElementById('mobile-nav'); // Mobile menu
            const navLinks = document.getElementById('nav-links'); // Navigation links
    
            if (menuToggle && (mobileNav || navLinks)) {
                // Toggle menu visibility on click
                menuToggle.addEventListener('click', () => {
                    if (mobileNav) {
                        mobileNav.classList.toggle('hidden');
                        mobileNav.classList.toggle('flex'); // Apply flex layout if showing
                    }
                    if (navLinks) {
                        navLinks.classList.toggle('hidden');
                    }
                });
    
                // Close menu when clicking outside
                document.addEventListener('click', (event) => {
                    if (!menuToggle.contains(event.target) && !(mobileNav && mobileNav.contains(event.target)) && !(navLinks && navLinks.contains(event.target))) {
                        if (mobileNav) mobileNav.classList.add('hidden');
                        if (navLinks) navLinks.classList.add('hidden');
                    }
                });
    
                // Hide mobile navigation when resizing to desktop (>= 768px)
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 768) {
                        if (mobileNav) mobileNav.classList.add('hidden');
                        if (navLinks) navLinks.classList.add('hidden');
                    }
                });
            }
        });
    </script>

    </body>