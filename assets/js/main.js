let map;
let btnHamburger = document.getElementById("bt-hamburger");
let menu = document.getElementById("menu");
let velo = document.getElementById("velo");
let bloqueServicio = document.querySelectorAll(".bloque-servicio");
let btMasInfo = document.getElementById("masinfo");

function initMap() {
  var styledMapType = new google.maps.StyledMapType([
    {
      featureType: "water",
      elementType: "geometry.fill",
      stylers: [
        {
          color: "#d3d3d3",
        },
      ],
    },
    {
      featureType: "transit",
      stylers: [
        {
          color: "#808080",
        },
        {
          visibility: "off",
        },
      ],
    },
    {
      featureType: "road.highway",
      elementType: "geometry.stroke",
      stylers: [
        {
          visibility: "on",
        },
        {
          color: "#b3b3b3",
        },
      ],
    },
    {
      featureType: "road.highway",
      elementType: "geometry.fill",
      stylers: [
        {
          color: "#ffffff",
        },
      ],
    },
    {
      featureType: "road.local",
      elementType: "geometry.fill",
      stylers: [
        {
          visibility: "on",
        },
        {
          color: "#ffffff",
        },
        {
          weight: 1.8,
        },
      ],
    },
    {
      featureType: "road.local",
      elementType: "geometry.stroke",
      stylers: [
        {
          color: "#d7d7d7",
        },
      ],
    },
    {
      featureType: "poi",
      elementType: "geometry.fill",
      stylers: [
        {
          visibility: "on",
        },
        {
          color: "#ebebeb",
        },
      ],
    },
    {
      featureType: "administrative",
      elementType: "geometry",
      stylers: [
        {
          color: "#a7a7a7",
        },
      ],
    },
    {
      featureType: "road.arterial",
      elementType: "geometry.fill",
      stylers: [
        {
          color: "#ffffff",
        },
      ],
    },
    {
      featureType: "road.arterial",
      elementType: "geometry.fill",
      stylers: [
        {
          color: "#ffffff",
        },
      ],
    },
    {
      featureType: "landscape",
      elementType: "geometry.fill",
      stylers: [
        {
          visibility: "on",
        },
        {
          color: "#efefef",
        },
      ],
    },
    {
      featureType: "road",
      elementType: "labels.text.fill",
      stylers: [
        {
          color: "#696969",
        },
      ],
    },
    {
      featureType: "administrative",
      elementType: "labels.text.fill",
      stylers: [
        {
          visibility: "on",
        },
        {
          color: "#737373",
        },
      ],
    },
    {
      featureType: "poi",
      elementType: "labels.icon",
      stylers: [
        {
          visibility: "off",
        },
      ],
    },
    {
      featureType: "poi",
      elementType: "labels",
      stylers: [
        {
          visibility: "off",
        },
      ],
    },
    {
      featureType: "road.arterial",
      elementType: "geometry.stroke",
      stylers: [
        {
          color: "#d6d6d6",
        },
      ],
    },
    {
      featureType: "road",
      elementType: "labels.icon",
      stylers: [
        {
          visibility: "off",
        },
      ],
    },
    {},
    {
      featureType: "poi",
      elementType: "geometry.fill",
      stylers: [
        {
          color: "#dadada",
        },
      ],
    },
  ]);

  var myLatLng = {
    lat: -32.93980814071115,
    lng: -60.6394189755427,
  };


  var map = new google.maps.Map(document.getElementById("map"), {
    center: myLatLng,
    zoom: 15,
    disableDefaultUI: true,
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
  });

  //Associate the styled map with the MapTypeId and set it to display.
  map.mapTypes.set("styled_map", styledMapType);
  map.setMapTypeId("styled_map");
}

btnHamburger.addEventListener("click", function () {

  if( menu.classList.contains("open-menu")) {
    velo.style.display = 'none';
  } else {
    velo.style.display = 'block';
  }
  
  menu.classList.toggle("open-menu");
  this.classList.toggle("open");

});


bloqueServicio.forEach((bloque) => {
  bloque.addEventListener("click", function () {
    let parrafo = this.querySelector("p");
    parrafo.classList.toggle("p-active");
    this.classList.toggle("backcolor");
  });
});

btMasInfo.addEventListener("click", function () {
  
  document.getElementById("par3").classList.remove("phide");
  document.getElementById("par4").classList.remove("phide");
  
});