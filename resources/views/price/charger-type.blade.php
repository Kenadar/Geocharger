<!DOCTYPE html>
<html lang="en">
<head>

    <style>

        select#charger {
            margin-left: 60px;
            width: 20%;
            height: 50px;
        }
        img#zap{
            position: relative;
            top: 12px;
            left: 50px;
        }
        </style>

</head>
<body> 
    <img id="zap" src="{{ asset('assets/zap.png') }}" >    

    <select id="charger" class="block py-2.5 px-0  text-sm text-gray-500 bg-transparent border-0 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
        
        <option selected>Charger Type</option>

        @foreach ($charger as $type)
             <option value="<?php echo $type->Kilowatt; ?>">
                {{ $type->Type }}
            </option>
        @endforeach 

    </select>


<br/>
<div id='result'></div>

<div class="vl"></div> 
<script>

    var selectElement = document.getElementById("charger");
    
    selectElement.addEventListener("change", function() {
        var chargerType = selectElement.value;
    
        console.log("Charger Type:", chargerType);
    });
    
    
    </script>
    
    <script src="{{ asset('js/calculator.js') }}"></script>


</body>
</html>