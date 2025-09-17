<?php
if (isset($_GET["seccion"])) {
	$seccion = $objContenido->dataCleaner($_GET["seccion"],'AN');
} else {
	$seccion = "inicio";
}
if (isset($_GET["subseccion"])) {
	$subseccion = $objContenido->dataCleaner($_GET["subseccion"],'AN');
} else {
	$subseccion = "";
}
?>
<li <?php if ($seccion=="inicio"): ?>class="active"<?php endif; ?>>
	<a href="home.php?seccion=inicio"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span>  </a>
</li>


<li <?php if ($seccion=="obras"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Obras</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstObras.php?seccion=obras">Listar </a></li>
		<li><a href="addObras.php?seccion=obras">Agregar </a></li>
	</ul>
</li>

<li <?php if ($seccion=="galerias"): ?>class="active"<?php endif; ?>>
    <a href="#"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Galerias</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="lstGalerias.php?seccion=galerias">Listar </a></li>
        <li><a href="addGalerias.php?seccion=galerias">Agregar </a></li>
    </ul>
</li>

<li <?php if ($seccion=="slides"): ?>class="active"<?php endif; ?>>
    <a href="#"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Slides</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="lstSlides.php?seccion=slides">Listar </a></li>
        <li><a href="addSlides.php?seccion=slides">Agregar </a></li>
    </ul>
</li>




<li <?php if ($seccion=="usuarios"): ?>class="active"<?php endif; ?>>
	<a href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li><a href="lstUsuarios.php?seccion=usuarios">Listar </a></li>
		<li><a href="addUsuario.php?seccion=usuarios">Agregar </a></li>
	</ul>
</li>
