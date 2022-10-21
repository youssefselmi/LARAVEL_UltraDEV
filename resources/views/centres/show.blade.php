@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')


 
<div class="card">
  <div class="card-header">Centres Page</div>
  <div class="card-body">   
        
        <div class="card-body">
        <h5 class="card-title">Name : {{ $centres->nom }}</h5>
        <p class="card-text">Address : {{ $centres->type }}</p>
        <p class="card-text">Mobile : {{ $centres->locale }}</p>
  </div>
      
    </hr>
  
  </div>
</div>








<div id="mapcanvas">

<script type="text/javascript">

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);

        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }

    document.map = new google.maps.Map(document.getElementById("mapcanvas"));
    var latlng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    var Options = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapcanvas"), Options);
    //var carMarkerImage = new google.maps.MarkerImage('resources/images/car.png');
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng( getLocation()),
        map: map,
        draggable: false,
//icon: carMarkerImage,
        title: "",
        autoPan: true

    });
    var infobulle = new google.maps.InfoWindow({
        content: {{ $centres->locale }}
    });
    google.maps.event.addListener(marker, 'mouseover', function() {
        infobulle.open(map, marker);
    });


    document.goToLocation = function(x, y) {
        alert("goToLocation, x: " + x +", y:" + y);
        var latLng = new google.maps.LatLng(x, y);
        marker.setPosition(latLng);
        map.setCenter(latLng);
    }


</script>


</div>









<div class="tg-player-description tg-haslayout">
<div class="tg-description">
    <div class="earth3dmap-com"><iframe id="iframemap" src="https://maps.google.com/maps?q={{ $centres->locale }}&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="500" frameborder="0" scrolling="no"></iframe><div style="color: #333; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right; padding: 10px;"> <a style="color: #333; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right;" href="http://earth3dmap.com/?from=embed" target="_blank" ></a></div>
    </div>








    <div class="container mt-4">

<div class="card">
    <div class="card-header">
        <h2>Simple QR Code</h2>
    </div>
    <div class="card-body">
        {!! QrCode::size(300)->generate("https://www.google.com/search?q=$centres->nom ") !!}
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Color QR Code</h2>
    </div>
    <div class="card-body">
        {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}
    </div>
</div>

</div>












@endsection
