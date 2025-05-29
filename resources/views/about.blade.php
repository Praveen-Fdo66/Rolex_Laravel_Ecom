@include("layouts.mainNavigation")


@section("title", "Rolex")








<!-- Section 1 -->

<d class="w-full">
    <div class="relative">
        <img src="./images/Group 26.png" alt="Rolex Watch" class="h-[700px] w-screen object-cover relative">
    </div>

</div>


 <!-- description section -->

<section class="bg-white text-black py-16 px-8 mb-[40px] ">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-[40px] items-center">
        <!-- Text and Button Section -->
        <div class="text-center md:text-center lg:text-left">
            <p class="text-6xl font-title">An unrivalled reputation for <br> quality and expertise</p>

        </div>

        <!-- paragraph Section -->
        <div class="flex justify-center mr-[20px] text-center md:text-justify lg:text-justify py-16 ">
            <p class="text-lg font-medium"><span class="text-bold text-2xl text-justify"> Rolex is an integrated and independent Swiss watch manufacture. Headquartered in Geneva, it is recognized for its expertise and the quality of its products. </span><br> <br>

                Hans Wilsdorf, founder of the company, instilled a notion of
                perpetual excellence, leading to major watchmaking innovations, 
                such as the Oyster, the first waterproof wristwatch and the 
                Perpetual rotor self-winding mechanism. The brand designs,  
                develops and produces the majority of its watch components in-house.
                 Rolex also supports the arts and culture, sport, 
                exploration, and those who are devising solutions to preserve the  
                planet. It is a committed and responsible company whose 
                products are made to last. In its quest for excellence, Rolex 
                 strives each day to improve not only its watches but also its 
                environmental performance and its impact on society.
            </p>
        </div>
    </div>
</section>



<section class="bg-white ">
 <img src="./images/Group 27.png" alt="" class="w-full">
</section>


<section class="bg-back">
 <img src="./images/Group 28.png" alt="" class="w-full  ">
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