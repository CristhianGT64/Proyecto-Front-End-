<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> {{-- Ncesarios js --}}
    <link rel="stylesheet" type="text/css" href="/css/app.css" /> {{-- Necesario mapa js --}}
    <title>Mapa General</title>
</head>
<body>

    <h1>Mapa general</h1>
    <div id="map"></div>
      <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
          key: "AIzaSyAZ62cymsGJJcaJV7jZoQyacAuEmP60NE8",
        });
      </script>

      {{-- ENVIAR REPARTIDORES AL JS PARA MAPEARLOS EN EL MAPA --}}
<script type="text/javascript">
    var repartidoreBD = {!! json_encode($repartidores) !!}; // Envio de informacion de repartiores a JS
</script>

    {{-- Enviar negocios al JS para mapearlos en el mapa --}}
    <script type="text/javascript">
      var negociosBD = {!! json_encode($negocios) !!}; // Envio de informacion de negocios a JS
  </script>

<script type="module" src="/js/MapaAdministrador.js"></script>
</body>
</html>