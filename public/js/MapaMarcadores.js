// import { MarkerClusterer } from "https://cdn.skypack.dev/@googlemaps/markerclusterer@2.3.1";

async function initMap() {
  // Request needed libraries.
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
    "marker",
  );
  const position = { lat: 14.0857108 , lng: -87.1994419 };//Variable con posicion que usaremos

  //Nueva instancia de un mapa de google
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 3, //zoom incial de nuestra app
    center: position, //Posicion de nuestro mapa cuando inicie
    mapId: "DEMO_MAP_ID", // Lo podemos usar para modificar el disenio de nuestro maapa
  });

    //Es el que nos traera globos de texto para nuestro codigo
  const infoWindow = new google.maps.InfoWindow({
    content: "",
    disableAutoPan: true,
  });
  // Crea un arreglo de caracteres alfabéticos utilizados para etiquetar los marcadores
//   const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  // Añade algunos marcadores al mapa No se usan
    const markers = locations.map((posiciones) => {

        //Imagen para indicadores de conductores -----

        const beachFlagImg = document.createElement("img"); //creamos una imagen en el html
        // const beachFlagImg.src = "/imagenes/logoRepartidor.jpg";
        beachFlagImg.src = "/imagenes/cascoLogo.png"; //decimos a que es igual esa imagen
        beachFlagImg.width = 18; // Ancho de la imagen en píxeles
        beachFlagImg.height = 18; // Alto de la imagen en píxeles

        ///Termina imagenes para conductor

    // const label = labels[i % labels.length]; No se usan
    /* Este de aqui es clave para poner varios marcadores */
    //Cuando se instancia cada funcion del mapa se debe de poner
    // su paramentro, funcionan tipo clave valor
    //Este es para mapear los marcadores, es decir, hacer los dibujos de los marcadores
    const marker = new google.maps.marker.AdvancedMarkerElement({
        map,
        position: posiciones, //Este es el encargado de poner los marcadores
        title: 'Uluru',
        content: beachFlagImg, // le decimos que los nuevos inconos seran la imagen que importamos
    });
  
    // abre la ventana de información cuando se hace clic en el marcador
    marker.addListener("click", () => {
      infoWindow.setContent(posiciones.lat + ", " + posiciones.lng); //Este sera modificado para despues poner los nombres de los negocios
      infoWindow.open(map, marker); //Abre el globo de texto
      map.setCenter(posiciones);
      map.setZoom(18);
    });
    return marker;
  });
  
  // “Añade un agrupador de marcadores para administrar los marcadores
  new MarkerClusterer({ markers, map });

}

const locations = [
  { lat: 14.0857108 , lng: -87.1994419 },
  { lat: -33.718234, lng: 150.363181 },
  { lat: -33.727111, lng: 150.371124 },
  { lat: -33.848588, lng: 151.209834 },
  { lat: -33.851702, lng: 151.216968 },
  { lat: -34.671264, lng: 150.863657 },
  { lat: -35.304724, lng: 148.662905 },
  { lat: -36.817685, lng: 175.699196 },
  { lat: -36.828611, lng: 175.790222 },
  { lat: -37.75, lng: 145.116667 },
  { lat: -37.759859, lng: 145.128708 },
  { lat: -37.765015, lng: 145.133858 },
  { lat: -37.770104, lng: 145.143299 },
  { lat: -37.7737, lng: 145.145187 },
  { lat: -37.774785, lng: 145.137978 },
  { lat: -37.819616, lng: 144.968119 },
  { lat: -38.330766, lng: 144.695692 },
  { lat: -39.927193, lng: 175.053218 },
  { lat: -41.330162, lng: 174.865694 },
  { lat: -42.734358, lng: 147.439506 },
  { lat: -42.734358, lng: 147.501315 },
  { lat: -42.735258, lng: 147.438 },
  { lat: -43.999792, lng: 170.463352 },
];

initMap(); //Llamado a la funcion
