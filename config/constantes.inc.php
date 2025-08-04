<?php
// CONSTANTES
define('_CONST_PAGINADO_', "20");
define('_CONST_PAGINADO_P_', "60");

$host = $_SERVER["HTTP_HOST"];
$ruri = substr($_SERVER["REQUEST_URI"], 0, -1);

if ($host == "localhost" || $host == "192.168.100.16") {
	$urlweb = "http://" . $host . "/webiluminacion/"; // Pagina Principal
	$urladmin = "http://" . $host . "/webiluminacion/admin/"; // Admin Pagina Principal

} else {
	$urlweb = "https://" . $host; // Pagina Principal
	$urladmin = "https://" . $host . "/admin"; // Admin Pagina Principal

};



define('_CONST_DOMINIO_', $urlweb);
define('_CONST_BACKEND_', $urladmin);

define('_CONST_TITLE_', "Web Iluminación");
define('_CONST_CONTACT_', "contacto@2ocho.com.ar");

//ARCHIVOS REVISTAS
// Path
define('_CONST_PATH_CONTENIDO_ARCH_', "../assets/archivos/");

//IMAGENES INFO
// Path
define('_CONST_PATH_CONTENIDO_IMAGEN_', "../assets/imagenes/post/");
define('_CONST_PATH_CONTENIDO_IMAGEN_TH_', "../assets/imagenes/post/th/");
define('_CONST_PATH_CONTENIDO_IMAGEN_NW_', "../assets/imagenes/news/");

// Tamaños
define('_CONST_TAMANIO_H_I_', "2000");
define('_CONST_TAMANIO_V_I_', "609");
define('_CONST_TAMANIO_H_TH_', "400");
define('_CONST_TAMANIO_V_TH_', "239");
define('_CONST_TAMANIO_H_NW_', "350");
define('_CONST_TAMANIO_V_NW_', "350");

//IMAGENES REVISTAS
// Path
define('_CONST_PATH_IMAGEN_REVISTA_', "../assets/imagenes/revistas/");
// Tamaños
define('_CONST_TAMANIO_H_R_', "252");
define('_CONST_TAMANIO_V_R_', "300");

// IMAGENES BENEFICIOS
// Path
define('_CONST_PATH_IMAGEN_BENEFICIOS_', "../assets/imagenes/beneficios/");
// Tamaño
define('_CONST_TAMANIO_H_BEN_', "150");
define('_CONST_TAMANIO_V_BEN_', "150");

//SLIDES
// Path
define('_CONST_PATH_CONTENIDO_SLIDE_', "../assets/imagenes/");

define('_CONST_TH_SLIDE_A_', "1903");
define('_CONST_TV_SLIDE_A_', "582");

define('_CONST_TH_SLIDE_B_', "700");
define('_CONST_TV_SLIDE_B_', "584");

// IMAGENES PLANES
// Path
define('_CONST_PATH_CONTENIDO_PLANES_', "../assets/imagenes/");

// Tamaño
define('_CONST_TAMANIO_H_PLAN_', "400");
define('_CONST_TAMANIO_V_PLAN_', "258");

//IMAGENES INFO MODAL
define('_CONST_PATH_M_IMAGEN_', "../assets/imagenes/infomodal/");
define('_CONST_IMAGEN_TAMANIO_H_', "1000");
define('_CONST_IMAGEN_TAMANIO_V_', "800");

/*----------------------------------------------------------------------------*/

//IMAGENES NOTICIAS NEWSLETTER
define('_CONST_IMAGEN_NNEWS_', "../assets/imagenes/news/");
define('_CONST_IMAGEN_NNEWS_W_', "508");
define('_CONST_IMAGEN_NNEWS_H_', "332");

//IMAGENES INFO
define('_CONST_TAMANIO_I_', "700");

//CONCURSO
define('_CONST_CONCURSO_', "../assets/concurso/");

/*----------------------------------------------------------------------------*/

//CONTACTO
define('_CONST_CONTACTO_', "archivos-contacto/");
define('_CONST_CONTACTO2_', "../archivos-contacto/");

