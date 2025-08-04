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
$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM login WHERE id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

//)
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
  <link href="css/style.css" rel="stylesheet">
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
          <h2>Modificar usuario</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Usuarios</a></li>
            <li class="active"><strong>Modificar usuario</strong></li>
          </ol>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">

              <div class="ibox-content">
                <form method="post" action="svUsuarios.php" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="U" />
                  <input name="id" type="hidden" id="id" value="<?php echo $intIdCont ?>">
                  <input type="hidden" name="intPageId" value="<?php echo $intPageId ?>" />
                  <input name="intIdRol" type="hidden" id="intIdRol" value="1">


                  <div class="form-group col-xs-12">
                    <label for="strUsuario">Usuario</label>
                    <input name="strUsuario" type="text" maxlength="50"  class="form-control" minlength="4" id="strUsuario" value="<?php echo $arrCont["usuario"] ?>" />
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>
                  <div class="form-group col-xs-12">
                    <label for="strPassword">Contraseña</label>
                    <input type="password" name="strPassword" value="" class="form-control" minlength="4" id="strPassword" />
                  </div>

                  <div class="form-group col-xs-12">
                    <label for="strPassword2">Repetir Contraseña</label>
                    <input type="password" name="strPassword2" value="" class="form-control" minlength="4" id="strPassword2" />

                    <div class="alert alert-danger" id="alert1" style="display:none;margin-bottom:0px; margin-top:20px;">
                      Las contraseñas no coinciden.
                    </div>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="nombre">Nombre y Apellido</label>
                    <input name="nombre" type="text" maxlength="50" id="nombre" class="form-control" value="<?php echo $arrCont["nombre"] ?>" />
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>
                  

                  <div class="form-group col-xs-12">
                    <label for="tipo">Tipo de Usuario</label>
                    <select name="tipo" class="form-control">
                      <option value="1" <?php if ($arrCont["tipo"] == 1) { ?>selected<?php } ?>>Administrador</option>
                      <option value="2" <?php if ($arrCont["tipo"] == 2) { ?>selected<?php } ?>>Usuario</option>
                    </select>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>


                  <input name="oldPas" type="hidden" id="oldPas" value="<?php echo $arrCont["contrasenia"] ?>">
                  <div class="form-group text-center">
                    <input name="agregar" type="submit" class="btn btn-primary" id="agregar" value="Enviar">
                    <a href="lstUsuarios.php?seccion=usuarios" class="btn btn-primary">Cancelar</a>
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

  <!-- iCheck -->
  <script src="js/plugins/iCheck/icheck.min.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="js/inspinia.js"></script>
  <script src="js/plugins/pace/pace.min.js"></script>

  <!-- Script de página -->
  <script>
    $(document).ready(function() {
      $("#agregar").click(function(event) {
        var valor1 = $("#strPassword").val();
        var valor2 = $("#strPassword2").val();
        if (valor1 != valor2) {
          event.preventDefault();
          $("#alert1").show();
          $("#strPassword").val("");
          $("#strPassword2").val("");

          $("#strPassword").parent().addClass("has-error");
          $("#strPassword2").parent().addClass("has-error");

        }
      });

      $("#strPassword,#strPassword2").keyup(function() {
        $("#alert1").hide();
        $("#strPassword").parent().removeClass("has-error");
        $("#strPassword2").parent().removeClass("has-error");
      });

      $('.i-checks').iCheck({
           checkboxClass: 'icheckbox_square-green',
          radioClass: 'iradio_square-green',
      });
    });
  </script>
</body>

</html>