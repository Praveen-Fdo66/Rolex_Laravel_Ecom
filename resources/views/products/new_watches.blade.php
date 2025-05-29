@include("layouts.mainNavigation")


@section("title", "Rolex")


<!-- Section 1 -->

<d class="w-full">
    <div class="relative">
        <img src="./images/Group 24.png" alt="Rolex Watch" class="h-[700px] w-screen object-cover relative">
    </div>

</div>


 <!-- description section -->

<section class="bg-white text-black py-16 px-8 mb-[40px] ">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-[40px] items-center">
        <!-- Text and Button Section -->
        <div class="text-center md:text-center lg:text-left">
            <p class="text-6xl font-gothic">With its latest creations,<br>
            Rolex brings a fresh new <br>
            look to some of its most <br>
            iconic modles</p>

        </div>

        <!-- paragraph Section -->
        <div class="flex justify-center mr-[20px] text-center md:text-center lg:text-left py-16 ">
            <p class="text-md font-medium">Offering unique harmonies of materials, colours and <br>
               extures, the 2024 watches illustrate our desire to <br>
               constantly reawaken watchmaking emotions, while <br>
               demonstrating uncompromising quality down to the <br>
               smallest detail. Thanks to our in-house mastery of <br>
               watchmaking expertise, the new watches play with <br>
               contrasts to achieve a harmonious balance of <br>
               functionality and aesthetics, performance and <br>
               preciousness, tradition and innovation.</p>
        </div>
    </div>
</section>


@livewire('product-list')


 

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