/*----------------------- EL PUNTO ---------------------------------------------*/
//ESPACIOS - GENERAL
define('_CONST_PATH_IMG_ESPACIOS_', "../assets/espacios/");

//ESPACIOS - ICONOS
define('_CONST_IMG_ESP_ICONO_UNICO_', "55");

//ESPACIOS - NOMBRE EN TEXTO
define('_CONST_IMG_ESP_NOMBRE_UNICO_', "43");

//ESPACIOS - PLANO
define('_CONST_IMG_ESP_PLANO_', "1000");

//ESPACIOS - SLIDES
define('_CONST_PATH_IMG_ESPACIOS_SLIDES_', "../assets/espacios/slides/");

//ACTIVIDADES - GENERAL
define('_CONST_PATH_IMG_ACTIVIDADES_', "../assets/actividades/");

//ACTIVIDADES - IMÁGENES
define('_CONST_IMG_ACT_IMAG_', "800");

//SLIDES - GENERAL
define('_CONST_PATH_IMG_SLIDES_', "../assets/slides/");

//IMAGENES PARA GALERIA  BIG
define('_PATH_GAL_BIG_IMG_', "../assets/galerias/big/");
define('_IMG_GAL_BIG_WIDTH_', "1200");
define('_IMG_GAL_BIG_HEIGHT_', "720");

//IMAGEN PROPIEDADES MED
define('_PATH_GAL_MED_IMG_', "../assets/galerias/med/");
define('_IMG_GAL_MED_WIDTH_', "900");
define('_IMG_GAL_MED_HEIGHT_', "575");

//IMAGEN PROPIEDADES SMALL
define('_PATH_GAL_SMALL_IMG_', "../assets/galerias/small/");
define('_IMG_GAL_SMALL_WIDTH_', "500");
define('_IMG_GAL_SMALL_HEIGHT_', "320");

/*----------------------- LIBERI ---------------------------------------------*/

//IMAGEN POST NOVEDADES SMALL
define('_CONST_PATH_IMG_NOV_SMALL_', "../assets/novedades/small/");
define('_CONST_IMG_NOV_SMALL_WIDTH_', "800");
define('_CONST_IMG_NOV_SMALL_HEIGHT_', "284");

//IMAGEN POST NOVEDADES BIG
define('_CONST_PATH_IMG_NOV_BIG_', "../assets/novedades/big/");
define('_CONST_IMG_NOV_BIG_WIDTH_', "1300");
define('_CONST_IMG_NOV_BIG_HEIGHT_', "1140");

//IMAGEN POST DESTACADOS SMALL
define('_CONST_PATH_IMG_DEST_SMALL_', "../assets/destacados/small/");
define('_CONST_IMG_DEST_SMALL_WIDTH_', "500");
define('_CONST_IMG_DEST_SMALL_HEIGHT_', "242");

//IMAGEN POST DESTACADOS BIG
define('_CONST_PATH_IMG_DEST_BIG_', "../assets/destacados/big/");
define('_CONST_IMG_DEST_BIG_WIDTH_', "1200");
define('_CONST_IMG_DEST_BIG_HEIGHT_', "630");

//ICONOS BENEFICIOS PATH
define('_CONST_PATH_IC_BENEF_', "../assets/beneficios/");

//ICONO NEGRO
define('_CONST_IC_B_WIDTH_', "50");
define('_CONST_IC_B_HEIGHT_', "50");

//ICONO BLANCO
define('_CONST_IC_W_WIDTH_', "94");
define('_CONST_IC_W_HEIGHT_', "94");

//ICONOS COBERTURA PATH
define('_CONST_PATH_IC_COB_', "../assets/coberturas/");

//ICONO NEGRO
define('_CONST_IC_COB_I_WIDTH_', "90");
define('_CONST_IC_COB_I_HEIGHT_', "90");

//ICONO BLANCO
define('_CONST_IC_COB_P_WIDTH_', "110");
define('_CONST_IC_COB_P_HEIGHT_', "110");
