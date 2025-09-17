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
	$urlweb = "https://" . $host."/"; // Pagina Principal
	$urladmin = "https://" . $host . "/admin"; // Admin Pagina Principal

};



define('_CONST_DOMINIO_', $urlweb);
define('_CONST_BACKEND_', $urladmin);

define('_CONST_TITLE_', "Web Iluminación");
define('_CONST_CONTACT_', "contacto@2ocho.com.ar");

//IMAGENES PARA GALERIA  BIG
define ('_PATH_GAL_BIG_IMG_', "../assets/galerias/big/");
define ('_IMG_GAL_BIG_WIDTH_', "1200");
define ('_IMG_GAL_BIG_HEIGHT_', "720");

//IMAGEN PROPIEDADES MED
define ('_PATH_GAL_MED_IMG_', "../assets/galerias/med/");
define ('_IMG_GAL_MED_WIDTH_', "900");
define ('_IMG_GAL_MED_HEIGHT_', "575");

//IMAGEN PROPIEDADES SMALL
define ('_PATH_GAL_SMALL_IMG_', "../assets/galerias/small/");
define ('_IMG_GAL_SMALL_WIDTH_', "350");
define ('_IMG_GAL_SMALL_HEIGHT_', "350");

//SLIDES
// Path
define('_CONST_PATH_SLD_IMG_', "../assets/slides/");

define('_CONST_TH_SLIDE_A_', "1903");
define('_CONST_TV_SLIDE_A_', "582");

define('_CONST_TH_SLIDE_B_', "700");
define('_CONST_TV_SLIDE_B_', "584");


