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

                                @include('price.charger-type')

                                @include('price.slider')
                                       
                                <button id="calcButton"  type="submit"><span>Calculate</span></button>

                                <p id="calcValue" class="text-gray-500">Result: <span id="demo"></span></p>
                                


                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<style>
   
    p#calcValue{
        position: relative;
        top: 15px;
        right: 45px;
        left: 20px;
    }

    div#location{
        display: flex;
        background-color: white;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        border-top-right-radius: 15px;
        height: 120px;
        width: 100%;
        /* position: relative;
        bottom: 16px;
        right: 16px; */

    } 

    .vl {
        border-left: 2px solid rgb(206, 204, 204);
        height: 50px;
        position: ;
        left: 50%;
        margin-left: 60px;
        top: 0;
    }

    button#calcButton{
    display: flex;
    background-color: #A1A8B3;
    margin-left: 60px;
    margin-top: 5px;
    width: 100px;
    height: 40px;
    position: relative;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    border-top-right-radius: 15px;
    border-top-left-radius: 15px;
    }
    #calcButton span{
    text-align: center;
    position: absolute;
    left: 15px;
    top: 7px;
    
    }
    button#calcButton:hover {
        background-color: #c2c2c2;
    }

</style>

</x-app-layout>

<script src="{{ asset('js/calculator.js') }}"></script>


</body>
</head>
</html>