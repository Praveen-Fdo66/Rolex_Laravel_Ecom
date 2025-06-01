@include('layouts.navigation')


@section('title', 'Rolex')



<div class="header my-3 h-12 px-10 flex items-center justify-between mt-14">
    <h1 class="font-bold text-2xl">All Categories</h1>
</div>
<div class="flex flex-col mx-3 mt-6 lg:flex-row">
    <div class="w-full lg:w-1/3 m-1">
        <form class="w-full bg-white shadow-md p-6" action="{{ route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2"
                        htmlFor="category_name">Product Name</label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                        type="text" name="name" placeholder="Rolex GMT-II" required />
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2"
                        htmlFor="category_name">Price</label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                        type="number" name="price" placeholder="Price" required />
                </div>

                <div class="w-full md:w-full px-3 mb-6">
                    <button
                        class="appearance-none block w-full bg-green-700 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-600 focus:outline-none focus:bg-white focus:border-gray-500">Add
                        Product</button>
                </div>

                <div class="w-full px-3 mb-8">
                    <label
                        class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center"
                        htmlFor="dropzone-file">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>

                        <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Product image</h2>

                        <p class="mt-2 text-gray-500 tracking-wide">Upload or drag & drop your file SVG, PNG, JPG or
                            GIF. </p>

                        <input id="dropzone-file" type="file" class="hidden" name="image"
                            accept="image/png, image/jpeg, image/webp" />
                    </label>
                </div>

            </div>
        </form>
    </div>
    <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200">
        
        <div class="overflow-x-auto rounded-lg p-3">
            <table class="table-auto w-full">
                <thead class="text-sm font-semibold uppercase text-gray-800 bg-gray-50">
                    <tr>
                        <th>#</th>
                        <th class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5 mx-auto">
                                <path
                                    d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zm-4.5 7a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 8.5 11zm.5 5 1.597 1.363L13 13l4 6H7l2-3z">
                                </path>
                            </svg>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold">Category</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-left">Price</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Action</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr class="border-b">
                            <td class="p-2 text-center font-semibold text-xs">{{ $index + 1 }}</td>
                            <td class="p-2">
                                <img src="{{ $product->image }}" class="w-8 mx-auto rounded"
                                    alt="Product Image">
                            </td>
                            <td class="p-2 block uppercase tracking-wide text-gray-700 text-sm font-bold mt-4">
                                {{ $product->name }}</td>
                            <td class="p-2 uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">Rs.
                                {{ number_format($product->price, 2) }}</td>
                            <td class="p-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('products.edit', $product->_id) }}"
                                        class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center text-sm font-bold uppercase">
                                        <span>
                                            <FaEdit class="w-4 h-4 mr-1" />
                                        </span> Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->_id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded-md hover:bg-red-100 text-red-600 p-2 mt-[14px] flex justify-between items-center text-sm font-bold uppercase">
                                            <span>
                                                <FaTrash class="w-4 h-4 mr-1" />
                                            </span> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-4">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

</div>
 @include("layouts.footerNav")