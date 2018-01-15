<!-- <div class="hmw3layouts">
    <div class="container">
        <div class="col-md-5 hmw3layouts-left">
            <img alt="" src="assets/images/img1.jpg">
            </img>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div> -->


<script src="jquery-1.10.2.min.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
</script>
<!-- Google Maps API -->
<?php
 
        
$arr=array();
function getJSONFromDB(){
    $conn = mysqli_connect("localhost", "root", "","pharmacy");
    $sql = 'SELECT * FROM `location`';
    $result = mysqli_query($conn, $sql)or die(mysqli_error());
    while($row = mysqli_fetch_assoc($result)) {
        $arr[]=$row;
    }
    return json_encode($arr);
}
$ip = getJSONFromDB();

?>

   <script>

    var locations = JSON.parse('<?php echo $ip; ?>');
    var TempLocation = locations;
    console.log(locations);
    var map;    // Google map object

    // Initialize and display a google map
    function Init()
    {
        // HTML5/W3C Geolocation
        if ( navigator.geolocation )
        {
            navigator.geolocation.getCurrentPosition( UserLocation, errorCallback,{maximumAge:60000,timeout:10000});
        }
        // Default to Washington, DC
        else
            ClosestLocation( 54.8951, 90.0367, "Washington, DC" );
    }

    function errorCallback( error )
    {

    }
    // Callback function for asynchronous call to HTML5 geolocation
    function UserLocation(  position)
    {
        ClosestLocation( position.coords.latitude, position.coords.longitude, "This is my Location" );

        //console.log(position.coords.latitude +" "+ position.coords.longitude);
    }

    // Display a map centered at the specified coordinate with a marker and InfoWindow.
    function ClosestLocation( lat, lon, title )
    {
        // Create a Google coordinate object for where to center the map
        var latlng = new google.maps.LatLng( lat, lon );    
        // Map options for how to display the Google map
        var mapOptions = { zoom: 14, center: latlng };
        // Show the Google map in the div with the attribute id 'map-canvas'.
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // Place a Google Marker at the same location as the map center 
        // When you hover over the marker, it will display the title
        var image = 'map_icon/house.PNG';
        var marker = new google.maps.Marker( { 
             position: latlng, 
             map: map,
            icon: image,
            title: 'current location'
        });

        // Create an InfoWindow for the marker
        //var contentString = "<b>" + title + "</b>"; // HTML text to display in the InfoWindow
        //var infowindow = new google.maps.InfoWindow( { content: contentString } );

        // Set event to display the InfoWindow anchored to the marker when the marker is clicked.
        var InfoWindowCurrent = new google.maps.InfoWindow( {  
            content: "<h4>This is current location</h4>" } );  
        
        google.maps.event.addListener( marker, 'click', function() { InfoWindowCurrent.open( map, marker ); });

        //Current posiition ENDED

        // find the closest location to the user's location
        var closest = 0;
        var mindist = 99999;

        var closestLat;
        var closestLong;

        for(var i = 0; i < locations.length; i++) 
        {
            // get the distance between user's location and this point
            var dist = Haversine( locations[ i ].lat, locations[ i ].lon, lat, lon );

            // check if this is the shortest distance so far
            if ( dist < mindist )
            {
                closest = i;
                mindist = dist;

                closestLat = locations[ i ].lat;
                closestLong = locations[ i ].lon;
            }
        }

        for(var i=0; i<TempLocation.length; i++)
        {
            if(TempLocation[i].lat != closestLat && TempLocation[i].lon != closestLong )
            {
                var latlng = new google.maps.LatLng( TempLocation[i].lat, TempLocation[i].lon );    
                var image = 'map_icon/pharmacy.PNG';
                var Others = new google.maps.Marker( { 
                    position: latlng, 
                    map: map,
                    icon: image,
                    title:OtherLocations
                });
                var OtherLocations = "This is " + TempLocation[i].name;                  
                var InfoWindowOthers = new google.maps.InfoWindow( {  content: OtherLocations } );  
                google.maps.event.addListener( Others, 'click', function() { 
                    InfoWindowOthers.open( map, Others ); 
                });
            }
        }

var others=[];
var contents = [];
var infowindows = [];

for (i = 0; i < TempLocation.length; i++) { 
        if(TempLocation[i].lat != closestLat && TempLocation[i].lon != closestLong ){
    
            var image = 'map_icon/pharmacy.PNG';
            others[i] = new google.maps.Marker({
                position: new google.maps.LatLng(TempLocation[i].lat, TempLocation[i].lon),
                map: map,
                icon: image,
                title: 'pharmacy'
            });

            others[i].index = i; //add index property
            contents[i] = 
           /* "<h4>Pharmacy: " +TempLocation[i].name+"&nbsp;&nbsp; address:"+TempLocation[i].address*/
           "<h4>Pharmacy ID: " + TempLocation[i].pharmacy_id
            +"<br><a href='pharmacy.php?pharmacy="+TempLocation[i].pharmacy_id+"'> Go to Pharmacy </a></h4>";


            infowindows[i] = new google.maps.InfoWindow({ content: contents[i]    
            });

            google.maps.event.addListener(others[i], 'click', function() {
                console.log(this.index); // this will give correct index
                console.log(i); //this will always give 10 for you
                infowindows[this.index].open(map,others[this.index]);
                map.panTo(others[this.index].getPosition());
            });  
        }
}

        // Create a Google coordinate object for the closest location
        var latlng = new google.maps.LatLng( locations[ closest].lat, locations[ closest].lon );    
        // Place a Google Marker at the closest location as the map center 
        // When you hover over the marker, it will display the title
        var image = 'map_icon/pharmacy2.PNG';
        var marker2 = new google.maps.Marker( { 
            position: latlng, 
            map: map,
            icon: image,
            title: 'nearest pharmacy'
           // position: new google.maps.LatLng(locations[2][2], locations[2][2])

        });
        for (i = 0; i < TempLocation.length; i++) {
        if(locations[ closest].lat == TempLocation[i].lat && locations[ closest].lon == TempLocation[i].lon) 
           var link = TempLocation[i].pharmacy_id;
           var link2 = TempLocation[i].name;
           var link3 = TempLocation[i].address;
         //  document.write(link);
        }
         

    var contentString = "<h4> Closest Location From User. Distance:" + 
    mindist.toFixed(3)+ " km" + "<br>" +"Pharmacy ID: "+ link + 
     /*+"&nbsp;&nbsp;" + "address: "+link3+*/
    "<br><a href='pharmacy.php?pharmacy="+link+"'> Go to Pharmacy </a></h4>";


        var InfoWindowNearest = new google.maps.InfoWindow( {  content: contentString } );  
        // Set event to display the InfoWindow anchored to the marker when the marker is clicked.
        google.maps.event.addListener( marker2, 'click', function() { 
            InfoWindowNearest.open( map, marker2 ); 
        });
        // find the closest location to the user's location --ENDED---
        
        map.setCenter( latlng );
    }
    // Call the method 'Init()' to display the google map when the web page is displayed ( load event )
    google.maps.event.addDomListener( window, 'load', Init );


    // Convert Degress to Radians
    function Deg2Rad( deg ) {
       return deg * Math.PI / 180;
    }

    // Get Distance between two lat/lng points using the Haversine function
    // First published by Roger Sinnott in Sky & Telescope magazine in 1984 (“Virtues of the Haversine”)
    //
    function Haversine( lat1, lon1, lat2, lon2 )
    {
        var R = 6372.8; // Earth Radius in Kilometers

        var dLat = Deg2Rad(lat2-lat1);  
        var dLon = Deg2Rad(lon2-lon1);  

        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                        Math.cos(Deg2Rad(lat1)) * Math.cos(Deg2Rad(lat2)) * 
                        Math.sin(dLon/2) * Math.sin(dLon/2);  
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; 

        // Return Distance in Kilometers
        return d;
    }
    // Get Distance between two lat/lng points using the Pythagoras Theorem on a Equirectangular projection to account
    // for curvature of the longitude lines.
    function PythagorasEquirectangular( lat1, lon1, lat2, lon2 )
    {
        lat1 = Deg2Rad(lat1);
        lat2 = Deg2Rad(lat2);
        lon1 = Deg2Rad(lon1);
        lon2 = Deg2Rad(lon2);
        var R = 6371; // km
        var x = (lon2-lon1) * Math.cos((lat1+lat2)/2);
        var y = (lat2-lat1);
        var d = Math.sqrt(x*x + y*y) * R;
        return d;
    }
        </script>
        <style>
            /* style settings for Google map */
    #map-canvas
    {
        width : 1140px;  /* map width */
        height: 500px;  /* map height */
        margin-left: 100px;
    }
        </style>
        <h2 style="text-align: center;padding:33px; "> Current Location And All Pharmacy Location </h2>

        <div id="map-canvas"> </div>
        <br> <br> <br>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa7oJY-2_P8i2VlNxAd5ccMGvh-lAl6-Q&callback=myMap">
  </script> 


<!-- slid -->
<div class="slid">
    <div class="container">
        <div class="col-md-3 col-sm-3 col-xs-6 slid_grid">
            <div class="slid_text">
                <div class="numscroller numscroller-big-bottom" data-delay=".5" data-increment="5" data-max="2000" data-min="0" data-slno="1">
                    34
                </div>
                <p>
                    Medicine
                </p>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 slid_grid slid_grid2">
            <div class="slid_text">
                <div class="numscroller numscroller-big-bottom" data-delay=".5" data-increment="5" data-max="1500" data-min="0" data-slno="1">
                    04
                </div>
                <p>
                    Registerd <br>
                    Pharmacy
                </p>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 slid_grid slid_grid3">
            <div class="slid_text">
                <div class="numscroller numscroller-big-bottom" data-delay=".5" data-increment="1" data-max="0018" data-min="0" data-slno="1">
                    018
                </div>
                <p>
                    Branches
                </p>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 slid_grid slid_grid4">
            <div class="slid_text">
                <div class="numscroller numscroller-big-bottom" data-delay=".5" data-increment="10" data-max="2800" data-min="0" data-slno="1">
                    50
                </div>
                <p>
                    Orders
                </p>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- //slid -->
