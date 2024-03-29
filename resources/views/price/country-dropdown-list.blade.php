 <!DOCTYPE html>
<html lang="en">
<head>
   <!-- Select2 CSS --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
<!-- jQuery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<style>

select#underline_select {
    margin-left: 60px;
    margin-bottom: 150px;
    height: 50px;
}

img#marker {
    position: relative;
    top: 12px;
    left: 50px;
}

</style>

</head>
<body>
    <img id="marker" src="{{ asset('assets/marker-pin-02.png') }}" >   
    <select id="underline_select" class="block py-2.5 px-0  text-sm text-gray-500 bg-transparent border-0  border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">

        <option selected>Country</option>

        @foreach($prices as $price) 

            <option value="<?php echo $price->price ?>">
                {{ $price->country }}
            </option>

        @endforeach

    </select>

<br/>
<div id='result'></div>
<div class="vl"></div> 

<script>

var selectElement1 = document.getElementById("underline_select");

selectElement1.addEventListener("change", function() {
    var countryPrice = selectElement1.value;

    console.log("Country Price:", countryPrice);
});


</script>
</body>
</html>


  