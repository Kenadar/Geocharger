 <!DOCTYPE html>
<html>
<head>

<style>
  .slidecontainer {
    margin-top: 15px;
  margin-left: 60px;
  height: 50px;
  }

  img#uah{
    position: relative;
    top: 12px;
    left: 50px;
  }
  img#euro{
    position: relative;
    top: 12px;
    left: 50px;
  }
  </style>
</head>

<body> 

    <img id="uah"  @if($userCountry == 'Ukraine') @endif style="display:block" src="{{ asset('assets/currency-uah-circle.png') }}" >  

    <img id="euro" style="display:none" src="{{ asset('assets/currency-euro-circle.png') }}" >  

<div class="slidecontainer">
  <input type="range" min="1" max="100" value="1" class="slider" id="myRange">
  <p id="value" class="text-gray-500">Value: <span id="demo"></span></p>
</div>

<script src="{{ Vite::asset('resources/js/calculator.js') }}"></script>

</body>
</html> 



