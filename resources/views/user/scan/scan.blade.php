@extends('layout.layout')
@section('sidebar')
    <header class="header header-fixed">
        <div class="header-content">
            <div class="left-content">
                <a href="{{ url('home') }}" class="back-btn">
                    <i class="feather icon-arrow-left"></i>
                </a>
            </div>
            <div class="mid-content">
                <h4 class="title">Scan Kehadiran</h4>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <style>
        #html5-qrcode-button-camera-start,
        #html5-qrcode-button-camera-stop {
            background-color: #04764E;
            border-color: #04764E;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1;
            border-radius: 12px;
            color: white;
            margin-top: 10px;
        }


        #html5-qrcode-anchor-scan-type-change {
            display: none;
            visibility: hidden;
        }
    </style>
    <main class="page-content space-top p-b40">
        <div class="container pt-0">
            @if ($data != 0)
                <div id="reader" width="100%"></div>

                <div id="mapku" style="width:100%; height:200px;"></div>
                <p id="locationInfo"></p>
                <div hidden>
                    <input type="text" id="lat" value="">
                    <input type="text" id="long" value="">
                    <input type="text" id="lokasi">
                </div>
            @else
                <div class="text-center mt-4">
                    <i class="fi fi-rr-clock" style="font-size: 20px"></i>
                    <h6>Perkuliahan Belum Dimulai</h6>
                    <small>Scan bisa dilakukan diatas jam @jam($now->tgl_perkuliahan) WIB</small>
                </div>
            @endif
        </div>
    </main>
@endsection

@section('script')
    <script>
        function initMap() {
            // Create a map centered at the user's current location
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                const map = new google.maps.Map(document.getElementById('mapku'), {
                    center: {
                        lat: latitude,
                        lng: longitude
                    },
                    zoom: 15
                });

                // Create a marker at the user's current location
                const marker = new google.maps.Marker({
                    position: {
                        lat: latitude,
                        lng: longitude
                    },
                    map: map,
                    title: 'Your Location'
                });

                // Display latitude and longitude information
                const locationInfo = document.getElementById('locationInfo');
                locationInfo.innerHTML = `Location: ${latitude}, ${longitude}`;

                $("#lat").val(latitude);
                $("#long").val(longitude);

                // Reverse geocoding to get location name
                const geocoder = new google.maps.Geocoder();
                const latLng = new google.maps.LatLng(latitude, longitude);
                geocoder.geocode({
                    'latLng': latLng
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            locationInfo.innerHTML += `<br>Location Name: ${results[1].formatted_address}`;
                            $("#lokasi").val(results[1].formatted_address);
                        } else {
                            locationInfo.innerHTML += '<br>Location Name: Not Found';
                        }
                    } else {
                        locationInfo.innerHTML += '<br>Location Name: Geocoding failed';
                    }
                });

                // Add a radius circle around the marker
                const circle = new google.maps.Circle({
                    map: map,
                    radius: 100, // radius in meters
                    fillColor: '#4285F4',
                    fillOpacity: 0.2,
                    strokeColor: '#4285F4',
                    strokeOpacity: 0.4,
                    strokeWeight: 2
                });
                circle.bindTo('center', marker, 'position');
            }, function() {
                // Handle geolocation error
                alert("Error: Hidupkan dan Izinkan GPS.");
            });
        }

        // Initialize the map when the page is loaded
        window.onload = initMap;
    </script>

    <script>
        var scanDone = false;

        // Membuat instance dari HTML5QrcodeScanner
        const html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250,
            },
        );

        html5QrcodeScanner.render(
            function(result) {
                if (!scanDone) {
                    scanDone = true;
                    var lat = $("#lat").val();
                    var long = $("#long").val();

                    if (lat == '' || long == '') {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Hidupkan fitur Lokasi/GPS!",
                            icon: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Oke!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = window.location.href;
                            }
                        });
                    } else {
                        var data = {
                            '_token': '{{ csrf_token() }}',
                            'token_perkuliahan': result,
                            'latitude': lat,
                            'longitude': long,
                            'lokasi': $("#lokasi").val()
                        };
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/postscan') }}",
                            data: data,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status == 1) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: data.pesan,
                                        icon: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#3085d6",
                                        confirmButtonText: "Oke!"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "{{ url('/home') }}"
                                        }
                                    });
                                } else if (data.status == 200) {
                                    Swal.fire({
                                        title: "Pemberitahuan!",
                                        text: data.pesan,
                                        icon: "error"
                                    });
                                } else if (data.status == 404) {
                                    Swal.fire({
                                        title: "Pemberitahuan!",
                                        text: data.pesan,
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    }
                }
            },
            function(error) {}
        );
    </script>

    <script>
        $(document).ready(function() {
            $(".html5-qrcode-element").addClass("btn btn-primary btn-sm mb-2 mt-2");
        })
    </script>
@endsection
