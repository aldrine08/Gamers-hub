<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
            {{ ("Welcome back, " . Auth::user()->name . "!") }}
        </h2>
        
    </x-slot>

    {{-- BACKGROUND IMAGE --}}
    <div
        class="min-h-screen bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset("storage/image/bg.jpeg") }}');"
    >

        {{-- DARK OVERLAY --}}
        <div class="bg-black bg-opacity-60 min-h-screen">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ Auth::user()->name }} <br>
                            {{ Auth::user()->email }} <br>
                            {{ Auth::user()->role }} <br>
                            {{ __("You're logged in successfully! Feel free to browse our devices below") }}
                        </div>
                    </div>
                </div>
            </div>

            @if(count($devices) == 0)
                <div class="alert alert-success">
                    No Data
                </div>
            @endif

            <div class="container my-8">
                <!-- <h1 class="text-3xl font-bold text-center text-white mb-6">
                    Dashboard
                </h1>

                <p class="text-lg text-center text-gray-200 mb-8">
                    Welcome back! Explore our devices below.
                </p> -->

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($devices as $device)
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                            <img src="{{ asset('storage/devices/' . $device->image) }}"
                                 class="w-full h-48 object-cover"
                                 alt="{{ $device->name }}">

                            <div class="p-4">
                                <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                    {{ $device->name }}
                                </h5>

                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Price per day:
                                    <span class="font-bold">${{ $device->price_per_day }}</span>
                                </p>

                                <a href="{{ route('orders.form', $device->id) }}"
                                   class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                                    Order Now
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
