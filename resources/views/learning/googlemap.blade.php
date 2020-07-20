<!DOCTYPE html>
<html>
  <head>
    <title>GooGle  Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

      <!-- Bootstrap core CSS -->
  <link href={{asset("resume/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href={{asset("resume/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href={{asset("resume/css/resume.min.css")}} rel="stylesheet">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width:100%;

      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background:rgb(200,148,30);
      }
    </style>
  </head>
  <body>


  <header>
        <nav class="navbar navbar-expand-sm bg-muted navbar-dark">
    <!-- Brand -->

    <ul class="navbar-nav ml-auto">
            {{-- <li class="nav-item">
           <a class="nav-link"  href="{{route ( 'returnpage' , [$user->email])}}"> {{$user->email}}</a>
            </li> --}}
            <li class="navbar-nav ml -center">
                <a href="/Digital_health_center"><button class="mahbub">Log Out</button></a>
            </li>

        </ul>
    </nav>
</header>
    <div id="map"></div>
    <script>

      var map;
      var pyrmont;

//current Location
   function geoLocationInit()
   {
       if(navigator.geolocation)
       {
           navigator.geolocation.getCurrentPosition(success,fail);
       }
       else
       {
           alert("Brower not supported");
       }
   }

   function success(position)
   {
       var latval =position.coords.latitude;
       var lagval = position.coords.longitude;
      pyrmont = new google.maps.LatLng(latval,lagval);
       CreatMap(pyrmont);
       nearbySearch(pyrmont);
   }

   function fail()
   {
       alert("it fails");
   }



      function CreatMap(pyrmont) {
        map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 17
    });

    var marker =new google.maps.Marker({
         position: pyrmont,
        map: map



    });


      }

   //marker


  //createMarker function

  function createMarker(latlang,icn,name)
  {
        var marker = new google.maps.Marker({
        position: latlang,
        map: map,
        icon:icn,
        title: name
       });

  }
      function nearbySearch(pyrmont){
           var request = {
                location: pyrmont,
                radius: '2500',
                type: ['hospital']
            };

      service = new google.maps.places.PlacesService(map);
       service.nearbySearch(request, callback);

      function callback(results, status) {
       if (status == google.maps.places.PlacesServiceStatus.OK) {
       for (var i = 0; i < results.length; i++) {
          var place=results[i];
          console.log(place);
          latlang =place.geometry.location;
          icn ="https://img.icons8.com/color/48/000000/hospital-2.png";
          name=place.name;
         createMarker(latlang,icn,name);
          }
       }
   }

    }





    </script>
    <script src="https://maps.googleapis.com/maps/api
    /js?key=AIzaSyAR-zt_a8BB8J0GDerxY2MKkYX3H-yzhNk&callback=geoLocationInit&libraries=places"
    async defer></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/
    js?key=AIzaSyBezq20FEQ48YlxQQZltgWntzJBVPY7G-Q&callback=geoLocationInit&libraries=places"
    async defer></script> --}}
  </body>
</html>
