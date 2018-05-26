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
  <script type="text/javascript" src="./js/dinamic_functions.js"></script>
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>

<body>
    <header>
	    <?php include("./cabecera.php") ?>
    </header>
    <?php include("./horizontalMenu.php"); ?>
    <section id="main">
			<form onsubmit="return validador_crear_hilo();" id="nuevoHilo" action="./php_script/crea_hilo.php" method="post">
        <label for="titulo">Titulo del hilo</label>
        <input id="titulo" name="titulo"type="text"></br>
        <label for="mensaje">Descripcion del hilo</label>
        <textarea id="mensaje" name="mensaje"type="text" placeholder="Maximo 1024 caracteres"></textarea></br>
        <input id="autor" name="autor" style="visibility:hidden" value="<?php echo $_SESSION['dni']?>">
        <article id="botons">
          <input type="reset" value="Borrar">
          <input type="submit" value="Aceptar">
        </article>
      </form>
		</section>
		<?php include("./foot.php"); ?>
</body>
</html>
