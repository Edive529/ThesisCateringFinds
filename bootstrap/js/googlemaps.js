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
       data.restaurant+
       "</h4>";

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

      console.log(data);
    })  
  
}
 
 

$('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-food').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

 