@section("title", "Dashboard")



<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-blue-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-blue-950 mb-8">Dashboard Overview</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Products -->
                <a href="{{ route('products.create') }}">
                <div class="bg-white rounded-3xl shadow-xl p-6 border border-blue-200  hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Products</p>
                            <h2 class="text-3xl font-bold text-blue-900 mt-1">{{ $productsCount }}</h2>
                        </div>
                        <div class="bg-blue-100 text-blue-600 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3h18v4H3zM3 7l9 6 9-6M3 7v14h18V7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                </a>

                <!-- Registered Users -->
                <a href="{{ route('admin.registeredUsers.index') }}">
                <div class="bg-white rounded-3xl shadow-xl p-6 border border-blue-200  hover:bg-blue-50 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Registered Users</p>
                            <h2 class="text-3xl font-bold text-blue-900 mt-1">{{ $usersCount }}</h2>
                        </div>
                        <div class="bg-green-100 text-green-600 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6m-3-4a4 4 0 01-4-4V9a4 4 0 118 0v3a4 4 0 01-4 4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                </a>
                <!-- Order Reservations -->
                
<a href="{{ route('admin.orders.index') }}">
    <div class="bg-white rounded-3xl shadow-xl p-6 border border-blue-200 hover:bg-blue-50 transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Order Reservations</p>
                <h2 class="text-3xl font-bold text-blue-900 mt-1">{{ $ordersCount }}</h2>
            </div>
            <div class="bg-yellow-100 text-yellow-600 rounded-full p-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 17v-2a4 4 0 018 0v2M9 10h.01M15 10h.01M12 12a1 1 0 100-2 1 1 0 000 2z"></path>
                </svg>
            </div>
        </div>

        
    </div>
</a>


            </div>
        </div>
    </div>
</x-app-layout>

