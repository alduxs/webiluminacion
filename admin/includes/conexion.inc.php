<?php // Fichero con los datos de conexion a la BBDD
function Conectarse()
{

	$db_host="localhost"; // Host al que conectar, habitualmente es el 'localhost'
	$db_nombre="c0080296_apos"; // Nombre de la Base de Datos que se desea utilizar
	$db_user="c0080296_apos"; // Nombre del usuario con permisos para acceder
	$db_pass="seSOga14mu"; // Contraseña de dicho usuario

	/*$db_host="internal-db.s215870.gridserver.com"; // Host al que conectar, habitualmente es el 'localhost'
	$db_nombre="db215870_pensarcom"; // Nombre de la Base de Datos que se desea utilizar
	$db_user="db215870_unr"; // Nombre del usuario con permisos para acceder
	$db_pass="RiG4N!tM4rC0!.87"; // Contraseña de dicho usuario*/



	try {
    	$link = new PDO('mysql:host='.$db_host.';dbname='.$db_nombre, $db_user, $db_pass);
    	return $link;
	} catch (PDOException $e) {
		print "Error: " . $e->getMessage() . "<br/>";
		die();
	}
}
?>
