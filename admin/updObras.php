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
$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM propiedades WHERE id = ?";
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
                <form action="svPropiedad.php" method="post" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="U" />
                  <input name="id" type="hidden" id="id" value="<?php echo $intIdCont ?>">
                  <input type="hidden" name="intPage" value="<?php echo $intPage ?>" />

                  <!-- Título -->
                  <div class="form-group col-xs-12">
                    <label for="idpropiedad">ID Propiedad</label>
                    <input type="text" name="idpropiedad" id="idpropiedad" class="form-control" value="<?php echo $arrCont["prop_id"] ?>">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Tipo de Propiedad -->
                  <div class="form-group col-xs-6">
                    <label for="tipopropiedad">Tipo de Propiedad</label>
                    <select name="tipopropiedad" class="select2_demo_3 form-control" id="tipopropiedad">

                      <option value="0">Selecionar tipo de propiedad</option>
                      <?php
                      $queryPost = "SELECT * FROM tipo_propiedad ORDER BY id ASC";
                      $rsPost = $objContenido->getAllContenido($link, $queryPost);
                      ?>
                      <?php while ($arrPost = $rsPost->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrPost["id"] ?>" <?php if ($arrPost["id"] == $arrCont["prop_tipo"]) { ?>selected<?php } ?>><?php echo $arrPost["tipo_prop_desc"] ?></option>
                      <?php } ?>
                    </select>
                  </div>


                  <!-- Zona -->
                  <div class="form-group col-xs-6">
                    <label for="zona">Zona</label>
                    <select name="zona" class="select2_demo_3 form-control" id="zona">

                      <option value="0">Selecionar zona</option>
                      <?php
                      $queryPost = "SELECT * FROM zonas ORDER BY zona_id ASC";
                      $rsPost = $objContenido->getAllContenido($link, $queryPost);
                      ?>
                      <?php while ($arrPost = $rsPost->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrPost["zona_id"] ?>" <?php if ($arrPost["zona_id"] == $arrCont["prop_zona"]) { ?>selected<?php } ?>><?php echo $arrPost["zona_desc"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Metros Cuadrados -->
                  <div class="form-group col-xs-6">
                    <label for="mcuadrados">Metros Cuadrados</label>
                    <input type="text" name="mcuadrados" id="mcuadrados" class="form-control input-cl" placeholder="Ingrese los metros cuadrados con dos decimales (ej. 1234,56)" value="<?php echo number_format($arrCont["prop_mt2"], 2, ',', '') ?>">
                    <p id="errorMessage1" style="color: red;" class="input-error"></p>
                  </div>

                  <!-- Valor Metro Cuadrado -->
                  <div class="form-group col-xs-6">
                    <label for="valormcuadrados">Valor del Metro Cuadrado</label>
                    <input type="text" name="valormcuadrados" id="valormcuadrados" class="form-control input-cl" placeholder="Ingrese el valor de los metros cuadrados con dos decimales (ej. 1234,56)" value="<?php echo number_format($arrCont["prop_valor_mt2"], 2, ',', '') ?>">
                    <p id="errorMessage2" style="color: red;" class="input-error"></p>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Valor Propiedad -->
                  <div class="form-group col-xs-12">
                    <label for="valorpropiedad">Valor de la Propiedad</label>
                    <input type="text" name="valorpropiedad" id="valorpropiedad" class="form-control input-cl" placeholder="Ingrese el valor de la propiedad con dos decimales (ej. 1234,56)" value="<?php echo number_format($arrCont["prop_valor"], 2, ',', '') ?>">
                    <p id="errorMessage3" style="color: red;" class="input-error"></p>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Publicado -->
                  <div class="form-group col-xs-12">
                    <label for="publicada">Publicada</label>
                    <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="publicada" <?php if (!(strcmp($arrCont["prop_publicada"], 1))) {echo "checked=\"checked\"";} ?>> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="publicada" type="radio" value="0" <?php if (!(strcmp($arrCont["prop_publicada"], 0))) {echo "checked=\"checked\"";} ?>> <i></i> No </label></p>
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


  </script>
  
</body>

</html>
<?php
$link = null;
?>