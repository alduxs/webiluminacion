<?PHP
include_once("../../includes/checkLogin.inc.php");
include_once('../../includes/classnew.inc.php');
include_once('../../includes/conexion.inc.php');
include_once('../../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"],'AN');
//
switch ($strOperacion) {

  case 'U':
  //

 
  if ($_POST["strPassword"]!="") {
    $pass = md5($_POST["strPassword"]);
  } else {
    $pass = $_POST["oldPas"];
  }

  $idUser = $_POST["id"];
  
  $arrData4 = [
    ['value'=> $_POST["strNombre"],'tipo'=> 'AN'],
    ['value'=> $_POST["strUsuario"],'tipo'=> 'AN'],
    ['value'=> $pass,'tipo'=> 'AN'],
    ['value'=> $_POST["id"],'tipo'=> 'NU']
  ];
  //
  $query = "UPDATE login SET nombre = ?, usuario = ?, contrasenia = ? WHERE id = ?";
  $intIdRegistro = $objContenido->updateContenido($link, $arrData4, $query);

  break;

}
//
header("Location: updPerfil.php?seccion=perfil&id=$idUser");
?>
