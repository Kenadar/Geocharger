 <!DOCTYPE html>
<html>
<head>
<style>
  .slidecontainer {
    margin-top: 15px;
  margin-left: 60px;
  height: 50px;
  }

/* p#value{
  color: black;
} */

  </style>
</head>
<body> 
  <img src="{{ asset('assets/currency-dollar-circle.png') }}" >    

<div class="slidecontainer">
  <input type="range" min="5" max="50" value="5" class="slider" id="myRange">
  <p id="value" class="text-gray-500">Value: <span id="demo"></span></p>
</div>



<script>
var slider1 = document.getElementById("myRange");
var demo = document.getElementById("demo");
demo.innerHTML = slider1.value;

slider1.oninput = function() {
  demo.innerHTML = this.value;
}
</script>


</body>
</html> 



