@extends('../layout/' . $layout)
@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Detail du service</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            
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

    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                         src="{{ '../../storage/imgs/'.$services['image'] }}">
                    <div
                        class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2">
                        <i class="w-4 h-4 text-white" data-lucide="camera"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                        Service {{$services->nom}}</div>
                    <div class="text-slate-500">{{$services->locale}}</div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Service</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{$services->nom}}@gmail.tn
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram {{$services->nom}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter {{$services->nom}}
                    </div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5">Sales Growth</div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 w-20 flex">
                        USP: <span class="ml-3 font-medium text-success">+23%</span>
                    </div>
                    <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-1 -mr-5"></canvas>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center lg:justify-start">
                    <div class="mr-2 w-20 flex">
                        STP: <span class="ml-3 font-medium text-danger">-2%</span>
                    </div>
                    <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-2 -mr-5"></canvas>
                        </div>
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
            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var Options = {
                zoom: 15,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("mapcanvas"), Options);
            //var carMarkerImage = new google.maps.MarkerImage('resources/images/car.png');
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(getLocation()),
                map: map,
                draggable: false,
//icon: carMarkerImage,
                title: "",
                autoPan: true

            });
            var infobulle = new google.maps.InfoWindow({
                content: {{ $services->locale }}
            });
            google.maps.event.addListener(marker, 'mouseover', function () {
                infobulle.open(map, marker);
            });


            document.goToLocation = function (x, y) {
                alert("goToLocation, x: " + x + ", y:" + y);
                var latLng = new google.maps.LatLng(x, y);
                marker.setPosition(latLng);
                map.setCenter(latLng);
            }


        </script>


    </div>







   

@endsection
