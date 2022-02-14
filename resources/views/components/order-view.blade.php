@props(['orders'])

<div class="col-span-2 p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
            Store Side</div>
    </div>

    <div class="ml-12">
        <h2 class="font-bold text-black">Orders</h1>
            <div class="flex flex-col">
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Order ID
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Product Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Qty Ordered
                                        </th>
                                        <th scope="col" class="p-4">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($orders as $order)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->id }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->product->name }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                {{ $order->qty }}
                                            </td>

                                            <td class="py-4 px-6 font-medium text-right whitespace-nowrap">
                                                <form method="POST" action="/orders/{{ $order->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="text-red-500 text-bold hover:underline">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
