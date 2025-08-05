<?php
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
include_once('../config/class.upload.php');

$link = Conectarse();
$objContenido = new General();

$BorrarImagen = new Archivo();

$intIdCont = $_GET["id_imagen"];

$target_pathSM = _PATH_GAL_SMALL_IMG_;
$target_pathMD = _PATH_GAL_MED_IMG_;
$target_pathBG = _PATH_GAL_BIG_IMG_;

$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM galeriasximag WHERE gxi_id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

$BorrarImagen->deleteFile($target_pathSM.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathMD.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathBG.$arrCont["gxi_imagen"]);

$query = "DELETE FROM galeriasximag WHERE gxi_id = ".$intIdCont;
$rsCont = $objContenido->getAllContenido($link,$query);


?>
