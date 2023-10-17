 <!DOCTYPE html>
<html>
<head>

<style>
  .slidecontainer {
    margin-top: 15px;
  margin-left: 60px;
  height: 50px;
  }

  img#dollar{
    position: relative;
    top: 12px;
    left: 50px;
  }


  </style>
</head>
<body> 
  <img id="dollar" src="{{ asset('assets/currency-dollar-circle.png') }}" >    

<div class="slidecontainer">
  <input type="range" min="1" max="100" value="1" class="slider" id="myRange">
  <p id="value" class="text-gray-500">Value: <span id="demo"></span></p>
</div>





<script src="{{ Vite::asset('resources/js/calculator.js') }}"></script>

</body>
</html> 



