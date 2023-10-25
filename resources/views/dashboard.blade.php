<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="height: 550px">
                    {{ __("You're logged in!") }}
                  
                    <title>Simple Map</title>
                    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/googleMap.css') }}" />
                    <script async
                       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcUrSlolabDqEcWpQ82I3cCJc988Jn-74&callback=initMap&libraries=maps,marker&v=beta">
                    </script>

                    <gmp-map id="geodataMap" center="50.4501, 30.5234" zoom="10" map-id="DEMO_MAP_ID">
                        @foreach ($geodatas as $geodata)
                            <gmp-advanced-marker id="mapPoints" position="{{ $geodata->latitude }},{{ $geodata->longitude }}" title="{{ $geodata->name }}"></gmp-advanced-marker>
                        @endforeach
                    </gmp-map>
            
                </div>
            </div>
        </div>
    </div>
    <script src="{{ Vite::asset('resources/js/dashboardMap.js') }}"></script>
</x-app-layout>
