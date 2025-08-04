<?php
include_once("includes/checkLogin.inc.php");
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"], 'AN'); //
//
switch ($strOperacion) {
  case 'I':

    $arrData[0] = ['value' => $_POST["nombre"], 'tipo' => 'AN'];
    $arrData[1] = ['value' => $_POST["strUsuario"], 'tipo' => 'AN'];
    $arrData[2] = ['value' => md5($_POST["strPassword"]), 'tipo' => 'AN'];
    $arrData[3] = ['value' => $_POST["tipo"], 'tipo' => 'NU'];

    $query = "INSERT INTO login (nombre,usuario,contrasenia,tipo) VALUES (?,?,?,?)";
    $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

    break;

  case 'U':
    //

    $idPost = $_POST["id"];

    $arrData[0] = ['value' => $_POST["nombre"], 'tipo' => 'AN'];
    $arrData[1] = ['value' => $_POST["strUsuario"], 'tipo' => 'AN'];

    if ($_POST["strPassword"] != "") {
      $arrData[2] = ['value' => md5($_POST["strPassword"]), 'tipo' => 'AN'];
    } else {
      $arrData[2] = ['value' => $_POST["oldPas"], 'tipo' => 'AN'];
    }
    $arrData[3] = ['value' => $_POST["tipo"], 'tipo' => 'NU'];
    $arrData[4] = ['value' => $idPost, 'tipo' => 'NU'];
    //

    $query = "UPDATE login SET nombre = ?,usuario = ?,contrasenia = ?,tipo = ? WHERE id = ?";
    $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);

    break;

  case 'D':
    //Recibo variables
    $idPost = $_POST["intIdRegistro"];

    $query = "DELETE FROM login WHERE id = " . $idPost;
    $rsCont = $objContenido->getAllContenido($link, $query);
    //
    //
    break;
}
//
header("Location: lstUsuarios.php?seccion=usuarios&intPageId=$intPageId");
