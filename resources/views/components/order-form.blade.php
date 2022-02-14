@props(['products'])

<div class="p-6 border-t border-gray-200 dark:border-gray-700">
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">
            <p class="text-gray-900 dark:text-white font-bold">
                User Side
            </p>
        </div>
    </div>

    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

            <form method="POST" action="/neworder">
                @csrf
                <div class="mt-3 border border-gray-300 p-6 rounded-xl">
                    <label for="product_id" class="font-bold text-black">Product:</label>
                    <select class="ml-1 ring rounded-lg focus:outline-none" name="product_id" id="product_id" required>
                        @foreach ($products as $product)
                            <option value="1">{{ ucwords($product->name) }}</option>
                        @endforeach
                    </select>

                    @error('product_id')
                        <p class="text-xs font-bold text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mt-3 border border-gray-300 p-6 rounded-xl">
                    <label for="qty" class="font-bold text-black">Quantity: </label>
                    <input placeholder="Insert Quantity" class=" ml-1 focus:outline-none focus:ring p-1 ring rounded-lg"
                        type="number" name="qty" id="qty" required>

                    @error('qty')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                <button
                    class="block mt-3 px-3 py-1 bg-blue-500 rounded-xl text-white font-semibold hover:bg-blue-600 transition-colors"
                    type="submit">Submit order
                </button>
            </form>

        </div>
    </div>
</div>
