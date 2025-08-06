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
////
$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM obras WHERE obra_id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
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
          <h2>Modificar Propiedad</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Propiedad</a></li>
            <li class="active"><strong>Modificar propiedad</strong></li>
          </ol>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form action="svObras.php" method="post" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="U" />
                  <input name="id" type="hidden" id="id" value="<?php echo $intIdCont ?>">

                  <!-- Título -->
                  <div class="form-group col-xs-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $arrCont["obra_nombre"] ?>">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Localidad -->
                  <div class="form-group col-xs-12">
                    <label for="localidad">Localidad</label>
                    <input type="text" name="localidad" id="localidad" class="form-control" value="<?php echo $arrCont["obra_localidad"] ?>">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Descripción -->
                  <div class="form-group col-xs-12">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" rows="12" id="descripcion" class="form-control"><?php echo $arrCont["obra_desc"] ?></textarea>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Publicado -->
                  <div class="form-group col-xs-12">
                    <label for="publicada">Publicada</label>
                    <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="publicada" <?php if (!(strcmp($arrCont["obra_publicada"], 1))) {echo "checked=\"checked\"";} ?>> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="publicada" type="radio" value="0" <?php if (!(strcmp($arrCont["obra_publicada"], 0))) {echo "checked=\"checked\"";} ?>> <i></i> No </label></p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                   <!-- Destacada -->
                  <div class="form-group col-xs-12">
                    <label for="destacada">Destacada</label>
                    <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="destacada" <?php if (!(strcmp($arrCont["obra_dest"], 1))) {echo "checked=\"checked\"";} ?>> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="destacada" type="radio" value="0" <?php if (!(strcmp($arrCont["obra_dest"], 0))) {echo "checked=\"checked\"";} ?>> <i></i> No </label></p>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Galerías -->
                  <div class="form-group col-xs-12">
                    <label for="galeria">Galería</label>
                    <select name="galeria" class="select2_demo_3 form-control" id="galeria">

                      <option></option>
                      <?php
                      $query = "SELECT * FROM galerias WHERE gal_publicada = 1";
                      $rsCont = $objContenido->getAllContenido($link, $query);
                      ?>
                      <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrContenido["gal_id"] ?>" <?php if ($arrContenido["gal_id"] == $arrCont["obras_galeria"]) { ?>selected<?php } ?>><?php echo $arrContenido["gal_nombre"] ?></option>
                      <?php } ?>
                    </select>
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

  <script src="js/customup.js?v=4"></script>
  <script src="js/decimal.js"></script>

  <script>
    $(document).ready(function() {
      $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
      });


    });

    tinymce.init({
      selector: "textarea",
      theme: "modern",
      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
      image_advtab: true,
      relative_urls: false,
      content_css: '/labsonew/admin/css/css.css',
      style_formats: [

        {
          title: 'Imagen Derecha',
          selector: 'p',
          classes: 'imgpost'
        }
      ],

    });


  </script>
  
</body>

</html>
<?php
$link = null;
?>