<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/country-dropdown.css') }}">

    <img id="marker" src="{{ asset('assets/marker-pin-02.png') }}" >   
    <select id="country_dropdown" 
            class="block py-2.5 px-0  text-sm text-gray-500 bg-transparent border-0  border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
        @foreach($prices as $price) 
            <option value="{{ $price->price }}" @if ($price->country == $userCountry) selected @endif>
                {{ $price->country }}
            </option>
        @endforeach
    </select>

    <div id='result'></div>
    <div class="verticalLine"></div> 

<script src="{{ Vite::asset('resources/js/calculator.js') }}"></script>
</body>
</html>


  