<?php
  include("./php_script/my_functions.php");
  include("./php_script/datos_conexion.php");
/*	iniciamos sesion en php y utilizamos la informacion almacenada en la cookie que creamos en "comprobar_aceso.php"	*/
  //session_start();

 ?>

<!doctype html>

<!-- comentariako -->

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
    <header>
	    <?php include("./cabecera.php") ?>
    </header>
        <section id="main">
            <article id="mainLeft">

            <a href="https://www.freepik.es/foto-gratis/pesos-del-ejercicio-de-pesas-fuerte-atletica_1052591.htm" target="_blank"><img src="imagenes/709.jpg"><br>Designed by Freepik</a>
            <h3>Tu marcas el objetivo, nosotros te ayudamos a alcanzarlo</h3>
            </article>
            <article id="mainRight">
	            <ul id="mainMenu">
                    <li><a href="./actividades.php">Actividades</a></li>
                    <li><a href="./horario.php">Horario</a></li>
                    <li><a href="./tecnicos.php">Tecnicos</a></li>
                    <li><a href="./localizacion.php">Localización</a></li>
                    <li><a href="./altausuario.php">Alta de usuarios</a></li>
                    <li>
                      <?php if( empty($_SESSION) ){ ?>
                        <img src="./imagenes/locked.png">
                      <?php }else{ ?>
                        <img src="./imagenes/unlocked.png">
                      <?php }//fin else ?>
                      <a href="./foro.php">Foro</a>
                      <?php if( !empty($_SESSION) ){ ?>
                        <li><a href="./edit_my_info.php">Modifica tu info</a></li>
                      <?php } ?>
            	</ul>
            </article>
        </section>
        <?php include('./foot.php'); ?>
	</section>



</body>
</html>
