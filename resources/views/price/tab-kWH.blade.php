<body>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/tab-kWH.css') }}">
    <div id="line" class="text-sm font-medium text-center text-gray-500  border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul id="ulTab" class=" flex flex-wrap -mb-px">
            <button id ="kwTab" class="highlight inline-block p-4 ">kWT</button>
            <button id='hourTab' class="highlight inline-block p-4 ">Hour</button>
        </ul>
    </div>
<script src="{{ Vite::asset('resources/js/calculator.js') }}"></script>
</body>
