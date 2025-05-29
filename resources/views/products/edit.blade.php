@include('layouts.navigation')

@section('title', 'Rolex')

<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="w-full border px-4 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Price (LKR)</label>
            <input type="number" name="price" value="{{ $product->price }}" class="w-full border px-4 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Product Image</label>
            <input type="file" name="image" class="w-full border px-4 py-2 rounded">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 mt-3">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update Product</button>
    </form>

</div>


