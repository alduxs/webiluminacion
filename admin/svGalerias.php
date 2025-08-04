<?PHP
include_once("includes/checkLogin.inc.php");
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
include_once('includes/class.inc.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');
//
$link = Conectarse();
//
$strOperacion = sanStrHtmlSpecial($_POST["strOperacion"]);
//
if (isset($_POST["intPage"])) {
  $intPage = $_POST["intPage"];
} else {
  $intPage = 1;
}
//
include("includes/class.upload.php");
//
date_default_timezone_set('America/Los_Angeles');
//
switch ($strOperacion) {
  case 'I':
    //
    $Uploads = new iUpload();

    $arrData[0] = '';
    $arrData[1] = sanStrHtml($_POST["titulo"]);
    $arrData[2] = sanInt($_POST["publicado"]);



    //
    $Insert_row = new General();
    $query = "INSERT INTO galerias (gal_nombre,gal_publicada) VALUES (?,?)";
    $intIdRegistro = $Insert_row->insertContenido($link, $arrData, $query);


    //Cambiar id de galeriasximagenes
    $id_galeria = $_POST["id_galeria"];
    $queryg = "SELECT * FROM galeriasximag WHERE gxi_id_gal_temp = " . $id_galeria;
    $rsContg = $Insert_row->getAllContenido($link, $queryg);
    $intQtyRecords = $rsContg->rowCount();
    if ($intQtyRecords > 0) {
      $queryu = "UPDATE galeriasximag SET gxi_id_gal = " . $intIdRegistro . " WHERE gxi_id_gal_temp = " . $id_galeria;
      $intIdRegistrou = $Insert_row->getAllContenido($link, $queryu);
    }


    break;

  case 'U':
    // BUSCO LOS DATOS DEL CONTENIDO A MODIFICAR
    // PARA VERIFICAR SI SE CAMBIARON LAS IMAGENES

    //
    $arrData[0] = sanInt($_POST["id"]);

    
    $Uploads = new iUpload();

    $arrData[1] = sanStrHtml($_POST["titulo"]);
    $arrData[2] = sanInt($_POST["publicado"]);
    //
    $Update_row = new General();
    $query = "UPDATE galerias SET   gal_nombre = ?,gal_publicada = ? WHERE gal_id = ?";
    $intIdRegistro = $Update_row->updateContenido($link, $arrData, $query);


    //Cambiar id de galeriasximagenes
    $id_galeria = $_POST["id_galeria"];

    $queryg = "SELECT * FROM galeriasximag WHERE gxi_id_gal = " . $id_galeria;
    $rsContg = $Update_row->getAllContenido($link, $queryg);
    $intQtyRecords = $rsContg->rowCount();

    if ($intQtyRecords > 0) {
      $queryu = "UPDATE galeriasximag SET gxi_id_gal = " . $arrData[0] . " WHERE gxi_id_gal = " . $id_galeria;
      $intIdRegistrou = $Update_row->getAllContenido($link, $queryu);
    }


    break;

  case 'D':

    //Recibo variables
    $arrData[0] = sanInt($_POST["intIdRegistro"]);
    $arrData[1] = sanStrHtmlSpecial($_POST["strDb"]);

    $target_pathSM = _PATH_GAL_SMALL_IMG_;
    $target_pathMD = _PATH_GAL_MED_IMG_;
    $target_pathBG = _PATH_GAL_BIG_IMG_;
    $BorrarImagen = new iUpload();
    $Update_row = new General();

    //Cambiar id de galeriasximagenes
    $queryg = "SELECT * FROM galeriasximag WHERE gxi_id_gal = " . $arrData[0];
    $rsContg = $Update_row->getAllContenido($link, $queryg);
    $intQtyRecords = $rsContg->rowCount();

    if ($intQtyRecords > 0) {
      while ($arrContenido = $rsContg->fetch(PDO::FETCH_BOTH)) {

        $BorrarImagen->deleteFile($target_pathSM . $arrContenido["gxi_imagen"]);
        $BorrarImagen->deleteFile($target_pathMD . $arrContenido["gxi_imagen"]);
        $BorrarImagen->deleteFile($target_pathBG . $arrContenido["gxi_imagen"]);

        $arrData2[0] = 0;
        $arrData2[1] = $arrContenido["gxi_id"];

        $query2 = "DELETE FROM galeriasximag WHERE gxi_id = ?";
        $intIdRegistro = $Update_row->deleteContenido($link, $arrData2, $query2);
      }
    }


    // Borro el registro de la DB
    $objRegistro = new ComonClases();
    $rsRegistro = $objRegistro->deleteRegistro($link, $arrData);
    //
    break;
}
//
header("Location: lstGalerias.php?seccion=galerias&intPage=$intPage");
