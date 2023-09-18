<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Select2 CSS --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
<!-- jQuery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</head>
<body>
    <!-- Dropdown --> 
    <label>Location:</label>
<select id='address' style='width: 200px;' name='geodata_id'>
    @foreach($prices as $price) 
    <option>
        {{ $price->country }}
    </option>
  @endforeach
</select>

<br/>
<div id='result'></div>

<script>
    $(document).ready(function(){
 
 // Initialize select2
 $("#address").select2();

 // Read selected option
 $('#but_read').click(function(){
     var username = $('#address option:selected').text();
     var userid = $('#address').val();
console.log(username)
     $('#result').html("id : " + name + ", name : " + address);

 });
});
</script>
</body>
</html>