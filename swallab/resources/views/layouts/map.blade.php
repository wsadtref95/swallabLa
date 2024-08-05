<!-- resources/views/layouts/map.blade.php -->
<style>
    #googlemap {
        height: 400px;
        width: 100%;
    }

    #sidebar {
        height: 400px;
        overflow-y: scroll;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    #sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #sidebar li {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    #sidebar li:hover {
        background-color: #f9f9f9;
    }

    #currentLocationButton {
        display: block;
        margin-bottom: 10px;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }

    #currentLocationButton:hover {
        background-color: #0056b3;
    }

    .icon-shopping {
        position: fixed;
        top: 300px;
        right: 10px;
        font-size: 24px;
        z-index: 1;
        cursor: pointer;
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFfMKagsvr7L4704YiZlG_2hp8gNfaB5A&libraries=places&callback=initMap" async defer></script>
<script>
    let map;
    let service;
    let infowindow;
    let userLocation;

    function initMap() {
        infowindow = new google.maps.InfoWindow();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                map = new google.maps.Map(document.getElementById('googlemap'), {
                    center: userLocation,
                    zoom: 15
                });

                const userMarker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "Your Location",
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    }
                });

                const request = {
                    location: userLocation,
                    radius: '1500',
                    type: ['restaurant']
                };

                service = new google.maps.places.PlacesService(map);
                service.nearbySearch(request, (results, status) => {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        for (let i = 0; i < results.length; i++) {
                            createMarker(results[i]);
                            addToList(results[i]);
                        }
                    }
                });
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function createMarker(place) {
        if (!place.geometry || !place.geometry.location) return;

        const marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            title: place.name
        });

        google.maps.event.addListener(marker, 'click', () => {
            infowindow.setContent(place.name || "");
            infowindow.open(map, marker);
        });
    }

    function addToList(place) {
        const list = document.getElementById('places');
        const item = document.createElement('li');
        item.textContent = place.name;
        list.appendChild(item);

        item.addEventListener('click', () => {
            map.setCenter(place.geometry.location);
            infowindow.setContent(place.name);
            infowindow.open(map, new google.maps.Marker({
                position: place.geometry.location,
                map: map,
                title: place.name
            }));
        });
    }

    function goToCurrentLocation() {
        if (userLocation) {
            map.setCenter(userLocation);
            infowindow.setContent("Your Location");
            infowindow.open(map, new google.maps.Marker({
                position: userLocation,
                map: map,
                title: "Your Location",
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                }
            }));
        } else {
            alert("Unable to retrieve your location.");
        }
    }
</script>
