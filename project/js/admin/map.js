var map = null;

$(function(){
	map = new GMaps({
		div: '#gmap',
		lat: 5.0241545,
		lng: -72.6821608,
		zoom: 5,
	});
	if(markers.length > 0){
		$.each(markers, function(index, val) {
			map.addMarker(this);
		});
	}

	GMaps.on('click', map.map, function(event) {
		if(map.markers.length > 0)
			map.removeMarkers();
		var lat = event.latLng.lat();
		var lng = event.latLng.lng();

		map.addMarker({
			lat: lat,
			lng: lng
		});

		$('#Stores_lat').val(lat);
		$('#Stores_lng').val(lng);
	});
});