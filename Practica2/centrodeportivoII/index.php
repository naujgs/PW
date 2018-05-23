<?php
  include("files/my_functions.php");
  include("files/datos_conexion.php");
/*	iniciamos sesion en php y utilizamos la informacion almacenada en la cookie que creamos en "comprobar_aceso.php"	*/
  session_start();

 ?>

<!doctype html>

<!-- comentario -->

<html>
<head>
    <meta charset="utf-8">
    <title>Main web | Centro Deportivo MusclePlus</title>
	<link rel="stylesheet" type="text/css" href="estilos.css"    />
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->

</head>

<body>
	<section id="page">
	    <?php include("./cabecera.php") ?>
        <section id="main">
            <article id="mainLeft">

            <a href="https://www.freepik.es/foto-gratis/pesos-del-ejercicio-de-pesas-fuerte-atletica_1052591.htm" target="_blank"><img src="imagenes/709.jpg"><br>Designed by Freepik</a>
            <h3>Tu marcas el objetivo, nosotros te ayudamos a alcanzarlo</h3>
            </article>
            <article id="mainRight">
	            <ul id="mainMenu">
                    <li><a href="./files/actividades.php">Actividades</a></li>
                    <li><a href="./files/horario.php">Horario</a></li>
                    <li><a href="./files/tecnicos.php">Tecnicos</a></li>
                    <li><a href="#">Instalaciones y Servicios</a></li>
                    <li><a href="./files/localizacion.php">Localización</a></li>
                    <li><a href="#">Precios</a></li>
                    <li><a href="./files/altausuario.php">Alta de usuarios</a></li>
                    <li><a href="./files/foro.php">Foro</a></li>
            	</ul>
            </article>
        </section>
        <?php include('./foot.php'); ?>
	</section>



</body>
</html>
