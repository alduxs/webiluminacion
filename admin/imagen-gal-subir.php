<?php
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
include_once('../config/class.upload.php');

$link = Conectarse();

$objContenido = new General();

$id_galeria = $_GET["id_galeria"];

$Uploads = new Archivo();

$status = "";

$handle = new \Verot\Upload\Upload($_FILES['uploadfile']);
$strImg = $Uploads->renameFile($_FILES['uploadfile']['name']);

$target_pathSM = _PATH_GAL_SMALL_IMG_;
$target_pathMD = _PATH_GAL_MED_IMG_;
$target_pathBG = _PATH_GAL_BIG_IMG_;

if (isset($_GET["id_post"])) {
	$id_post = $_GET["id_post"];
} else {
	$id_post = 0;
}
$posicion = 0;

// SI SELECCIONO UNA IMAGEN HAGO EL UPLOAD

if ($handle->uploaded) {

		// IMAGEN CHICA
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'gimg_';
		$handle->image_resize            = true;
		$handle->image_ratio_crop        = true;
		$handle->image_x                 = _IMG_GAL_SMALL_WIDTH_;
		$handle->image_y                 = _IMG_GAL_SMALL_HEIGHT_;
		$handle->Process($target_pathSM);

		// IMAGEN MEDIANA
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'gimg_';
		$handle->image_resize            = true;
		$handle->image_ratio_crop        = true;
		$handle->image_x                 = _IMG_GAL_MED_WIDTH_;
		$handle->image_y                 = _IMG_GAL_MED_HEIGHT_;
		$handle->Process($target_pathMD);

		// IMAGEN GRANDE
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'gimg_';
		$handle->image_resize            = true;
		$handle->image_ratio_y           = true;
		$handle->image_x                 =_IMG_GAL_BIG_WIDTH_;
		$handle->Process($target_pathBG);

	


	if ($handle->processed) {
		$imagen = $handle->file_dst_name;
		/*$arrData[0] = '';
		$arrData[1] = $id_galeria;
		$arrData[2] = $id_post;
		$arrData[3] = $imagen;
		$arrData[4] = $posicion;*/

		$arrData[0] = ['value' => $id_galeria, 'tipo' => 'AN'];
        $arrData[1] = ['value' => $id_post, 'tipo' => 'AN', 'tipopropiedad' => 0];
        $arrData[2] = ['value' => $imagen, 'tipo' => 'AN'];
        $arrData[3] = ['value' => $posicion, 'tipo' => 'AN'];


        $query = "INSERT INTO galeriasximag (gxi_id_gal_temp, gxi_id_gal, gxi_imagen, gxi_posicion) VALUES (?,?,?,?)";
        $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

		echo $imagen . ":" . $intIdRegistro;
	} else {
		echo '  Error: ' . $handle->error . '';
	}
	$handle->Clean();
}
//
