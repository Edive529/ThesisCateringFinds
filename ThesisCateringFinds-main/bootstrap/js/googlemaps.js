function initMap(){
  var iligan = { lat: 8.2280, lng: 124.2452 }; 
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: iligan,
  });
  
var marker = new google.maps.Marker({
  position: iligan,
  map: map,
});

var showData = JSON.parse(document.getElementById('showData').innerHTML); 

    Array.prototype.forEach.call(showData, function(data){
      var cntnt = "<h4>"+
       data.map_add +
       "</h4>";

      var infowindow = new google.maps.InfoWindow({
        content: cntnt,
      });
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data.lat, data.longi),
          map: map,
        });
        marker.addListener("click", () => {
          infowindow.open({
            anchor: marker,
            map
          }) ;
         
      }) ; 

      console.log(data);
    })  
  
}
 
 

 
 