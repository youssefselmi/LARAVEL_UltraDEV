@extends('../layout/' . $layout)
@section('subcontent')





















<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Point of Sale</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-order-modal" class="btn btn-primary shadow-md mr-2">Show More about centre {{ $centres->nom }}</a>
            <div class="pos-dropdown dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="chevron-down"></i>
                    </span>
                </button>
                <div class="pos-dropdown__dropdown-menu dropdown-menu">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206020 - {{ $fakers[3]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206022 - {{ $fakers[4]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206021 - {{ $fakers[5]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




























 <!-- BEGIN: New Order Modal -->
 <div id="new-order-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


            <div class="container mt-4">

<div class="card">
    <div class="card-header">
        <h2>Simple QR Code</h2>
    </div>
    <div class="card-body">
        {!! QrCode::size(300)->generate("https://www.google.com/search?q=Centre $centres->nom $centres->locale ") !!}
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
              
            </div>
        </div>
    </div>













 <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
          
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">centre Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                 
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        Centre : {{ $centres->nom }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                    Lieu : {{ $centres->locale }}
                    </div>

                </div>
            </div>
            
        </div>
     
    </div>
    <!-- END: Profile Info -->




<br><br><br>








<!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
 







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








  




















@endsection
