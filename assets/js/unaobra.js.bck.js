let imgenPrincipal = document.getElementById("imagen-principal");
let linklupa = document.getElementById("linklupa");
const ancho = imgenPrincipal.clientWidth;
const alto = ancho / 1.56;
imgenPrincipal.style.height = alto + "px";
/* UNA OBRA - GALERIA */
let thumbs = document.querySelectorAll(".imagen-thumb");

let anchoThumb = thumbs[0].clientWidth;
let altoThumb = anchoThumb; // 30px for gap

thumbs.forEach((thumb) => {
  thumb.style.height = altoThumb + "px";
  thumb.addEventListener("click", function () {
    console.log(altoThumb);

    let imagenString = this.style.backgroundImage;
    let indiceDelUltimoSlash = imagenString.split("/");
    let cadena = indiceDelUltimoSlash[5];

    let resultado = cadena.slice(0, -2);

    linklupa.href = "../../assets/galerias/big/" + resultado + "";

    imgenPrincipal.style.backgroundImage =
      'url("../../assets/galerias/med/' + resultado + '")';

  });
});


Fancybox.bind("[data-fancybox]", {
  // Your custom options
});