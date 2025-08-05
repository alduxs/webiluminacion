<?php
include_once("includes/checkLogin.inc.php");
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
//
$link = Conectarse();
//
$intIdCont = $_GET["id"];
//
$objContenido = new General();
//Seleciona la propiedad

$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM galerias WHERE gal_id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);


// Imagenes
$queryImag = "SELECT * FROM galeriasximag WHERE  gxi_id_gal = ? ORDER BY gxi_posicion ASC, gxi_id ASC";
$rsImag = $objContenido->getOneContenido($link,$arrData,$queryImag);

$queryImag2 = "SELECT * FROM galeriasximag WHERE  gxi_id_gal = ? ORDER BY gxi_posicion ASC, gxi_id ASC";
$rsImag2 = $objContenido->getOneContenido($link,$arrData,$queryImag2);
$intQtyRecordsImag2 = $rsImag2->rowCount();
$arrImagen2 = $rsImag2->fetch(PDO::FETCH_BOTH);



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
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<head>

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
                    <h2>Modificar Galería</h2>
                    <ol class="breadcrumb">
                        <li><a href="home.php?seccion=inicio">Home</a></li>
                        <li><a href="#">Galerías</a></li>
                        <li class="active"><strong>Modificar galería</strong></li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form action="svGalerias.php" method="post" enctype="multipart/form-data" name="form1">
                                    <input type="hidden" name="strOperacion" value="U" />
                                    <input name="id" type="hidden" id="id" value="<?php echo $intIdCont ?>">
                                    <input type="hidden" name="intPage" value="<?php echo $intPage ?>" />


                               

                                    <!-- Todos los paneles -->
                                    <div class="paneles-g">



                                        <!-- Título -->
                                        <div class="form-group col-xs-12">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $arrCont["gal_nombre"]; ?>">
                                        </div>
                                        <div class="hr-line-dashed col-xs-12"></div>

                                        <div class="col-xs-12">
                                            <h3 class="borderh3">Imágenes</h3>
                                        </div>

                                        <!-- Galeria de imagenes -->
                                        <div class="col-lg-12">
                                            <div class="ibox float-e-margins">
                                               
                                                <div class="ibox-content">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <p class="text-center"><input name="upload" type="submit" class="btn btn-primary" id="upload" value="Subir Imagen"></p>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="spiner-example" id="status">
                                                                <div class="sk-spinner sk-spinner-wave">
                                                                    <div class="sk-rect1"></div>
                                                                    <div class="sk-rect2"></div>
                                                                    <div class="sk-rect3"></div>
                                                                    <div class="sk-rect4"></div>
                                                                    <div class="sk-rect5"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Carga -->
                                                    <div class="tooltip-demo">
                                                        <div class="row" id="files">
                                                            <?php while ($arrImagen = $rsImag->fetch(PDO::FETCH_BOTH)) { ?>
                                                                <div class="col-xs-4 col-md-2 bloque" id="<?php echo $arrImagen["gxi_id"] ?>">
                                                                    <div class="bimagen">
                                                                        <img src="../assets/galerias/med/<?php echo $arrImagen["gxi_imagen"] ?>" class="img-responsive center-block">
                                                                        <div class="acciones">
                                                                            <button type="button" onclick="return borrarImagen('<?php echo $arrImagen["gxi_id"] ?>')" class="btn btn-primary btn-xs btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar Imagen"><i class="fa fa-trash-o"></i></button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!-- Fin carga -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin galeria de imagenes -->

                                        <input type="hidden" name="id_galeria" id="id_galeria" value="<?php echo $arrCont["gal_id"] ?>">

                                        <div class="hr-line-dashed col-xs-12"></div>


                                        <!-- Publicado -->
                                        <div class="form-group col-xs-12">
                                            <label for="publicado">Publicada</label>
                                            <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="publicado" <?php if ($arrCont["gal_publicada"] == 1) { ?>checked<?php } ?>> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="publicado" type="radio" value="0" <?php if ($arrCont["gal_publicada"] == 0) { ?>checked<?php } ?>> <i></i> No </label></p>
                                        </div>
                                        <div class="hr-line-dashed col-xs-12"></div>



                                        <div class="form-group text-center col-xs-12">
                                            <input name="agregar" type="submit" class="btn btn-primary" id="agregar" value="Enviar">
                                        </div>
                                </form>
                                <input name="orden" value="" type="hidden" id="orden">
                            </div>
                        </div>
                    </div>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <!-- Tinymce -->
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>
    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <!-- AJAX Upload -->
    <script type="text/javascript" src="js/ajaxupload.3.5.js"></script>

    <script>
        var cityCircle;
        var marker;
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });

        tinymce.init({
            selector: '#texto',
            plugins: 'paste',
            toolbar1: "bold italic pastetext",
            /*menu: {
              happy: {title: 'Happy', items: 'paste'}
            },*/
            menubar: 'happy'
        });

        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {
                allow_single_deselect: true
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "95%"
            }
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        /* Carga mediante AJAX de Imagenes en la galería */
        var numeroRandom = <?php echo $intIdCont ?>;
        <?php if ($intQtyRecordsImag2 > 0) { ?>
            var galeria = <?php echo $arrImagen2["gxi_id_gal"] ?>;
        <?php } else { ?>
            var galeria = Math.floor((Math.random() * 100000) + 1);
        <?php } ?>

        jQuery(function() {
            var btnUpload = $('#upload');
            var status = $('#status');
            new AjaxUpload(btnUpload, {
                action: 'imagen-gal-subir.php?id_post=' + numeroRandom + '&id_galeria=' + galeria,
                name: 'uploadfile',
                onSubmit: function(file, ext) {
                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                        // extension is not allowed
                        status.text('Only JPG, PNG or GIF files are allowed');
                        return false;
                    }
                    status.fadeIn('slow');
                },
                onComplete: function(file, response) {
                    //On completion clear the status
                    status.fadeOut('slow');
                    var divide = response.split(":");
                    var image = divide[0];
                    var id = divide[1];
                    $('<div class="col-xs-4 col-md-2 bloque" id="' + id + '"></div>').appendTo('#files').html('<div class="bimagen"><img src="../assets/galerias/med/' + image + '" class="img-responsive center-block" /><div class="acciones"><button type="button" onclick="return borrarImagen(' + id + ')" class="btn btn-primary btn-xs btn-bitbucket" data-toggle="tooltip" data-placement="bottom" title="Borrar Imagen"><i class="fa fa-trash-o"></i></button> </div></div>');
                }
            });
        });
        /* Eliminar una imagen */
        function borrarImagen(id) {

            if (confirm('Desea borrar la imagen?')) {
                $.getScript('imagen-gal-borrar.php?id_imagen=' + id);

                $('#' + id + '').remove();
                return false;
            }
        };

        $(function() {

            $("#files").sortable({
                update: function() {
                    var result = $("#files").sortable('toArray');
                    $("#orden").attr("value", result);
                    var resulta = $("#orden").attr("value");
                    $.post("svOrdenGalImagenes.php", {
                            orden: resulta
                        })
                        .done(function(data) {
                            var n = $("#files .bloque").length;
                            var divide = resulta.split(",");
                            console.log(n);
                            var number;

                        });
                }
            });

        });


   
    </script>
</body>

</html>
<?php
$link = null;
?>