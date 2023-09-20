 <!DOCTYPE html>
<html>
<head>

</head>
<body>

<div class="slidecontainer">
  <input type="range" min="5" max="50" value="5" class="slider" id="myRange">
  <p>Value: <span id="demo"></span></p>
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



