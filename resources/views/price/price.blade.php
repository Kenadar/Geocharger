<!DOCTYPE html>
<html lang="en">
<head>
    <body>

<x-app-layout>
    <x-slot name="header">
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

                            <div class="py-12">

                            @include('price.country-dropdown-list')

                            </div>

                                <div class="left:50px">

                                    @include('price.charger-type')
            
                                </div>

                                    <div class="py-12">

                                        @include('price.slider')
                
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

/* div .price{
  padding: 2rem;
  height: 80px;
  width: 40%;
  background-color: white;
  border-top-right-radius: 15px;
  border-top-left-radius: 15px;
} */


        </style>

</x-app-layout>
</body>
</head>
</html>