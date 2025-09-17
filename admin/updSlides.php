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
$intIdCont = $_GET["id"];
//
$intPage = $_GET["intPage"];
//
$objCont = new General();
$query = "SELECT * FROM slides WHERE slides_id=" . $intIdCont;
$rsCont = $objCont->getAllContenido($link, $query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
//

?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/dropzone.css" />
  <link rel="stylesheet" href="css/cropper.css" />
  <link href="css/image.css" rel="stylesheet" type="text/css">
  <link href="css/estilos.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
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
          <h2>Modificar Slide</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Slides</a></li>
            <li class="active"><strong>Modificar slide</strong></li>
          </ol>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form action="svSlides.php" method="post" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="U" />
                  <input name="id" type="hidden" id="id" value="<?php echo $intIdCont ?>">
                  <input type="hidden" name="intPage" value="<?php echo $intPage ?>" />

                  
                  <!-- Título -->
                  <div class="form-group col-xs-12">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $arrCont["slides_titulo"] ?>">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

           

                  <!-- Imagen -->
                  <div class="row">
                   
                    <div class="col-md-8">
                    <h4>Imagen Principal (Relación 2,17:1 - Tamaño mínimo: 2000 px de ancho por 920 px de alto)</h4>
                      <div class="image_area3">
                          <label for="upload_image2">
                            <?php if($arrCont["slides_imagen"] != "nd"){ ?>
                              <img src="../assets/slides/<?php echo $arrCont["slides_imagen"]; ?>" id="uploaded_image2" class="img-responsive" />
                            <?php } else { ?>
                              <img src="img/imagen2.png" id="uploaded_image2"  height="175px" width="auto"/>
                            <?php }  ?>
                            <div class="overlay">
                              <div class="text">Cambiar Imagen</div>
                            </div>
                            <input type="file" name="image2" class="image" id="upload_image2" style="display:none" />
                            <?php if($arrCont["slides_imagen"] != "nd"){ ?>
                              <input type="hidden" name="imageOldRect" id="imageOldRect" value="<?php echo $arrCont["slides_imagen"]; ?>">
                            <?php } else { ?>
                              <input type="hidden" name="imageOldRect" id="imageOldRect" value="nd">
                            <?php }  ?>
                            <input type="hidden" name="imageNewRect" id="imageNewRect" value="nd">
                            <input type="hidden" name="iRectStat" id="iRectStat" value="0">
                          </label>
                      </div>
                    </div>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                 

                  <!-- Publicado -->
                  <div class="form-group col-xs-12">
                    <label for="publicada">Publicado</label>
                    <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="publicada" <?php if (!(strcmp($arrCont["slides_publicado"], 1))) { echo "checked=\"checked\""; } ?>> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="publicada" type="radio" value="0" <?php if (!(strcmp($arrCont["slides_publicado"], 0))) { echo "checked=\"checked\""; } ?>> <i></i> No </label></p></div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Título -->
                  <div class="form-group col-xs-12">
                    <label for="posicion">Posición</label>
                    <input type="text" name="posicion" id="posicion" class="form-control" value="<?php echo $arrCont["slides_posicion"] ?>">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>


                  <div class="form-group text-center">
                    <input name="agregar" type="submit" class="btn btn-primary" id="agregar" value="Enviar">
                  </div>
                </form>
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
  <!-- Custom and plugin javascript -->
  <script src="js/inspinia.js"></script>
  <script src="js/plugins/pace/pace.min.js"></script>
  <!-- Tinymce -->
  <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
  <!-- Data picker -->
  <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
  <script src="js/dropzone.js"></script>
  <script src="js/cropper.js"></script>
  <!-- iCheck -->
  <script src="js/plugins/iCheck/icheck.min.js"></script>

  <script src="js/customup-sl.js"></script>

  <script>
    $(document).ready(function() {
      $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
      });


      $('#data_1 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
      });

    });
    
  
  </script>
  <!-- *********************************** MODALS *********************************-->
  
  <!-- Modal imagen grande -->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">M 2 Crop Image Before Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-8">
                <img src="" id="sample_image2" />
              </div>
              <div class="col-md-4">
                <div class="preview2"></div>
                <div class="input-group" style="width: 80%;margin-bottom:10px;">
                  <div class="input-group-addon">Ancho</div>
                  <input type="text" class="form-control" id="ancho2" placeholder="0">
                  <div class="input-group-addon">px</div>
                </div>
                <div class="input-group" style="width: 80%;">
                  <div class="input-group-addon">Alto</div>
                  <input type="text" class="form-control" id="alto2" placeholder="0">
                  <div class="input-group-addon">px</div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="crop2" class="btn btn-primary">Crop</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- *********************************** FIN MODALS *********************************-->
</body>

</html>
<?php
$link = null;
?>