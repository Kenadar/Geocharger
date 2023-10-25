<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/price.css') }}">

    <x-slot name="header"  style="">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Price') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're on page with electricity prices!") }}
                        <div id= "price" class='p-8'>                   
                            @include('price.tab-kWH')
                        </div>
                            <div id="location" class="py-12">
                                @include('price.country-dropdown-list')
                                @include('price.charger-type')
                                @include('price.slider')    

                                <button id="calcButton"  type="submit"><span>Calculate</span></button>

                                <div id="resultContainer" style="display: none;">
                                    <input id="resultInput" type="text" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
<script src="{{ Vite::asset('resources/js/calculator.js') }}"></script>


