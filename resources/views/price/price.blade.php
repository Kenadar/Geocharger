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

    
                            <div id="location" class="py-12">

                            @include('price.country-dropdown-list')

                            {{-- {{ $countryData }} --}}

                                    @include('price.charger-type')


                                   
                                        @include('price.slider')
                                       

                                    
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>

div#location{
    display: flex;
    background-color: white;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    border-top-right-radius: 15px;
    height: 120px;
    width: 80%;
} 

.vl {
  border-left: 2px solid rgb(206, 204, 204);
  height: 50px;
  position: ;
  left: 50%;
  margin-left: 60px;
    top: 0;
}
#slider {

}

  </style>

</x-app-layout>
</body>
</head>
</html>