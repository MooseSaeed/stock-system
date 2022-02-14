<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">

                    {{-- User Side --}}

                    <x-order-form :products="$products" />

                    {{-- Ingredients --}}

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                Store Side</div>
                        </div>

                        <div class="ml-12">
                            <h2 class="font-bold text-black">Ingredients</h1>
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                        <div class="inline-block min-w-full align-middle">
                                            <div class="overflow-hidden ">
                                                <table
                                                    class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                                        <tr>
                                                            <th scope="col"
                                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                                Ingredient Name
                                                            </th>
                                                            <th scope="col"
                                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                                Qty in Stock
                                                            </th>
                                                            <th scope="col" class="p-4">
                                                                <span class="sr-only">Edit</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody
                                                        class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                Beef</td>
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                                20kg</td>

                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                                <a href="#"
                                                                    class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                Cheese</td>
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                                5kg</td>

                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                                <a href="#"
                                                                    class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                Onion</td>
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                                1kg</td>

                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                                <a href="#"
                                                                    class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    {{-- Orders --}}

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
                                                <table
                                                    class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
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
                                                    <tbody
                                                        class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                20</td>
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                Burger</td>
                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                                1</td>

                                                            <td
                                                                class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                                <a href="#"
                                                                    class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
