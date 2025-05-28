@include("layouts.mainNavigation")


@section("title", "Rolex")




    <!-- Section 1 -->
    
    <div class="w-full">
        <div class="relative">
            <img src="{{ asset('.\images\Group 23.png') }}" alt="Rolex Watch" class="h-[700px] w-screen object-cover ">
        </div>
    </div>
    

    <section class="bg-gradient-to-r from-blue-900 to-zinc-800 text-white py-16 px-4 md:px-8 mt-20 md:mt-24 mx-4 md:mx-16 lg:mx-32 rounded">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <!-- Text and Button Section -->
            <div>
                <h2 class="font-medium font-gothic mb-10 ml-[170px] tracking-wider text-4xl mr-[100px] sm:text-5xl sm:mr-[190px] md:text-6xl md:mr-[190px] lg:text-7xl text-center lg:text-left">
                    2025<br>New Watches
                </h2>
                <div class="text-center lg:text-left">
                <a href="{{ route('products.new_watches') }}">
                    <button class="bg-[#4D75B0] hover:bg-[#295392] text-white font-medium text-xl mr-[500px] sm:mr-[190px] md:text-2xl lg:text-3xl font-gothic py-3 px-6 rounded w-40 md:w-48 ml-[170px] md:mr-[190px]">
                        Continu
                    </button>
                </a>
                </div>
            </div>
    
            <!-- Image Section -->
            <div class="flex justify-center lg:justify-end">
                <img src="{{ asset('.\images\image 2.png') }}" alt="Rolex Watch" class="w-36 mr-[10px] sm:w-60 md:w-50  lg:w-48 lg:mr-[100px]">
            </div>
        </div>
    </section>
    
    

    

    

    
    
        
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