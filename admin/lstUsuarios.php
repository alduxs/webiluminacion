<?php
include_once("includes/checkLogin.inc.php");
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
//
$link = Conectarse();
/*$objContenido = new Usuarios();
$rsCont = $objContenido->getAllUsers($link);
//
if (isset($_GET["intPageId"])) {
	$intPageId = $_GET["intPageId"];
} else {
	$intPageId="";
}
//
if ($intPageId == "") {
	$arrData[0] = 0;
	$intPage = 1;
} else {
	$arrData[0] = ((sanInt($_GET["intPageId"]) - 1) * _CONST_PAGINADO_);
	$intPage = sanInt($_GET["intPageId"]);
}
//
$arrData[1] = _CONST_PAGINADO_;
//ALMACENO EL TOTAL DE REGISTROS
$intQtyRecords = $rsCont->rowCount();
//
//CALCULO EL TOTAL DE PAGINAS
$intQtyPages = ceil($intQtyRecords / _CONST_PAGINADO_);
//HAGO NUEVAMENTE LA CONSULTA PERO YA CON EL LIMIT SETEADO
$rsCont = $objContenido->getAllUsersPaginados($link,$arrData);*/

$objContenido = new General();

$query = "SELECT *
FROM login
ORDER BY nombre ASC";
$rsCont = $objContenido->getAllContenido($link, $query);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
</head>

<body>
	<div id="wrapper">
		
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<?php include_once('includes/columnaTop.inc.php'); ?>
					<?php include_once('includes/columnaLeft.inc.php'); ?>
				</ul>
			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li>
					</ul>
				</nav>
			</div>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-sm-12">
					<h2>Listar Usuarios</h2>
					<ol class="breadcrumb">
						<li><a href="home.php?seccion=inicio">Home</a></li>
						<li><a href="#">Usuarios</a></li>
						<li class="active"><strong>Listar usuarios</strong></li>
					</ol>
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content">
								<form name="frm" method="post" action="svUsuarios.php">
									<input type="hidden" name="intIdRegistro" value="" />
									<input type="hidden" name="strDb" value="" />
									<input type="hidden" name="intPageId" value="" />
									<input type="hidden" name="strOperacion" value="D" />
									<table id="table"
										data-toggle="table"
										data-search="true"
										data-show-toggle="true"
										data-show-fullscreen="true"
										data-show-columns="true"
										data-show-columns-toggle-all="true"
										data-detail-view="false"
										data-locale="es-AR"
										data-show-export="true"
										data-click-to-select="true"
										data-show-columns="true"
										data-show-pagination-switch="true"
										data-pagination="true"
										data-sortable="tue"
										data-id-field="id"
										data-page-list="[10, 25, 50, 100, all]"
										data-show-footer="false"
										class="table table-striped">
										<thead>
											<tr>
												<th data-field="id">ID</th>
												<th data-field="usuario" data-sortable="true">Usuario</th>
												<th data-field="nombre" data-sortable="true">Nombre Completo</th>
												<th data-field="categoria" data-sortable="true">Tipo</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
										
												<?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
													<tr>
														<td><?php echo $arrContenido["id"]; ?></td>
														
														<td><?php echo $arrContenido["usuario"]; ?></td>
														<td><?php echo $arrContenido["nombre"]; ?> </td>
														<td><?php echo $arrContenido["tipo"]; ?></td>

														<td class="tooltip-demo">
															
															<a href="updUsuarios.php?seccion=usuarios&id=<?php echo $arrContenido["id"]; ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></a>
															<a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["id"]?>','usuarios')" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
												<?php } ?>
											
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
	
			</div>
			<div class="footer">
				<div>&copy; 2014 - <?php echo date ("Y") ?></div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="contenido-modal">

			</div>
		</div>
	</div>

	<!-- Mainly scripts -->
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Table -->
	<script src="js/tableExport.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script src="js/bootstrap-table-locale-all.js"></script>
	<script src="js/extensions/export/bootstrap-table-export.min.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="js/inspinia.js"></script>
	<script src="js/plugins/pace/pace.min.js"></script>
	<script type="text/javascript">
	function delRegistro(pIdRegistro,strDb,intPageId){
		if (!window.confirm("Esta seguro que desea borrar este registro?")){
			return;
		}
		else{
			document.frm.intIdRegistro.value = pIdRegistro;
			document.frm.strDb.value = strDb;
			document.frm.submit();
		}
	}
	function openModal(idregistro) {
			$.ajax({
					method: "POST",
					url: "detalleRegistro.php",
					data: {
						idregistro: idregistro,
						tipo: 3 //1:Profesosres 2:Alumnos 3:Usuarios
					}
				})
				.done(function(data) {
					$("#contenido-modal").html(data);
					$('#myModal').modal();
				});

		}
	</script>
</body>
</html>
