let contenedorSlide = document.getElementById("contenedor-slide");
let fCarouselSlide = document.querySelectorAll(".f-carousel__slide");
let inicial = 0;

alturaContSlide = contenedorSlide.offsetHeight;
anchoContSlide = contenedorSlide.offsetWidth;

fCarouselSlide.forEach((slide) => {
  slide.style.height = alturaContSlide + "px";
  slide.style.width = anchoContSlide + "px";
});



Carousel(
  document.getElementById("myCarousel"),
  {
    Autoplay: {
      timeout: 5000,
    },
  },
  {
    Autoplay,
  }
).init();
