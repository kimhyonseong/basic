<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8" />
    <title>Display a map</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.css" rel="stylesheet" />
    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoia2hzNjUyNCIsImEiOiJjazlkajlzeTEwNGR4M2ZwNnVsNnY1MjBzIn0.JBnxQ5vjmgesmfpJUwHCTQ';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [126.986, 37.565], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });
</script>

</body>
</html>