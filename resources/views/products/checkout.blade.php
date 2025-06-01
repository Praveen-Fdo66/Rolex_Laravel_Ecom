@include('layouts.mainNavigation')


<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-semibold mb-8 text-gray-900 text-center">Checkout</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Product Summary -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Product Summary</h3>
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-56 h-56 object-contain rounded-xl shadow mb-4">
                <div class="text-center">
                    <h4 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h4>
                    <p class="text-indigo-600 text-xl mt-2">LKR {{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Checkout Form -->
        <form method="POST" action="{{ route('checkout.process', $product->_id) }}" class="bg-white rounded-2xl shadow p-6 space-y-6">
            @csrf

            <h3 class="text-xl font-semibold text-gray-800">Customer Information</h3>

            <div>
                <label for="name" class="block font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" id="name" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" id="email" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="phone" class="block font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="address" class="block font-medium text-gray-700 mb-1">Shipping Address</label>
                <textarea name="address" id="address" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-950 text-white py-3 rounded-lg text-lg hover:bg-blue-900 transition">
                Confirm and Reserve
            </button>
        </form>
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