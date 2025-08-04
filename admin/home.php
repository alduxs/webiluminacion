<?php
include_once("includes/checkLogin.inc.php");
include_once('../config/classnew.inc.php');
include_once('../config/conexion.inc.php');
include_once('../config/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="wrapper">
    <?php include_once('includes/menu.inc.php'); ?>
    <div id="page-wrapper" class="gray-bg">
      <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
          </div>
          <ul class="nav navbar-top-links navbar-right">
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>

            </li>
          </ul>
        </nav>
      </div>
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-12">
          <h2>Inicio</h2>


        </div>
      </div>
      <div class="wrapper wrapper-content">
        <div class="middle-box text-center animated fadeInRightBig">
          Bienvenido al administrador de contenidos de la
          <h3>Web <?php echo _CONST_TITLE_ ?></h3>


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
</body>

</html>