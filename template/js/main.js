 // When the window has finished loading create our google map below
 google.maps.event.addDomListener(window, 'load', init);

 function init() {
     // Basic options for a simple Google Map
     // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
     var mapOptions = {
         // How zoomed in you want the map to start at (always required)
         zoom: 17,
         scrollwheel: false,

         // The latitude and longitude to center the map (always required)
         center: new google.maps.LatLng(5.585444, -73.540138), // Sachica
         // How you would like to style the map. 
         // This is where you would paste any style found on Snazzy Maps.
         styles: [{
             "featureType": "landscape",
             "stylers": [{
                 "saturation": -100
             }, {
                 "lightness": 60
             }]
         }, {
             "featureType": "road.local",
             "stylers": [{
                 "saturation": -100
             }, {
                 "lightness": 40
             }, {
                 "visibility": "on"
             }]
         }, {
             "featureType": "transit",
             "stylers": [{
                 "saturation": -100
             }, {
                 "visibility": "simplified"
             }]
         }, {
             "featureType": "administrative.province",
             "stylers": [{
                 "visibility": "off"
             }]
         }, {
             "featureType": "water",
             "stylers": [{
                 "visibility": "on"
             }, {
                 "lightness": 30
             }]
         }, {
             "featureType": "road.highway",
             "elementType": "geometry.fill",
             "stylers": [{
                 "color": "#ef8c25"
             }, {
                 "lightness": 40
             }]
         }, {
             "featureType": "road.highway",
             "elementType": "geometry.stroke",
             "stylers": [{
                 "visibility": "off"
             }]
         }, {
             "featureType": "poi.park",
             "elementType": "geometry.fill",
             "stylers": [{
                 "color": "#b6c54c"
             }, {
                 "lightness": 40
             }, {
                 "saturation": -40
             }]
         }, {}]
     };

     // Get the HTML DOM element that will contain your map 
     // We are using a div with id="map" seen below in the <body>
     var mapElement = document.getElementById('map');

     // Create the Google Map using our element and options defined above
     var map = new google.maps.Map(mapElement, mapOptions);

     // Let's also add a marker while we're at it
     var marker = new google.maps.Marker({
         position: new google.maps.LatLng(5.585444, -73.540138),
         map: map,
         title: 'Hotel Calle Principal',
         icon: 'images/img-map.png'
     });
 }
 $(document).ready(function () {
     $(".js-accordeon").each(function () {
         var height = $(this).outerHeight();
         $(this).css({
             "margin-top": -height + "px"
         })
     });
     $(".js-active-detalle").on("click", function (event) {
         event.preventDefault();
         var father = $(this).parents(".item-hab");
         // $(".js-accordeon").removeClass("active");
         if (father.find(".js-accordeon").hasClass("active"))
             father.find(".js-accordeon").removeClass("active");
         else
             father.find(".js-accordeon").addClass("active");
     });
     
     var alt = $('.menu-bar').offset().top;
     
     $(window).on('scroll', function(){
         if($(window).scrollTop() > alt){
             $('.menu-bar').addClass('menu-fixed');
         }
         else{ 
           $('.menu-bar').removeClass('menu-fixed');
         }
     });
      var altura = $('.title-nav').offset().top;
     
     $(window).on('scroll', function(){
         if($(window).scrollTop() > altura){
             $('.title-nav').addClass('menu-fixed');
         }
         else{ 
           $('.title-nav').removeClass('menu-fixed');
         }
     });
     var contador = 1;
     $('.menu-bar').click(function(){
        if(contador == 1){
            $('.title-nav').animate({
                marginLeft:'0'
            });
            contador = 0;
        } else{
            contador = 1;
            $('.title-nav').animate({
                marginLeft:'-103%'
            });
        }
     });
 });