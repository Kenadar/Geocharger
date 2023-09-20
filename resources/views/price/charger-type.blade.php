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
        @foreach ($charger as $type)
        <option>Charger Type</option>
        <option value=" {{ $type->id }} ">{{ $type->type }}</option>
    @endforeach 

    </select>


<br/>
<div id='result'></div>

<div class="vl"></div> 

</body>
</html>