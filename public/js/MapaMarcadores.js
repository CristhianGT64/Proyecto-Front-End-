import {ubicacionRepartidor} from '../js/ubicacionRepartidor.js';

// console.log(repartidoreBD);//

// Función para calcular una nueva posición
//La distancia debe de recibirse como km, es decir 4,3,2,1
function CalcularPosicion(lat, lng, distancia, rumbo) {
    const R = 5000; // Radio de Teguscigalpa y comayaguela aprox en km
    const ad = distancia / R; // Convierte la distancia a un ángulo en radianes
    const lat1 = (Math.PI / 180) * lat; // Convierte la latitud a radianes
    const lng1 = (Math.PI / 180) * lng; // Convierte la longitud a radianes
    const rumb = (Math.PI / 180) * rumbo; // Convierte el rumbo a radianes
  
    const lat2 = Math.asin(Math.sin(lat1) * Math.cos(ad) + Math.cos(lat1) * Math.sin(ad) * Math.cos(rumb));
    const lng2 = lng1 + Math.atan2(Math.sin(rumb) * Math.sin(ad) * Math.cos(lat1), Math.cos(ad) - Math.sin(lat1) * Math.sin(lat2));
  
    return {
      lat: ((180 / Math.PI) * lat2), // Convierte la latitud a grados
      lng: (180 / Math.PI) * lng2, // Convierte la longitud a grados
    };
  }

    async function initMap() {
    // Librerias necesarias para el mapa, map, infoWindows y marker
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
        "marker",
    );
    const position = { lat: 14.0857108 , lng: -87.1994419 };//Variable con posicion que usaremos como
    //centro de nuestro mapa

    //Nueva instancia de un mapa de google
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12, //zoom incial de nuestra app
        center: position, //Posicion de nuestro mapa cuando inicie
        mapId: "DEMO_MAP_ID", // Lo podemos usar para modificar el disenio de nuestro maapa
    });

    // Crea un objeto Circle para saber en donde vamos a estar
    const cityCircle = new google.maps.Circle({
        strokeColor: "#FF0000", // Color del borde del círculo
        strokeOpacity: 0.8, // Opacidad del borde
        strokeWeight: 2, // Grosor del borde
        fillColor: "#00ff38", // Color de relleno del círculo
        fillOpacity: 0.2, // Opacidad del relleno
        map, // Asocia el círculo al mapa que has creado
        center: position, // Centro del círculo en las coordenadas de latitud y longitud
        radius: 5000, // Radio del círculo en metros, es el mismo que definimos arriba
    });

        // Calcula una nueva posición a 50 km al este (90 grados) del centro del 
        //La distancia lo maximo que podra ser es de 3.9 km

    repartidoreBD.forEach(element => {
        // console.log(element.idusuario);
        // console.log(element.personas.primernombre);
        const id = element.idusuario;
        const rumbo = Math.random()*360;
        const distancia = Math.random()*3.
        const latRepartidor = element.latitud;
        const lngRepartidor = element.longitud;
        const nvoPosicionRepartidor = new ubicacionRepartidor(id, rumbo, distancia, latRepartidor, lngRepartidor);
        Repartidores.push(nvoPosicionRepartidor);
    });

    // console.log(Repartidores);

    // const nvoPosicionRepartidor = new ubicacionRepartidor(1,180,3.9) //Prueba de creacion de nuevo objeto para meter info
    // const nuevaPosicion = CalcularPosicion(position.lat, position.lng, nvoPosicionRepartidor._distanciaActualDelCentro, nvoPosicionRepartidor.rumbo);
    // nvoPosicionRepartidor.latRepartidor = nuevaPosicion.lat;
    // nvoPosicionRepartidor.lngRepartidor = nuevaPosicion.lng;
    // Repartidores.push(nvoPosicionRepartidor);

    //Agregamos un nuevo elemento a nuestra lista, este nos servira para mucho
    // locations.push({lat:nvoPosicionRepartidor.latRepartidor, lng:nvoPosicionRepartidor.lngRepartidor});

        //Es el que nos traera globos de texto para nuestro mapa cuando toquemos los iconos
        //Por los son vacios
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
            beachFlagImg.width = 23; // Ancho de la imagen en píxeles
            beachFlagImg.height = 23; // Alto de la imagen en píxeles

            ///Termina imagenes para Repartidor

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
        map.setZoom(16);
        });
        return marker;
    });
    
    // “Añade un agrupador de marcadores para administrar los marcadores
    new MarkerClusterer({ markers, map });

    } /* Final del init map */

    const locations = [
    { lat: 14.0857108 , lng: -87.1994419 },
    { lat: 14.099139, lng: -87.192222 },
    { lat: 14.099750, lng: -87.195111 },
    { lat: 14.100583, lng: -87.197639 },
    { lat: 14.086917, lng: -87.193028 },
    { lat: 14.086778, lng: -87.204306 },
    ];

    const Repartidores = [];

initMap(); //Llamado a la funcion
