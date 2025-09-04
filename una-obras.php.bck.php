<?php
include_once('config/conexion.inc.php');
include_once('config/funciones.inc.php');
include_once('config/classnew.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$intIdCont = $_GET["id"];
//
$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM obras WHERE obra_id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
//IMAGEN DETACADA
/*$queryImag = "SELECT * FROM galeriasximag WHERE  gxi_id_gal = " . $arrCont["obras_galeria"] . " ORDER BY gxi_posicion ASC, gxi_id ASC LIMIT 0,1";
$rsImag = $objContenido->getAllContenido($link, $queryImag);
$arrImag = $rsImag->fetch(PDO::FETCH_BOTH);*/
$queryImag = "SELECT * FROM galeriasximag WHERE  gxi_id_gal = " . $arrCont["obras_galeria"] . " ORDER BY gxi_posicion ASC, gxi_id ASC";
$rsImag = $objContenido->getAllContenido($link, $queryImag);
//TODAS LAS IMAGENES DETACADA
$queryImagAll = "SELECT * FROM galeriasximag WHERE  gxi_id_gal = " . $arrCont["obras_galeria"] . " ORDER BY gxi_posicion ASC, gxi_id ASC";
$rsImagAll = $objContenido->getAllContenido($link, $queryImagAll);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Iluminación</title>

    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Aldo Iñiguez" />
    <meta name="revisit-after" content="15 days" />
    <meta name="robots" content="index follow" />

    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/css/styles.css" />
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/fontawsome/css/all.css" />
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
    
</head>

<body>

    <div class="velo" id="velo"></div>

    <header class="header-int" style="background-image: url('../../assets/galerias/big/<?php echo $arrImag["gxi_imagen"];?>');">

        <?php include_once('includes/top-navigation-int-obra.php'); ?>

    </header>

    <main>

        <section class="una-obras">
            <div class="container">
                <!-- Titulo -->
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h1><?php echo $arrCont["obra_nombre"];?></h1>
                        <h2><?php echo $arrCont["obra_localidad"];?></h2>
                    </div>
                </div>

                <!-- Obras -->

                <div class="row">

                    <!-- Obra Item -->
                    <div class="col-md-10 offset-md-1">
                        <div class="imagenes">

                            <?php while ($arrImag = $rsImag->fetch(PDO::FETCH_BOTH)) { ?>
                                <div class="imagen-pincipal<?php echo $arrImag["gxi_id"];?>" style="background-image: url('../../assets/galerias/med/<?php echo $arrImag["gxi_imagen"];?>');" id="imagen-principal">
                                    <div class="lupa"><a href="../../assets/galerias/big/<?php echo $arrImag["gxi_imagen"];?>" data-fancybox data-caption="<?php echo $arrCont["obra_nombre"];?>" id="linklupa"><i class="fa-solid fa-magnifying-glass"></i></a></div>
                                </div>
                            <?php } ?>

                            <div class="imagen-thumbs">
                                <?php while ($arrImagAll = $rsImagAll->fetch(PDO::FETCH_BOTH)) { ?>
                                    <div class="imagen-thumb" style="background-image: url('../../assets/galerias/small/<?php echo $arrImagAll["gxi_imagen"];?>');"></div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <!-- Fin Obra Item -->

                    <div class="col-md-10 offset-md-1">
                        <p class="texto-obra"><?php echo $arrCont["obra_localidad"];?></p>
                    </div>

                </div>
                <!-- Fin Obras -->


            </div>

        </section>

    </main>

    <?php include_once('includes/footer.php'); ?>

    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Google maps -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8_03r9LkKX7DqnHDYfv8lbyvWH7gadwM&callback=initMap"></script>
    <!-- Fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
    <!-- Main -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/main.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/unaobra.js"></script>
</body>

</html>