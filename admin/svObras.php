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

        $arrData[0] = ['value' => $_POST["idpropiedad"], 'tipo' => 'AN'];
        $arrData[1] = ['value' => $_POST["tipopropiedad"], 'tipo' => 'AN', 'tipopropiedad' => 0];
        $arrData[2] = ['value' => $_POST["zona"], 'tipo' => 'AN'];
        $arrData[3] = ['value' => (float)$_POST["mcuadrados"], 'tipo' => 'AN'];
        $arrData[4] = ['value' => (float)$_POST["valormcuadrados"], 'tipo' => 'AN'];
        $arrData[5] = ['value' => (float)$_POST["valorpropiedad"], 'tipo' => 'AN'];
        $arrData[6] = ['value' => $_POST["publicada"], 'tipo' => 'NU'];

        $query = "INSERT INTO propiedades (prop_id,prop_tipo,prop_zona,prop_mt2,prop_valor_mt2,prop_valor,prop_publicada) VALUES (?,?,?,?,?,?,?)";
        $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

        break;

    case 'U':
        //
        $idPost = $_POST["id"];

        $arrData[0] = ['value' => $_POST["idpropiedad"], 'tipo' => 'AN'];
        $arrData[1] = ['value' => $_POST["tipopropiedad"], 'tipo' => 'AN', 'tipopropiedad' => 0];
        $arrData[2] = ['value' => $_POST["zona"], 'tipo' => 'AN'];
        $arrData[3] = ['value' => (float)$_POST["mcuadrados"], 'tipo' => 'AN'];
        $arrData[4] = ['value' => (float)$_POST["valormcuadrados"], 'tipo' => 'AN'];
        $arrData[5] = ['value' => (float)$_POST["valorpropiedad"], 'tipo' => 'AN'];
        $arrData[6] = ['value' => $_POST["publicada"], 'tipo' => 'NU'];
        $arrData[7] = ['value' => $idPost, 'tipo' => 'NU'];
        //

        $query = "UPDATE propiedades SET prop_id = ?,prop_tipo = ?,prop_zona = ?,prop_mt2 = ?,prop_valor_mt2 = ?,prop_valor = ?,prop_publicada = ? WHERE id = ?";
        $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);

        break;

    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];

        $query = "DELETE FROM propiedades WHERE id = ".$idPost;
        $rsCont = $objContenido->getAllContenido($link,$query);
        //
        break;
}
//
header("Location: lstPropiedad.php?seccion=propiedades");
