<?php // Fichero con los datos de conexion a la BBDD
function Conectarse()
{

	$host = $_SERVER["HTTP_HOST"];
	if ($host == "localhost:91") {
		$db_host = "172.18.0.2"; // Host al que conectar, habitualmente es el 'localhost'
		$db_nombre = "cajawebdesa_db"; // Nombre de la Base de Datos que se desea utilizar
		$db_user = "root"; // Nombre del usuario con permisos para acceder
		$db_pass = "Crube1981++"; // Contraseña de dicho usuario
	} else if ($host == "desa.cajaprevision.org") {
		$db_host = "localhost"; // Host al que conectar, habitualmente es el 'localhost'
		$db_nombre = "sitecontentdb_desa"; // Nombre de la Base de Datos que se desea utilizar
		$db_user = "cajadesa"; // Nombre del usuario con permisos para acceder
		$db_pass = "CyberCaja2024"; // Contraseña de dicho usuario
	} else {
		$db_host = "localhost"; // Host al que conectar, habitualmente es el 'localhost'
		$db_nombre = "c2850795_ilum"; // Nombre de la Base de Datos que se desea utilizar
		$db_user = "c2850795_ilum"; // Nombre del usuario con permisos para acceder
		$db_pass = "11ROtezevi"; // Contraseña de dicho usuario
	}

	try {
		$link = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nombre, $db_user, $db_pass);
		return $link;
	} catch (PDOException $e) {
		print "Error: " . $e->getMessage() . "<br/>";
		die();
	}
}
