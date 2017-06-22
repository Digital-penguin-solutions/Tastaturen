var map_cover_visible = true;

//Google maps script
function initialize() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: new google.maps.LatLng(57.69065,11.97156),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var styles =[
        {
            "featureType": "poi",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "stylers": [
                {
                    "saturation": -70
                },
                {
                    "lightness": 37
                },
                {
                    "gamma": 1.15
                }
            ]
        },
        {
            "elementType": "labels",
            "stylers": [
                {
                    "gamma": 0.26
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road",
            "stylers": [
                {
                    "hue": "#7b1830"
                }

            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#7b1830"
                },
                {
                    "lightness": 40
                },
                {
                    "saturation": -90
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#7b1830"
                },
                {
                    "lightness": 40
                },
                {
                    "saturation": -70
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#7B1830"
                },
                {
                    "saturation": 20
                },
                {
                    "lightness": -60
                },
                {
                    "gamma": 0
                }

            ]
        },
        {
            "featureType": "administrative.province",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "lightness": -50
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "labels.text",
            "stylers": [
                {
                    "lightness": 20
                }
            ]
        }
    ];

    map.setOptions({styles: styles});

    // Creating a marker and positioning it on the map
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(57.69065, 11.97156),
        map: map
    });
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(57.688520, 11.966624),
        map: map
    });

}
google.maps.event.addDomListener(window, 'load', initialize);

$('html').click(function(e) {

    if(map_cover_visible)
    {
        if($(e.target).is('#map-cover') || $(e.target).is('#map-cover h1')|| $(e.target).is('#map-cover h1 i'))
        {
            $("#map-cover").fadeOut();
            map_cover_visible = false;
        }
    }
    else
    {

        if(!$(e.target).is('#map div') && !$(e.target).is("#map-cover")){
            $("#map-cover").fadeIn();
            map_cover_visible = true;
        }


    }


    //	console.log(e);
});

$('#map-cover').click(function(e) {
});