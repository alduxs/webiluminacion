<?PHP
include_once("includes/checkLogin.inc.php");
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"], 'AN');
//
$Uploads = new Archivo();
//
//
switch ($strOperacion) {
  case 'I':
    //
    

    $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
    $arrData[1] = ['value' => $_POST["publicado"], 'tipo' => 'NU'];

    $query = "INSERT INTO galerias (gal_nombre,gal_publicada) VALUES (?,?)";
    $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

    //Cambiar id de galeriasximagenes
    $id_galeria = $_POST["id_galeria"];
    $queryg = "SELECT * FROM galeriasximag WHERE gxi_id_gal_temp = " . $id_galeria;
    $rsContg = $objContenido->getAllContenido($link, $queryg);
    $intQtyRecords = $rsContg->rowCount();
    if ($intQtyRecords > 0) {
      $queryu = "UPDATE galeriasximag SET gxi_id_gal = " . $intIdRegistro . " WHERE gxi_id_gal_temp = " . $id_galeria;
      $intIdRegistrou = $objContenido->getAllContenido($link, $queryu);
    }

    break;

  case 'U':
    // BUSCO LOS DATOS DEL CONTENIDO A MODIFICAR
    // PARA VERIFICAR SI SE CAMBIARON LAS IMAGENES
    $idPost = $_POST["id"];
  
    $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
    $arrData[1] = ['value' => $_POST["publicado"], 'tipo' => 'NU'];
    $arrData[2] = ['value' => $idPost, 'tipo' => 'NU'];
    //
    $query = "UPDATE galerias SET  gal_nombre = ?,gal_publicada = ? WHERE gal_id = ?";
    $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);


    //Cambiar id de galeriasximagenes
    $id_galeria = $_POST["id_galeria"];

    $queryg = "SELECT * FROM galeriasximag WHERE gxi_id_gal = " . $id_galeria;
    $rsContg = $objContenido->getAllContenido($link, $queryg);
    $intQtyRecords = $rsContg->rowCount();

    if ($intQtyRecords > 0) {
      $queryu = "UPDATE galeriasximag SET gxi_id_gal = " . $idPost . " WHERE gxi_id_gal = " . $id_galeria;
      $intIdRegistrou = $objContenido->getAllContenido($link, $queryu);
    }


    break;

  case 'D':

    //Recibo variables
    $idPost = $_POST["intIdRegistro"];

    $BorrarImagen = new Archivo();

    $target_pathSM = _PATH_GAL_SMALL_IMG_;
    $target_pathMD = _PATH_GAL_MED_IMG_;
    $target_pathBG = _PATH_GAL_BIG_IMG_;

    //Cambiar id de galeriasximagenes
    $queryg = "SELECT * FROM galeriasximag WHERE gxi_id_gal = " . $idPost;
    $rsContg = $objContenido->getAllContenido($link, $queryg);
    $intQtyRecords = $rsContg->rowCount();

    if ($intQtyRecords > 0) {
      while ($arrContenido = $rsContg->fetch(PDO::FETCH_BOTH)) {

        $BorrarImagen->deleteFile($target_pathSM . $arrContenido["gxi_imagen"]);
        $BorrarImagen->deleteFile($target_pathMD . $arrContenido["gxi_imagen"]);
        $BorrarImagen->deleteFile($target_pathBG . $arrContenido["gxi_imagen"]);

        $query = "DELETE FROM galeriasximag WHERE gxi_id = ".$arrContenido["gxi_id"];
        $rsCont = $objContenido->getAllContenido($link,$query);
      }
    }

    $query = "DELETE FROM galerias WHERE gal_id = ".$idPost;
    $rsCont = $objContenido->getAllContenido($link,$query);
    //
    break;
}
header("Location: lstGalerias.php?seccion=galerias");
?>