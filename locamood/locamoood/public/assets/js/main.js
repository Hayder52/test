$( document ).ready(function() {
    


    
// hero slider



$('.hero-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots:true,
    arrows:false
  });



// machine slider


$('.machine-slider').slick({
  dots: false,
   infinite: false,
      speed: 500, 
      cssEase: 'linear',
    margin:20,
  padding: 0,
  slidesPerRow: 4,
  rows: 1,
  arrows:true, 
  slidesToShow: 4,
  prevArrow: "<button type='button' class='slick-prev'><i class='ri ri-arrow-left-double-fill'></i></button>",
  nextArrow: "<button type='button' class='slick-next'><i class='ri ri-arrow-right-double-fill'></i></button>",
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll:3,
        infinite: true,

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll:1
      }
    }
  ]

});


// blog slider


$('.blog-slider').slick({
  dots: false,
   infinite: false,
      speed: 500, 
      cssEase: 'linear',
    margin:20,
  padding: 0,
  arrows: true,
  slidesPerRow: 2.4,
  rows: 1,
  arrows:false, 
  slidesToShow: 2.4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll:3,
        infinite: true,

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll:1
      }
    }
  ]

});
$(".btns-slider .prev-btn").click(function () {
  $(".blog-slider").slick("slickPrev");
});

$(".btns-slider .next-btn").click(function () {
  $(".blog-slider").slick("slickNext");
});
$(".btns-slider .prev-btn").addClass("slick-disabled");
$(".blog-slider").on("afterChange", function () {
  if ($(".slick-prev").hasClass("slick-disabled")) {
    $(".btns-slider .prev-btn").addClass("slick-disabled");
  } else {
    $(".btns-slider .prev-btn").removeClass("slick-disabled");
  }
  if ($(".slick-next").hasClass("slick-disabled")) {
    $(".btns-slider .next-btn").addClass("slick-disabled");
  } else {
    $(".btns-slider .next-btn").removeClass("slick-disabled");
  }
});

// product-slider
 
$('.slider-main').slick({
  slidesToShow: 1,
  arrows: false,
  asNavFor: '.slider-nav',
  vertical: true,
  autoplay: false,
  verticalSwiping: true,
  centerMode: true
});

$('.slider-nav').slick({
  slidesToShow: 4,
  asNavFor: '.slider-main',
  vertical: true,
  focusOnSelect: true,
  autoplay: false,
  centerMode: true
});

$(window).on('resize orientationchange', function() {
  if ($(window).width() > 1200) {
    $('.slider-nav').slick('unslick');
    $('.slider-nav').slick({
      slidesToShow: 4,
      asNavFor: '.slider-main',
      vertical: true,
      focusOnSelect: true,
      autoplay: false,
      centerMode: true
    });
  }
});


//fancybox

  // add all to same gallery
  $(".product-slider .slider-main a").attr("data-fancybox","mygallery");
   
	$(".product-slider .slider-main a").fancybox();


// mega menu


$('.mega-dropdown.dropdown').on('show.bs.dropdown', function() {
 
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
});
// Add slideUp animation to Bootstrap dropdown when collapsing.
$('.mega-dropdown.dropdown').on('hide.bs.dropdown', function() {
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
 
});


//select option 

$(".selectBox").on("click", function(e) {
  e.preventDefault();
  $(this).toggleClass("show");
  var dropdownItem = e.target;
  var container = $(this).find(".selectBox-value");
  container.text(dropdownItem.text);
  $(dropdownItem)
    .addClass("active")
    .siblings()
    .removeClass("active");
});


//demande devis 

$('.minus').click(function () {
  var $input = $(this).parent().find('input');
  var count = parseInt($input.val()) - 1;
  count = count < 1 ? 1 : count;
  $input.val(count);
  $input.change();
  return false;
});
$('.plus').click(function () {
  var $input = $(this).parent().find('input');
  $input.val(parseInt($input.val()) + 1);
  $input.change();
  return false;
});


      $(".demande-devis").click(function(){
          $(".right-block.visible").fadeOut(function() {
              $(".right-block.devis").fadeIn();
          });
      });

      $(".close-btn, .btn-clean").click(function(){
          $(".right-block.devis").fadeOut(function() {
              $(".right-block.visible").fadeIn();
          });
      });










 // google map


 

var responsiveZoom = (window.innerWidth < 768) ? 6.75 : 7.75;

function initMap() {
  var myLatlng = new google.maps.LatLng(50.7974444, 4.48544);
  var mapOptions = {
    styles: [
      {
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "elementType": "labels.icon",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#616161"
          }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "featureType": "administrative.country",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#00338D"
          },
          {
            "visibility": "on"
          },
          {
            "weight": 2
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
          {
           "color": "#bdbdbd"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ffffff"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#757575"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dadada"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#616161"
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#bbdefb"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      }
    ],
    zoom: responsiveZoom,
    minZoom: 6,
    maxZoom: 17,
    zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.DEFAULT
    },
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    scrollwheel: false,
    panControl: false,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    overviewMapControl: false,
    rotateControl: false
  };
  var map = new google.maps.Map(
    document.getElementById("map-canvas"),
    mapOptions
  );

  // paris
  var markerGPParis = new google.maps.Marker({
    position: new google.maps.LatLng(50.846759, 4.352446),
    map: map,
    title: "Click here for grand paris details",
    icon: "/assets/images/map-pin.svg"
  });
  google.maps.event.addListener(markerGPParis, "click", function() {
    hideInfo();
    showInfo(".paris");
    map.panTo(this.getPosition());
    map.setZoom(16);
  });

  // Normandie
  var markerGPNormandie = new google.maps.Marker({
    position: new google.maps.LatLng(51.221296, 4.399885),
    map: map,
    title: "Click here for  Normandie details",
    icon: "/assets/images/map-pin.svg"
  });
  google.maps.event.addListener(markerGPNormandie, "click", function() {
    hideInfo();
    showInfo(".normandie");
    map.panTo(this.getPosition());
    map.setZoom(16);
  });
 
}

function showInfo(selector) {
  document.querySelector(selector).classList.add("shown");
  document.querySelector("#map-canvas").classList.add("zoomed");
 
}

function hideInfo() {
  if (document.querySelector(".shown")) {
    document.querySelector(".shown").classList.remove("shown");
  }
  document.querySelector("#map-canvas").classList.remove("zoomed");
 
}




});

 