<?php
	/*	Reestablecemos la sesion activa, para poder obtener datos de esta atraves de la cookie*/
	/*	La sesion fue creada al logearnos en el fichero "comprobar_validacion.php"*/
	session_start();

	/*	compruebo que se ha iniciado sesion*/
	if( empty($_SESSION) ){
	?>
		    <!--	Redirijo	-->
		<script type="text/javascript"> location.href="./index.php";</script>
    <?php
	}
	include("./php_script/datos_conexion.php");
	include("./php_script/my_functions.php");

?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Foro| Centro Deportivo MusclePlus</title>
	<link rel="stylesheet" type="text/css" href="./estilos.css"    />
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>

<body>
    <header>
	    <?php include("./cabecera.php") ?>
    </header>
            <?php include("./horizontalMenu.php"); ?>
            <section id="main">
				<table id="foroEntradas">
	                <thead>
                    	<tr>
	                        <th>Título</th><th>Autor</th><th>Fecha</br>Publicación</th><th>Visitas</th>
                        </tr>
					</thead>
                    <tbody>
                    	<tr><td><a href="./foroHilo.php">Cómo respirar para la correcta realizacion de un ejercicio</a></td><td>Raul23</td><td>01/03/2018</td><td>23</td></tr>
                    	<tr><td><a href="">¿Debo comer pistachos despues de cada entrenamiento?</a></td><td>Paulina98</td><td>20/02/2018</td><td>1</td></tr>                    </tbody>
                </table>
			</section>
			<?php include("./foot.php"); ?>
</body>
</html>
