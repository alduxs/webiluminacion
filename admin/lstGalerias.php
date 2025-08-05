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



$query = "SELECT *
		FROM galerias
		ORDER BY gal_publicada DESC,gal_nombre ASC";
$rsCont = $objContenido->getAllContenido($link, $query);
$intQtyRecords = $rsCont->rowCount();

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _CONST_DOMINIO_ ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _CONST_DOMINIO_ ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _CONST_DOMINIO_ ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo _CONST_DOMINIO_ ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo _CONST_DOMINIO_ ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                        <form role="search" class="navbar-form-custom" action="lstGalerias.php?seccion=propiedades" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" placeholder="Buscar galería..." class="form-control" name="buscar" id="buscar">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <h2>Listar Galerias</h2>
                    <ol class="breadcrumb">
                        <li><a href="home.php?seccion=inicio">Home</a></li>
                        <li><a href="#">Galerias</a></li>
                        <li class="active"><strong>Listar galerias</strong></li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">

                    <?php if (isset($_POST["buscar"]) && $_POST["buscar"] != NULL) { ?>



                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <form name="frm" method="post" action="svGalerias.php">
                                        <input type="hidden" name="intIdRegistro" value="" />
                                        <input type="hidden" name="strDb" value="" />
                                        <input type="hidden" name="intPage" value="" />
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
                                                    <th>Nombre</th>
                                                    <th>Publicada</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $intCounter = 0; ?>
                                                <?php if (count($arrayIndices) > 0) { ?>
                                                    <?php for ($i = 0; $i < count($arrayIndices); $i++) {
                                                        $query = "SELECT *
																	FROM galerias g
																	WHERE g.gal_id = " . $arrayIndices[$i];
                                                        $rsCont = $objContenido->getAllContenido($link, $query);
                                                        $arrContenido = $rsCont->fetch(PDO::FETCH_BOTH);
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $arrContenido["gal_nombre"]; ?></td>
                                                            <td><?php if ($arrContenido["gal_publicada"] == 0) { ?><a href="#" class="btn btn-default btn-circle"><i class="fa fa-check"></i></a><?php } else { ?><a href="#" class="btn btn-info btn-circle"><i class="fa fa-check"></i></a><?php } ?></td>

                                                            <td class="tooltip-demo">
                                                                <a href="updGalerias.php?seccion=galerias&id=<?php echo $arrContenido["gal_id"]; ?>&intPage=<?php echo $intPage ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></a>
                                                                <a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["gal_id"] ?>','galerias',<?php echo $intPage ?>);" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php $intCounter++; ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="4">No hay registros para mostrar.</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <form name="frm" method="post" action="svGalerias.php">
                                        <input type="hidden" name="intIdRegistro" value="" />
                                        <input type="hidden" name="strDb" value="" />
                                        <input type="hidden" name="intPage" value="" />
                                        <input type="hidden" name="strOperacion" value="D" />
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Publicada</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $intCounter = 0; ?>
                                                <?php if ($intQtyRecords > 0) { ?>
                                                    <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                                                        <tr>
                                                            <td><?php echo $arrContenido["gal_nombre"]; ?></td>
                                                            <td><?php if ($arrContenido["gal_publicada"] == 0) { ?><a href="#" class="btn btn-default btn-circle"><i class="fa fa-check"></i></a><?php } else { ?><a href="#" class="btn btn-info btn-circle"><i class="fa fa-check"></i></a><?php } ?></td>

                                                            <td class="tooltip-demo">
                                                                <a href="updGalerias.php?seccion=galerias&id=<?php echo $arrContenido["gal_id"]; ?>&intPage=<?php echo $intPage ?>" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i></a>
                                                                <a href="javascript:;" onclick="delRegistro('<?php echo $arrContenido["gal_id"] ?>','galerias',<?php echo $intPage ?>);" class="btn btn-primary btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="fa fa-trash-o"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php $intCounter++; ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="4">No hay registros para mostrar.</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
                
            </div>
            <div class="footer">
                <div>&copy; 2014 - <?php echo date("Y") ?></div>
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
        function delRegistro(pIdRegistro, strDb, intPage) {
            if (!window.confirm("Esta seguro que desea borrar este registro?")) {
                return;
            } else {
                document.frm.intIdRegistro.value = pIdRegistro;
                document.frm.strDb.value = strDb;
                document.frm.intPage.value = intPage;
                document.frm.submit();
            }
        }
    </script>
</body>

</html>