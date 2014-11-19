function generate_maps(container) {
	var myOptions = {
		zoom		: 12,
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
 	var map = new google.maps.Map(document.getElementById(container), myOptions);
 	var defaultBounds = new google.maps.LatLngBounds(
    	new google.maps.LatLng(-33.8902, 151.1759),
    	new google.maps.LatLng(-33.8474, 151.2631));
 	map.fitBounds(defaultBounds);

  	var input = (document.getElementById('event_location'));
  	var searchBox = new google.maps.places.SearchBox(input);
  	var markers = [];

  	google.maps.event.addListener(searchBox, 'places_changed', function() {
	    var places = searchBox.getPlaces();
	
	    for (var i = 0, marker; marker = markers[i]; i++) {
	      marker.setMap(null);
    	}

	    markers = [];
	    var bounds = new google.maps.LatLngBounds();
	    for (var i = 0, place; place = places[i]; i++) {
	
	      var marker = new google.maps.Marker({
	        map: map,
	        title: place.name,
	        animation: google.maps.Animation.DROP,
	        position: place.geometry.location
	      });
	
	      markers.push(marker);
	
	      bounds.extend(place.geometry.location);
	    }

   		map.fitBounds(bounds);
  });

  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
}

