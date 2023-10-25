var marker;

function initMap() {
    console.log('Maps JavaScript API loaded.');

    const advancedMarkers = document.querySelectorAll("#geodataMap gmp-advanced-marker");
    for (const advancedMarker of advancedMarkers) {
        customElements.whenDefined(advancedMarker.localName).then(async() => {
            advancedMarker.addEventListener('gmp-click', async() => {
                const { InfoWindow } = await google.maps.importLibrary("maps");
                const infoWindow = new InfoWindow({
                    content: advancedMarker.title
                });
                infoWindow.open({
                    anchor: advancedMarker
                });
                console.log(advancedMarker.title, advancedMarker.position);
            });
        });
    }
}



// if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(function(position) {
//         var location = {
//             lat: position.coords.latitude,
//             lng: position.coords.longitude
//         };
//     });
// }