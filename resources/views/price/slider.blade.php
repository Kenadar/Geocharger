<body> 
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/slider.css') }}">
    
    <img id="uah"  @if($userCountry == 'Ukraine') @endif style="display:block" src="{{ asset('assets/currency-uah-circle.png') }}" >  
    <img id="euro" style="display:none" src="{{ asset('assets/currency-euro-circle.png') }}" >  

    <div class="slidecontainer">
      <input type="range" min="1" max="100" value="1" class="slider" id="myRange">
      <p id="value" class="text-gray-500">Value: <span id="demo"></span></p>
    </div>

<script src="{{ Vite::asset('resources/js/calculator.js') }}"></script>
</body>
</html> 



