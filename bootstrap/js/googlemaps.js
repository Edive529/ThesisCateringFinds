function initMap(){
  var iligan = { lat: 8.2280, lng: 124.2452 }; 
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: iligan,
  });
  
 

var showData = JSON.parse(document.getElementById('showData').innerHTML); 

    Array.prototype.forEach.call(showData, function(data){
      var cntnt = "<div style='width:150px;'><img style='height:auto;width:150px; ' src='admin/upload/"+
      data.image+
      " '> "+
      "<h6>"+
       data.restaurant+
       "</h6>"+
       "<p>" +
       data.address+
       "</p> </div>";

      var infowindow = new google.maps.InfoWindow({
        content: cntnt,
      });
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data.latitude, data.longitude),
          map: map,
        });
        marker.addListener("click", () => {
          infowindow.open({
            anchor: marker,
            map
          }) ;
         
      }) ; 


      
      google.maps.event.addListener(map, "rightclick", function (event) {
        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();
        console.log("Latitude: " + latitude);
        console.log("Longitude: " + longitude);

        // You can do whatever you want with the coordinates here
        // For example, display them in an HTML element on the page
        document.getElementById("latitude").innerHTML = "Latitude: " + latitude;
        document.getElementById("longitude").innerHTML = "Longitude: " + longitude;
      });

      console.log(data);
    })  
  
}
 
  ;

 