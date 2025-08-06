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
switch ($strOperacion) {
    case 'I':
        //

        $arrData[0] = ['value' => $_POST["nombre"], 'tipo' => 'AN'];
        $arrData[1] = ['value' => $_POST["localidad"], 'tipo' => 'AN'];
        if($_POST["descripcion"]!=""){
            $arrData[2] = ['value' => $_POST["descripcion"], 'tipo' => 'TH2'];
        } else {
            $arrData[2] = ['value' => $_POST["descripcion"], 'tipo' => 'TH2', 'validar' => 0];
        }
        
        $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'NU'];
        $arrData[4] = ['value' => $_POST["destacada"], 'tipo' => 'NU'];
        $arrData[5] = ['value' => 0, 'tipo' => 'NU'];
        $arrData[6] = ['value' => $_POST["galeria"], 'tipo' => 'NU'];

        $query = "INSERT INTO obras (obra_nombre,obra_localidad,obra_desc,obra_publicada,obra_dest,obra_orden,obras_galeria) VALUES (?,?,?,?,?,?,?)";
        $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

        break;

    case 'U':
        //
        $idPost = $_POST["id"];

        $arrData[0] = ['value' => $_POST["nombre"], 'tipo' => 'AN'];
        $arrData[1] = ['value' => $_POST["localidad"], 'tipo' => 'AN'];
        if($_POST["descripcion"]!=""){
            $arrData[2] = ['value' => $_POST["descripcion"], 'tipo' => 'TH2'];
        } else {
            $arrData[2] = ['value' => $_POST["descripcion"], 'tipo' => 'TH2', 'validar' => 0];
        }
        $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'NU'];
        $arrData[4] = ['value' => $_POST["destacada"], 'tipo' => 'NU'];
        $arrData[5] = ['value' => 0, 'tipo' => 'NU'];
        $arrData[6] = ['value' => $_POST["galeria"], 'tipo' => 'NU'];
        $arrData[7] = ['value' => $idPost, 'tipo' => 'NU'];
        //

        $query = "UPDATE obras SET obra_nombre = ?,obra_localidad = ?,obra_desc = ?,obra_publicada = ?,obra_dest = ?,obra_orden = ?,obras_galeria = ? WHERE obra_id = ?";
        $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);

        break;

    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];

        $query = "DELETE FROM obras WHERE obra_id = ".$idPost;
        $rsCont = $objContenido->getAllContenido($link,$query);
        //
        break;
}
//
header("Location: lstObras.php?seccion=obras");
