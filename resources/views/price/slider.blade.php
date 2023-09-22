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



<script>

  var slider1 = document.getElementById("myRange");
  var demo = document.getElementById("value");
  demo.innerHTML = slider1.value;

  slider1.oninput = function() {
    demo.innerHTML = this.value;
  }
  slider1.addEventListener("change", function() {

    var demo = document.getElementById("value");
    
    console.log("Slider Value:", demo.innerHTML);
    });

  </script>


</body>
</html> 



