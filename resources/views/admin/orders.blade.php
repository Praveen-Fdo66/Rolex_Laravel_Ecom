@include('layouts.navigation')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-100">
            <h1 class="text-2xl font-semibold text-gray-800">Order Reservations</h1>
        </div>

        @if ($orders->count())
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Order ID</th>
                        <th class="px-6 py-3">Customer Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Address</th>
                        <th class="px-6 py-3">Product ID</th>
                        <th class="px-6 py-3">Price (LKR)</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Reserved At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($orders as $order)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $order->_id }}</td>
                        <td class="px-6 py-4">{{ $order->customer_name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $order->customer_email }}</td>
                        <td class="px-6 py-4">{{ $order->customer_phone }}</td>
                        <td class="px-6 py-4 truncate max-w-xs" title="{{ $order->customer_address }}">
                            {{ \Illuminate\Support\Str::limit($order->customer_address, 30) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $order->watch_id }}</td>
                        <td class="px-6 py-4 font-semibold text-blue-700">{{ number_format($order->price, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full font-semibold {{ $order->status === 'reserved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($order->reserved_at)->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="px-6 py-6 text-gray-500 text-center">No order reservations found.</div>
        @endif
    </div>
</div>
