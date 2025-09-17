<?php
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();


if (isset($_POST['image'])) {
	$data = $_POST['image'];
	$nombreOriginal = $_POST['nombre'];
	$tipo = $_POST['tipo'];
	$imagenActual = $_POST['imgActual'];

	if ($tipo == 1) {
		$prefix = "th_";
	} else if ($tipo == 2) {
		$prefix = "bg_";
	} else if ($tipo == 3) {
		$prefix = "sl_";
	}

	// Procesa el nombre
	$porciones = explode(".", $nombreOriginal);
	$largo = count($porciones);

	$nombreFinal = "";

	if ($largo > 2) {
		for ($i = 0; $i < ($largo - 1); $i++) {
			$nombreFinal .= $porciones[$i];
		}
	} else {
		$nombreFinal .= $nombreFinal . $porciones[0];
	}
	$Uploads = new Archivo;
	$strImg = $Uploads->renameImageBlob($nombreFinal);
	//Fin proceso Nombre

	//Proceso de cragdo de Imagen
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	$image_name = '../assets/post-temp/' . $prefix . $strImg . '.jpg';
	file_put_contents($image_name, $data);
	//Fin del proceso de carga de imágenes

	//Proceso de borrado y carga

	if ($imagenActual == "nd") {
		// Caso 1: Es la primera imagen que se carga.
		// 1 - Se guarda un registro en la tabla temporal
		$imagen = $prefix . $strImg . ".jpg";

		/*$arrData[0] = $imagen;
		$arrData[1] = $tipo;
		//Inserta el registro
		$query = "INSERT INTO contximag_temp (cxi_imagen,cxi_tipo) VALUES (?,?)";
		$intIdRegistro = $objContenido->insertContenido($link,$arrData,$query);*/

		$arrData[0] = ['value' => $imagen, 'tipo' => 'AN'];
		$arrData[1] = ['value' => $tipo, 'tipo' => 'AN'];


		$query = "INSERT INTO contximag_temp (cxi_imagen,cxi_tipo) VALUES (?,?)";
		$intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);
	} else {
		// Caso 2: Ya se cargaron otras imagenes.
		// 1 - Se consulta si exiten en la tabla temporal
		$query = "SELECT * FROM contximag_temp WHERE cxi_imagen='" . $imagenActual . "'";
		$rsCont = $objContenido->getAllContenido($link, $query);
		$intQtyRecords = $rsCont->rowCount();
		if ($intQtyRecords > 0) {
			// Si existe:
			// 1 - Borrar imagen de la carpeta temporal
			// 2 - Borrar registro de tabla temporal
			// 3 - Se guarda un registro en la tabla temporal

			//Borrar Imagen
			$target_path = "../assets/post-temp/" . $imagenActual;
			$Uploads->deleteFile($target_path);

			//Borrar registro
			$query = "DELETE FROM contximag_temp WHERE cxi_imagen = '" . $imagenActual . "'";
			$rsCont = $objContenido->getAllContenido($link, $query);

			//Inserta el registro
			$imagen = $prefix . $strImg . ".jpg";

			$arrData[0] = ['value' => $imagen, 'tipo' => 'AN'];
			$arrData[1] = ['value' => $tipo, 'tipo' => 'AN'];


			$query = "INSERT INTO contximag_temp (cxi_imagen,cxi_tipo) VALUES (?,?)";
			$intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);
		}
	}

	$return = array();

	//Carga Base de datos temporal
	$return = [
		"STATUS" => "ok",
		"IMAGE" => $image_name
	];

	echo json_encode($return);
}
