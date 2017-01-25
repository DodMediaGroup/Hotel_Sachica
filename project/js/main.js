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
 };
 $(document).ready(function () {
     $(".owl-demo").owlCarousel({
      autoPlay: false,
      navigation : true,
      slideSpeed : 1000,
      paginationSpeed : 1000,
      singleItem : true
      
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
     $('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
     $(".js-accordeon").each(function () {
         var height = $(this).outerHeight();
         $(this).css({
             "margin-top": -height + "px"
         })
     });
     $(".js-active-detalle").on("click", function (event) {
         event.preventDefault();
         var father = $(this).parents(".item-hab");
          $(".js-accordeon").removeClass("active");
         if (father.find(".js-accordeon").hasClass("active"))
             father.find(".js-accordeon").removeClass("active");
         else
             father.find(".js-accordeon").addClass("active");
     });

     var alt = $('.menu-bar').offset().top;

     $(window).on('scroll', function () {
         if ($(window).scrollTop() > alt) {
             $('.menu-bar').addClass('menu-fixed');
         } else {
             $('.menu-bar').removeClass('menu-fixed');
         }
     });
     var altura = $('.title-nav').offset().top;

     $(window).on('scroll', function () {
         if ($(window).scrollTop() > altura) {
             $('.title-nav').addClass('menu-fixed');
         } else {
             $('.title-nav').removeClass('menu-fixed');
         }
     });
     var contador = 1;
     $('.menu-bar').click(function () {
         if (contador == 1) {
             $('.title-nav').animate({
                 marginLeft: '0'
             });
             contador = 0;
         } else {
             contador = 1;
             $('.title-nav').animate({
                 marginLeft: '-103%'
             });
         }
     });

     $('#reserva_index').on('submit', function (event) {
         event.preventDefault();
         var popUp = $('.popUp.popUp__form');
         var popUpAlerta = $('.popUp.popUp__alerta');
         var popUpLoading = $('.popUp.popUp__loading');
         $.ajax({
                 url: $(this).attr('action'),
                 type: 'POST',
                 dataType: 'json',
                 data: $(this).serialize()

             })
             .done(function (data) {
                 if (data.status) {
                     popUp = $.addTextFormUser(popUp, data.user);
                     $.showpopUp(popUpLoading)
                     $.showpopUp(popUp);
                 } else {
                     var mns = (data.error) ? data.error : "Ocurrio un error durante la validación, Intente mas tarde";
                     popUpAlerta = $.addTextpopUp(popUpAlerta, mns);
                     $.showpopUp(popUpAlerta);
                 }

             }).fail(function () {
                 var mns = "Ocurrio un error durante la conexion con el servidor";
                 popUpAlerta = $.addTextpopUp(popUpAlerta, mns);
                 $.showpopUp(popUpAlerta);
             }).always(function () {
                 $.closepopUp(popUpLoading);
                 //aqui se oculta el popUp de loading

             });

     });

     $('#form__reserva').on('submit', function (event) {
         event.preventDefault();
         var popUp = $('.popUp.popUp__form');
         var popUpAlerta = $('.popUp.popUp__alerta');
         var popUpLoading = $('.popUp.popUp__loading');
         $.ajax({
             url: $(this).attr('action'),
             type: 'POST',
             dataType: 'json',
             data: $(this).serialize()

         })

         .done(function (data) {
             if (data.status) {
                 popUp = $.addTextFormReserva(popUp, data.reserva);
                 // $.showpopUp(popUpLoading)
                 $.showpopUp(popUp);
             } else {
                 var mns = (data.error) ? data.error : "Ocurrio un error durante la validación, Intente mas tarde";
                 popUpAlerta = $.addTextpopUp(popUpAlerta, mns);
                 $.showpopUp(popUpAlerta);
             }

         }).fail(function () {
             var mns = "Ocurrio un error durante la conexion con el servidor";
             popUpAlerta = $.addTextpopUp(popUpAlerta, mns);
             $.showpopUp(popUpLoading);
             $.showpopUp(popUpAlerta);
         }).always(function () {
             $.closepopUp(popUpLoading);
             //aqui se oculta el popUp de loading

         });
     });

     $('#form__popUp__confirmar').on('submit', function (event) {
         event.preventDefault();
         var popUpAlerta = $('.popUp.popUp__alerta');
         $.ajax({
                 url: $(this).attr('action'),
                 type: 'POST',
                 dataType: 'json',
                 data: $(this).serialize()

             })
             .done(function (data) {
                 var popUp = $('.popUp.popUp__form');
                 if (data.status) {
                     $.closepopUp(popUp);
                     popUpAlerta = $.addTextpopUp(popUpAlerta, data.exito);
                     $.showpopUp(popUpAlerta);

                     $("#reserva_index, #form__popUp__confirmar").find("input, textarea").val("");
                     $("#reserva_index, #form__popUp__confirmar").find("select").prop("selectedIndex", 0);
                 } else {
                     popUpAlerta = $.addTextpopUp(popUpAlerta, data.error);
                     $.showpopUp(popUpAlerta);
                 }

             }).fail(function () {
                 var mns = "Ocurrio un error durante la conexion con el servidor";
                 popUpAlerta = $.addTextpopUp(popUpAlerta, mns);
                 $.showpopUp(popUpAlerta);
             }).always(function () {
                 //aqui se oculta el popUp de loading

             });
     });
     
    $('#form__popUp__contacto').on('submit', function (event) {
         event.preventDefault();
         var popUpContacto = $('.popUp.popUp__contacto');
         $.ajax({
                 url: $(this).attr('action'),
                 type: 'POST',
                 dataType: 'json',
                 data: $(this).serialize()

             })
             .done(function (data) {
                 var msn = "Recibimos tu mensaje, a la mayor brevedad contestaremos tus inquietudes. Agradecemos tu mensaje y queremos brindarte una experiencia si igual";
                 popUpContacto=$.addTextpopUp(popUpContacto, msn);
                 $.showpopUp(popUpContacto);
             }).fail(function () {
                 var mns = "Ocurrio un error durante la conexion con el servidor, intente mas tarde";
                 popUpContacto = $.addTextpopUp(popUpContacto, mns);
                 $.showpopUp(popUpContacto);
             }).always(function () {
                 //aqui se oculta el popUp de loading

             });
     });

     $(document).on('click', '.popUp__close', function (event) {
         event.preventDefault();
         var popUp = $(this).parents('.popUp');
         $.closepopUp(popUp);
     });

     $(".btn__form__popUp__edit").on('click', function (event) {
         event.preventDefault();
         $(this).parents('.popUp__data__user__static').addClass('desactivar');
     });

     $("#from").datepicker({
         dateFormat: "dd/mm/yy",
         defaultDate: "+1w",
         changeMonth: true,
         numberOfMonths: 1,
         onClose: function (selectedDate) {
             $("#to").datepicker("option", "minDate", selectedDate);
         }
     });
     $("#to").datepicker({
         dateFormat: "dd/mm/yy",
         defaultDate: "+1w",
         changeMonth: true,
         numberOfMonths: 1,
         onClose: function (selectedDate) {
             $("#from").datepicker("option", "maxDate", selectedDate);
         }
     });

     $("#datepicker").datepicker({
         inline: true
     });
 });

 $.showpopUp = function ($popUp) {
     $popUp.addClass('active');
     $('body').css({
         overflow: 'hidden',
     });
     return $popUp;
 };

 $.closepopUp = function ($popUp) {
     $popUp.removeClass('active');
     $('body').css({
         overflow: 'auto',
     });
 };

 $.addTextpopUp = function ($popUp, $text) {
     $popUp.find("#text__popUp").text($text);
     return $popUp;
 };

 $.addTextFormUser = function ($popUp, $text) {
     $popUp.find(".popUp__form__name").text($text.nombre).val($text.nombre);
     $popUp.find(".popUp__form__lastname").text($text.apellido).val($text.apellido);
     $popUp.find(".popUp__form__email").text($text.correo).val($text.correo);
     $popUp.find(".popUp__form__phone").text($text.telefono).val($text.telefono);
     $popUp.find(".popUp__form__id").text($text.telefono).val($text.idusuario);
     return $popUp;
 };