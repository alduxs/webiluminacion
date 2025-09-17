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
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"], 'AN');
//
$Uploads = new Archivo();
//
switch ($strOperacion) {
    case 'I':
        //

        //Imagen Rectangular
        if ($_POST["imageNewRect"] != "nd") {

            //Consulta en la Tabla Temporal
            $imagenRect = $_POST["imageNewRect"];
            $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
            $rsCont = $objContenido->getAllContenido($link, $query);
            $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
            $intQtyRecords = $rsCont->rowCount();

            if ($intQtyRecords > 0) {

                $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
                $arrData[1] = ['value' => $imagenRect, 'tipo' => 'AN'];
                $arrData[2] = ['value' => $_POST["posicion"], 'tipo' => 'AN'];
                $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'AN'];

                $query = "INSERT INTO slides (slides_titulo,slides_imagen,slides_posicion,slides_publicado) VALUES (?,?,?,?)";
                $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

                //Borra el registro de la Tabla Temporal
                $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
                $rsCont = $objContenido->getAllContenido($link, $query);

                //Mueve el archivo
                rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
            }
        } else {
            $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
            $arrData[1] = ['value' => $imagenRect, 'tipo' => 'AN'];
            $arrData[2] = ['value' => $_POST["posicion"], 'tipo' => 'AN'];
            $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'AN'];

            $query = "INSERT INTO slides (slides_titulo,slides_imagen,slides_posicion,slides_publicado) VALUES (?,?,?,?)";
            $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);
        }

        break;

    case 'U':
        //
        $idPost = $_POST["id"];

        //Imgen Rectangular
        if ($_POST["iRectStat"] != 0) {

            if ($_POST["iRectStat"] == 1) {
                //Consulta en la Tabla Temporal
                $imagenRect = $_POST["imageNewRect"];
                $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
                $rsCont = $objContenido->getAllContenido($link, $query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {

                    $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
                    $arrData[1] = ['value' => $imagenRect, 'tipo' => 'AN'];
                    $arrData[2] = ['value' => $_POST["posicion"], 'tipo' => 'AN'];
                    $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'AN'];
                    $arrData[4] = ['value' => $idPost, 'tipo' => 'AN'];


                    $query = "UPDATE slides SET slides_titulo = ?, slides_imagen = ?,slides_posicion = ?,slides_publicado = ? WHERE slides_id = ?";
                    $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);


                    //Borra el registro de la Tabla Temporal
                    $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
                    $rsCont = $objContenido->getAllContenido($link, $query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
                }
            } else if ($_POST["iRectStat"] == 2) {

                $imagenRect = $_POST["imageNewRect"];
                $imagenOldRect = $_POST["imageOldRect"];


                //Borra Archivo de carpeta
                $target_path = _CONST_PATH_SLD_IMG_;
                $Uploads->deleteFile($target_path . $imagenOldRect); //Borra Archivo


                $query = "SELECT * FROM contximag_temp WHERE cxi_imagen ='" . $imagenRect . "'";
                $rsCont = $objContenido->getAllContenido($link, $query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {

                    $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
                    $arrData[1] = ['value' => $imagenRect, 'tipo' => 'AN'];
                    $arrData[2] = ['value' => $_POST["posicion"], 'tipo' => 'AN'];
                    $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'AN'];
                    $arrData[4] = ['value' => $idPost, 'tipo' => 'AN'];


                    $query = "UPDATE slides SET slides_titulo = ?, slides_imagen = ?,slides_posicion = ?,slides_publicado = ? WHERE slides_id = ?";
                    $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);

                    //Borra el registro de la Tabla Temporal
                    $query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenRect . "'";
                    $rsCont = $objContenido->getAllContenido($link, $query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
                }
            }
        } else {
            $imagenOldRect = $_POST["imageOldRect"];

            $arrData[0] = ['value' => $_POST["titulo"], 'tipo' => 'AN'];
            $arrData[1] = ['value' => $imagenOldRect, 'tipo' => 'AN'];
            $arrData[2] = ['value' => $_POST["posicion"], 'tipo' => 'AN'];
            $arrData[3] = ['value' => $_POST["publicada"], 'tipo' => 'AN'];
            $arrData[4] = ['value' => $idPost, 'tipo' => 'AN'];


            $query = "UPDATE slides SET slides_titulo = ?, slides_imagen = ?,slides_posicion = ?,slides_publicado = ? WHERE slides_id = ?";
            $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);
        };


        break;

    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];

        // Borramos la Imagen de la obra
        
        $target_path_bg = _CONST_PATH_SLD_IMG_;

        $query = "SELECT * FROM slides WHERE slides_id =" . $idPost;
        $rsCont = $objContenido->getAllContenido($link, $query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        $intQtyRecords = $rsCont->rowCount();

        if ($arrCont["slides_imagen"] != "nd") {
            $Uploads->deleteFile($target_path_bg . $arrCont["slides_imagen"]); //Borra Archivo
        }

        // Borro el registro de la DB
        $query = "DELETE FROM slides WHERE slides_id = " . $idPost;
        $rsCont = $objContenido->getAllContenido($link, $query);
        //
        break;
}
//
header("Location: lstSlides.php?seccion=slides");
