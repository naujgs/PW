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
			<form>
        <input id="autor">
        <input id="titulo"></br>
        <input id="mensaje"></br>

      </form>
		</section>
		<?php include("./foot.php"); ?>
</body>
</html>
