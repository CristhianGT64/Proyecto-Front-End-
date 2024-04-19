// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;

async function initMap() {
  //Necesario para poner los marcadores
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
    "marker",
  );

  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 14.089889, lng:-87.213806  },
    zoom: 13,
    mapId: "DEMO_MAP_ID",
    draggable: true,
  });
  infoWindow = new google.maps.InfoWindow();

  const locationButton = document.createElement("button");

  locationButton.textContent = "Buscar Ubicacion Actual";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          // infoWindow.setPosition(pos);
          const marker = new google.maps.marker.AdvancedMarkerElement({
            map,
            position: pos, //Este es el encargado de poner los marcadores
            title: 'Uluru',
            draggable:true,
        });
          // infoWindow.setContent("Posicion Encontrada");
          // infoWindow.open(map);
          map.setCenter(pos);
          map.setZoom(18);
        //Mandar latitiid y longiyud al html
        document.getElementById('latitud').value = pos.lat;
        document.getElementById('longitud').value = pos.lng;
        document.getElementById('locationForm').submit();
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

window.initMap = initMap;