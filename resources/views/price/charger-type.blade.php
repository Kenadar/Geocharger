<!DOCTYPE html>
<html lang="en">
<head>
   

</head>
<body>
 


<select name="charger" id="charger" style='width: 200px;'>

    @foreach ($charger as $type)
        <option value=" {{ $type->id }} ">{{ $type->type }}</option>
    @endforeach 
</select>

<br/>
<div id='result'></div>


</body>
</html>