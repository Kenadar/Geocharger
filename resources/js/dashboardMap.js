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

                const responseAbout = await fetch("/dashboard/geo/info");
                const geo = await responseAbout.json();
                console.log(geo);

                const aboutGeo = document.getElementById("aboutGeo");
                aboutGeo.innerHTML = "";

                geo.forEach(item => {
                    const itemElement = document.createElement("div");
                    itemElement.textContent = ` Опис Точки: ${item.aboutGeo}`;
                    aboutGeo.appendChild(itemElement);
                });

                const responseDaypart = await fetch("/dashboard/geo/dayparting");
                const daypart = await responseDaypart.json();
                console.log(daypart);

                const geoDayparting = document.getElementById("geoDayparting");
                geoDayparting.innerHTML = "";

                daypart.forEach(item => {
                    const itemElement2 = document.createElement("div");
                    itemElement2.textContent = ` Час для бронювання: ${item.geoDayparting}`;
                    geoDayparting.appendChild(itemElement2);
                });
            });
        });
    }
}