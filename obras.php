<?php
include_once('config/conexion.inc.php');
include_once('config/funciones.inc.php');
include_once('config/classnew.inc.php');
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
</head>

<body>

    <div class="velo" id="velo"></div>

    <header class="header-int">

        <div class="top-navigation">
            <div class="logo"><img src="<?php echo _CONST_DOMINIO_ ?>assets/img/logo.png" alt=""></div>

            <nav class="menu" id="menu">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Obras</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Empresa</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>

            <div class="btn11" data-menu="11" id="bt-hamburger">
                <div class="icon-left"></div>
                <div class="icon-right"></div>
            </div>

            <div class="redes-top">
                <ul>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                </ul>
            </div>

        </div>


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

                    <!-- Obra Item -->
                    <div class="col-12 col-md-6">
                        <div class="obra-item" style="background-image: url('assets/obras/obra-test-01.jpg');">
                            <div class="obra-infomation">
                                <div class="obra-lead">
                                    <h2>Centro de justicia penal</h2>
                                    <p class="localidad">Rosario</p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="obra-flecha"><a href="#"><i class="fa-solid fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Obra Item -->

                    <!-- Obra Item -->
                    <div class="col-12 col-md-6">
                        <div class="obra-item" style="background-image: url('assets/obras/obra-test-01.jpg');">
                            <div class="obra-infomation">
                                <div class="obra-lead">
                                    <h2>Centro de justicia penal</h2>
                                    <p class="localidad">Rosario</p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="obra-flecha"><a href="#"><i class="fa-solid fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Obra Item -->

                    <!-- Obra Item -->
                    <div class="col-12 col-md-6">
                        <div class="obra-item" style="background-image: url('assets/obras/obra-test-01.jpg');">
                            <div class="obra-infomation">
                                <div class="obra-lead">
                                    <h2>Centro de justicia penal</h2>
                                    <p class="localidad">Rosario</p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="obra-flecha"><a href="#"><i class="fa-solid fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Obra Item -->

                    <!-- Obra Item -->
                    <div class="col-12 col-md-6">
                        <div class="obra-item" style="background-image: url('assets/obras/obra-test-01.jpg');">
                            <div class="obra-infomation">
                                <div class="obra-lead">
                                    <h2>Centro de justicia penal</h2>
                                    <p class="localidad">Rosario</p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="obra-flecha"><a href="#"><i class="fa-solid fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Obra Item -->

                </div>
                <!-- Fin Obras -->
                <!-- Mas Obras -->
                <div class="row">
                    <div class="col-12 text-end">
                        <div class="bt-mas-obras"><a href="#">Mas obras <i class="fa-solid fa-angle-right"></i></a></div>
                    </div>
                </div>
                <!-- Fin Mas Obras -->

            </div>

        </section>

    </main>

    <?php include_once('includes/footer.php'); ?>

    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Google maps -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCquBaspZ7KL1dj1s2B8cYsrUNUJXHAuYk&callback=initMap"></script>
    <!-- Main -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/main.js"></script>
</body>

</html>