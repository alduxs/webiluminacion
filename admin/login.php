<?php
	include_once('../config/classnew.inc.php');
	include_once('../config/conexion.inc.php');
	include_once('../config/funciones.inc.php');
	//
	$link = Conectarse();
	//
	$objContenido = new General();
	
	// Recibo las variables
	$strEmail = $_POST["strEmail"];
	$strPassword = md5($_POST["strPassword"]);
	
	
	$arrData2 = [['value'=> $strEmail,'tipo'=> 'AN'],['value'=> $strPassword,'tipo'=> 'AN']];
	
	$query = 'SELECT * FROM login WHERE usuario = ? AND contrasenia = ?';
	$Login = $objContenido->getOneContenido($link,$arrData2,$query);
	
	//
	if($Login->rowCount() <= 0){
		header("Location: " . _CONST_BACKEND_ . "index.php?idErr=1");
	}
	else{
		//var_dump(_CONST_BACKEND_EP_);exit();
		session_start();
		$arrUser = $Login->fetch(PDO::FETCH_BOTH);
		$_SESSION["strUsername"] = $strEmail;
		$_SESSION["strName"] = $arrUser["nombre"];
		$_SESSION["id"] = $arrUser["id"];
		$_SESSION["tipo"] = $arrUser["tipo"];
		$_SESSION["imagen"] = "nd";
		header("Location: " . _CONST_BACKEND_ . "home.php?seccion=inicio&lang=es");
		$arrUser = null;
		$link = null;
	}
?>
