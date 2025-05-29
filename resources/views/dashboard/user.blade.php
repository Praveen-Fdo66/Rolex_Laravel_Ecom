<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">Welcome, {{ $user->name }}</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Your Reservations</h2>
                    <p class="text-4xl font-bold text-blue-700">{{ $reservations->count() }}</p>
                </div>
            </div>

            <div class="mt-10">
                <h2 class="text-2xl font-semibold mb-4">Recent Orders</h2>
                <ul>
                    @forelse ($reservations as $order)
<li class="bg-white p-4 mb-2 rounded shadow text-sm">
    Reserved <strong>{{ $order->product->name ?? 'Unknown Product' }}</strong>
    on {{ \Carbon\Carbon::parse($order->reserved_at)->format('M d, Y') }} –
    <br>
    Status: <span class="text-blue-700 font-medium">{{ ucfirst($order->status) }}</span>
</li>

                    @empty
                        <li>No orders yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

