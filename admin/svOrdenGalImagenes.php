<?PHP
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');

$link = Conectarse();
//
		$orden = $_POST["orden"];
		$arrayId = explode(',',$orden);
		$contador = 1;
		$pos = 1;
		$largo=count($arrayId);
		$succes=0;

		$objContenido = new General();
		$data = "";

		if ($largo!=1) {
			while($contador<=$largo){

				/*$arrData[0] = $arrayId[$contador-1];
				$arrData[1] = $pos;*/

				$query = "UPDATE galeriasximag SET gxi_posicion = ".$pos." WHERE gxi_id = ".$arrayId[$contador-1];
				$rsCont = $objContenido->getAllContenido($link,$query);


				if ($intIdRegistro){
					$succes++;
					if($contador == 1){
						$data .= $contador;
					} else {
						$data .= ",".$contador;
					}

				} else {
					$succes--;;
				}
				$contador++;
				$pos++;
			}
			echo $data;

		} else {
			echo("<span class='griss10'>No se ha modificado el orden.</span>");
		}
    //
