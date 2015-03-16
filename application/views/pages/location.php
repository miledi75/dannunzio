<div class="col-md-9">
<h5>Where are we?</h5>

<p>Our gallery is located in the beautiful sunny hills of Collecorvino, a small village not far from Pescara in the region of Abruzzo. 
We are surrounded by olive trees and vineyards. these surroundings are among the themes of our in house artists and are very present in their works.</p>

<div id="map-canvas">

</div>

</div>

<!-- loading googlemaps api -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
  	function initialize() 
  	{
  		var mapCanvas = document.getElementById('map-canvas');
  		var mapOptions = 
  	  		{
	  		  center: new google.maps.LatLng(42.459424, 14.013777),
	  		  zoom: 16,
	  		  mapTypeId: google.maps.MapTypeId.ROADMAP
  		    };
  				
  	    var map = new google.maps.Map(mapCanvas,mapOptions);
  	}
  	google.maps.event.addDomListener(window, 'load', initialize);
</script>
