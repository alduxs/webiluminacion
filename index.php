<?php
include_once('admin/includes/conexion.inc.php');
include_once('admin/includes/funciones.inc.php');
include_once('admin/includes/class.inc.php');
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
</head>

<body>

    <header class="header-home">

        <!-- Navegacion -->
        <div class="top-navigation">
            <div class="container">
                <div class="row">

                    <div class="col-12">

                        <div class="bloque-navegacion">
                            <div class="logo"><img src="<?php echo _CONST_DOMINIO_ ?>assets/img/logo.png" alt=""></div>

                            <nav class="menu">
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
                                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>



                </div>
            </div>
        </div>

        <div class="text-slide">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="highligth">Iluminacion</div>
                    </div>
                    <div class="col-6">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam aut in reprehenderit, quam veniam illum perferendis animi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>

    <main>

        <section class="home-obras">
            <div class="container">
                <!-- Titulo -->
                <div class="row">
                    <div class="col-12">
                        <h1>Obras.</h1>
                    </div>
                </div>

                <!-- Obras -->

                <div class="row">

                    <div class="col-12">
                        <!-- Obra Item -->
                        <div class="obra-item">

                            <div class="obra-infomation">
                                <div class="obra-lead">
                                    <h2>Centro de justicia penal</h2>
                                    <p class="localidad">Rosario</p>
                                </div>
                                <div class="obra-fecha"></div>
                            </div>

                        </div>
                        <!-- Fin Obra Item -->

                    </div>

                </div>
                <!-- Fin Obras -->
                <!-- Mas Obras -->
                <div class="row">
                    <div class="col-12">
                        <div class="bt-mas-obras"><a href="#">Mas obras</a></div>
                    </div>
                </div>
                <!-- Fin Mas Obras -->

            </div>

        </section>

        <section class="home-empresa">

            <div class="container">
                <!-- Servicios -->
                <div class="row">
                    <div class="col-12">
                        <h3>Servicios.</h3>
                    </div>
                    <div class="col-12">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias sit est molestiae incidunt, dolores non cum expedita perspiciatis alias hic repellat illo fugiat perferendis quaerat architecto quos quas at recusandae.</p>
                    </div>
                    <div class="col-12">
                        <img src="" alt="">
                    </div>
                </div>
                <!-- Fin Servicios -->
                <!-- Empresa -->
                <div class="row"></div>

                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias sit est molestiae incidunt, dolores non cum expedita perspiciatis alias hic repellat illo fugiat perferendis quaerat architecto quos quas at recusandae.</p>
                </div>
                <div class="col-12">
                    <h3>Empresa.</h3>
                </div>
            </div>
            <!-- Fin Empresa -->

            </div>


        </section>

    </main>

    <footer>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contacto</h2>
                    <ul>
                        <li>Entre Rios 278</li>
                        <li>+54 341 6916999</li>
                        <li>info@websailuminacion.com.ar</li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a> <a href="#"><i class="bi bi-facebook"></i></a></li>
                    </ul>
                </div>

                <div class="col-12">
                    <div id="map"></div>
                </div>

            </div>
        </div>

    </footer>

    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Google maps -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCquBaspZ7KL1dj1s2B8cYsrUNUJXHAuYk&callback=initMap"></script>
    <!-- Main -->
    <script src="<?php echo _CONST_DOMINIO_ ?>assets/js/main.js"></script>
</body>

</html>