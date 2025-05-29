<div class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- Search Input -->
        <div class="mb-10 max-w-md mx-auto">
<input
    type="text"
    wire:model.lazy.300ms="search"
    placeholder="Search watches by name..."
    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
/>

            

        </div>
        


<h2 class="font-manrope font-bold text-3xl text-black mb-8 text-center">New Watches 2025</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($products as $product)
        <a href="{{ route('products.show', $product->_id) }}" class="block rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all bg-white max-w-xs mx-auto">
            <div class="w-full aspect-square bg-gray-100 flex items-center justify-center">
                <img 
                    src="{{ asset('storage/' . $product->image) }}" 
                    alt="{{ $product->name }}" 
                    class="object-contain w-full h-full p-4"
                >
            </div>
            <div class="p-5">
                <h6 class="font-semibold text-xl text-gray-900 mb-1">{{ $product->name }}</h6>
                <h6 class="text-lg text-indigo-600 font-medium">LKR {{ number_format($product->price, 2) }}</h6>
            </div>
        </a>
    @empty
        <div class="col-span-3 text-center text-gray-500">No products found.</div>
    @endforelse
</div>

