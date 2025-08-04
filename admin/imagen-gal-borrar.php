<?php
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$link = Conectarse();
include_once('includes/class.inc.php');
include ("includes/class.upload.php");

$arrData[0] = 0;
$arrData[1] = $_GET["id_imagen"];

$target_pathSM = _PATH_GAL_SMALL_IMG_;
$target_pathMD = _PATH_GAL_MED_IMG_;
$target_pathBG = _PATH_GAL_BIG_IMG_;

$Update_row = new General();
$query = "SELECT * FROM galeriasximag WHERE gxi_id = ?";
$rsCont = $Update_row->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);


$BorrarImagen = new iUpload();
$BorrarImagen->deleteFile($target_pathSM.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathMD.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathBG.$arrCont["gxi_imagen"]);


$query2 = "DELETE FROM galeriasximag WHERE gxi_id = ?";
$intIdRegistro = $Update_row->deleteContenido($link,$arrData,$query2);


?>
