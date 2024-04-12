<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> {{-- Ncesario para el mapa --}}
    <link rel="stylesheet" href="/css/Mapa.css"> {{-- Necesario para el mapa --}}
    <title>Repartidor</title>
</head>
<body>
<h1>Repartidor</h1>
<div id="">
@php
    // $google_maps_url = 'https://maps.googleapis.com/maps/api/distancematrix/json?destinations=New%20York%20City%2C%20NY&origins=Washington%2C%20DC%7CBoston&units=imperial&key=AIzaSyAZ62cymsGJJcaJV7jZoQyacAuEmP60NE8';
    // $google_maps_json = file_get_contents($google_maps_url);
    // $google_maps_array = json_decode($google_maps_json, true);
    // var_dump($google_maps_array)

    // $ubicacionGoogle = 'https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyAZ62cymsGJJcaJV7jZoQyacAuEmP60NE8';
    // $UbucacionJson = file_get_contents($ubicacionGoogle);
    // var_dump($UbucacionJson);
@endphp

<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>

<!-- prettier-ignore -->
<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "AIzaSyAZ62cymsGJJcaJV7jZoQyacAuEmP60NE8", v: "beta"});</script>
</div>
<script src="/js/mapa.js"></script>
</body>
</html>