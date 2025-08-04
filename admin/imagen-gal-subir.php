<?php
//namespace Verot\Upload;
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
include("includes/class.upload.php");

$id_galeria = $_GET["id_galeria"];

$Uploads = new iUpload();

$status = "";

$handle = new \Verot\Upload\Upload($_FILES['uploadfile']);
$strImg = $Uploads->renameImage($_FILES['uploadfile']['name']);

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
		$arrData[0] = '';
		$arrData[1] = $id_galeria;
		$arrData[2] = $id_post;
		$arrData[3] = $imagen;
		$arrData[4] = $posicion;

		$InsertImagen = new General();
		$query = "INSERT INTO galeriasximag (gxi_id_gal_temp, gxi_id_gal, gxi_imagen, gxi_posicion) VALUES (?,?,?,?)";
		$intIdRegistro = $InsertImagen->insertContenido($link, $arrData, $query);
		echo $imagen . ":" . $intIdRegistro;
	} else {
		echo '  Error: ' . $handle->error . '';
	}
	$handle->Clean();
}
//
