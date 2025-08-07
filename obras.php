<?php
include_once('config/conexion.inc.php');
include_once('config/funciones.inc.php');
include_once('config/classnew.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$query = "SELECT * FROM obras
          WHERE obra_publicada = 1
          ORDER BY obra_orden ASC,obra_nombre ASC";
$rsCont = $objContenido->getAllContenido($link, $query);
$intQtyRecords = $rsCont->rowCount();
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/carousel/carousel.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/css/styles.css" />
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="<?php echo _CONST_DOMINIO_ ?>assets/fontawsome/css/all.css" />
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
    <style>
        #myCarousel {
            --f-carousel-slide-height: 100%;
            --f-carousel-spacing: 10px;
            height: 100%;
        }
    </style>
</head>

<body>

    <div class="velo" id="velo"></div>

    <header class="header-int">

        <div class="contenedor-slide" id="contenedor-slide">

            <div class="f-carousel" id="myCarousel">
                <div class="f-carousel__viewport">
                    <div class="f-carousel__slide" style="background-image: url('assets/slides/slide01.jpg');"></div>
                    <div class="f-carousel__slide" style="background-image: url('assets/slides/slide02.jpg');"></div>
                    <div class="f-carousel__slide" style="background-image: url('assets/slides/slide03.jpg');"></div>
                    <div class="f-carousel__slide" style="background-image: url('assets/slides/slide04.jpg');"></div>
                    <div class="f-carousel__slide" style="background-image: url('assets/slides/slide05.jpg');"></div>
                </div>
            </div>

        </div>

        <?php include_once('includes/top-navigation-int.php'); ?>

    </header>

    <main>

        <section class="int-obras">
            <div class="container">
                <!-- Titulo -->
                <div class="row">
                    <div class="col-12">
                        <h1>Nuestras Obras.</h1>
                    </div>
                </div>

                <!-- Obras -->

                <div class="row">

                    <?php $intCounter = 0; ?>
                    <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                        <?php
                        $queryImag = "SELECT * FROM galeriasximag WHERE  gxi_id_gal = " . $arrContenido["obras_galeria"] . " ORDER BY gxi_posicion ASC, gxi_id ASC LIMIT 0,1";
                        $rsImag = $objContenido->getAllContenido($link, $queryImag);
                        $arrImag = $rsImag->fetch(PDO::FETCH_BOTH);
                        ?>

                        <!-- Obra Item -->
                        <div class="col-12 col-md-6">
                            <div class="obra-item" style="background-image: url('assets/galerias/med/<?php echo $arrImag["gxi_imagen"]; ?>');">
                                <div class="obra-infomation">
                                    <div class="obra-lead">
                                        <h2><?php echo $arrContenido["obra_nombre"]; ?></h2>
                                        <p class="localidad"><?php echo $arrContenido["obra_localidad"]; ?></p>
                                    </div>
                                    <div></div>
                                    <div></div>
                                    <div class="obra-flecha"><a href="<?php echo _CONST_DOMINIO_ ?>/obras/<?php echo $arrContenido["obra_id"]; ?>/<?php echo buildLink($arrContenido["obra_nombre"]); ?>"><i class="fa-solid fa-angle-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Obra Item -->
                        <?php $intCounter++; ?>
                    <?php } ?>



                </div>
                <!-- Fin Obras -->
                <!-- Mas Obras -->
                 <!--
                <div class="row">
                    <div class="col-12 text-end">
                        <div class="bt-mas-obras"><a href="#">Mas obras <i class="fa-solid fa-angle-right"></i></a></div>
                    </div>
                </div>
                    -->
                <!-- Fin Mas Obras -->

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
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/carousel/carousel.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/carousel/carousel.autoplay.umd.js"></script>
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/slideobras.js"></script>
</body>

</html>