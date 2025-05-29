@include('layouts.mainNavigation')

@section('title', $product->name)


<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
        
        <!-- Product Image -->
        <div class="w-full">
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <img 
                    src="{{ asset('storage/' . $product->image) }}" 
                    alt="{{ $product->name }}" 
                    class="w-full h-auto object-contain aspect-square"
                >
            </div>
        </div>

        <!-- Product Details -->
        <div class="space-y-6">
            <h1 class="text-4xl font-bold text-gray-900 font-serif">
                {{ $product->name }}
            </h1>

            <!-- Common Rolex Description -->
            <p class="text-lg text-gray-600 leading-relaxed text-justify">
                Discover timeless elegance with Rolex. Each watch is a masterpiece of precision and craftsmanship, 
                built with the finest materials and engineered for durability. A Rolex is not just a timepiece—it's a legacy.
            </p>

            <div>
                <span class="text-3xl text-indigo-600 font-semibold">
                    LKR {{ number_format($product->price, 2) }}
                </span>
            </div>

            <!-- Call to Action -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
<a href="{{ route('checkout.show', $product->_id) }}" class="bg-blue-950 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-900 transition text-center">
    Buy Now
</a>

                <a href="{{ route('products.new_watches') }}" class="text-blue-950 underline text-lg hover:text-blue-800 self-center">
                    ← Back to Watches
                </a>
            </div>

            <!-- Product Includes / Specifications -->
<div class="pt-6 border-t text-gray-700 space-y-2">
    <h2 class="text-2xl font-semibold mb-4 text-gray-900">Product Specifications</h2>
    <ul class="list-disc pl-5 space-y-1 text-justify">
        <li><strong>Material:</strong> Oystersteel & 18 ct yellow gold</li>
        <li><strong>Bezel:</strong> Unidirectional rotatable 60-minute graduated with Cerachrom insert</li>
        <li><strong>Crystal:</strong> Scratch-resistant sapphire with Cyclops lens over the date</li>
        <li><strong>Water Resistance:</strong> Waterproof to 300 meters / 1000 feet</li>
        <li><strong>Movement:</strong> Perpetual, mechanical, self-winding</li>
        <li><strong>Bracelet:</strong> Oyster, flat three-piece links</li>
    </ul>
</div>


            <!-- Optional Specs Section -->
            @if(!empty($product->specs))
                <div class="pt-6 border-t text-gray-700 space-y-2">
                    @foreach($product->specs as $label => $value)
                        <p><strong>{{ ucfirst($label) }}:</strong> {{ $value }}</p>
                    @endforeach
                </div>
            @endif
        </div>
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

