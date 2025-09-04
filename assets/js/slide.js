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
    on: {
      change: (instance) => {
        let idSelectorPrev = `hl${inicial}`;
        let idSelectorPrev2 = `dt${inicial}`;
        document.getElementById(idSelectorPrev).style.display="none";
        //document.getElementById(idSelectorPrev2).style.display="none";
        // Current page
        const pageIndex = instance.getPageIndex();

        let idSelectorNext = `hl${pageIndex}`;
        let idSelectorNext2 = `dt${pageIndex}`;
        document.getElementById(idSelectorNext).style.display="block";
        //document.getElementById(idSelectorNext2).style.display="block";
        inicial = pageIndex;
        
      },
    },
  },
  {
    Autoplay,
  }
).init();
