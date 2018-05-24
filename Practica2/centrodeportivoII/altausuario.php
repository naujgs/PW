<?php
	/*	Reestablecemos la sesion activa, para poder obtener datos de esta atraves de la cookie*/
	/*	La sesion fue creada al logearnos en el fichero "comprobar_validacion.php"*/
	session_start();

	include("./php_script/datos_conexion.php");
	include("./php_script/my_functions.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro nuevo usuario | Centro Deportivo MusclePlus</title>
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
    	<form method="post">
			<fieldset>
                <legend>Datos Personales</legend>
                <article id="cople">
                    <label for="name">Nombre:</label>
                    <input name="name" type="text"><br>
                </article>
                <article id="cople">
                    <label for="surname">Apellidos:</label>
                    <input name="surname" type="text"><br>
                </article>
                <article id="cople">
                    <label for="birth">Fecha de Nacimiento:</label>
                    <input name="birth" type="date"><br>
                </article>
                    <fieldset>
                        <legend>Dirección</legend>
                        <article id="cople">
                            <label for="street">Calle</label>
                            <input name="street" type="text">
                        </article>
                        <article id="cople">
                            <label for="number">Numero</label>
                            <input form="number" type="number"><br>
                        </article>
                        <article id="cople">
                            <label for="city">Ciudad</label>
                            <input name="city" type="text">
                        </article>
                        <article id="cople">
	                        <label for="zip">Cod. Postal</label>
	                        <input name="zip" type="number">
						</article>
                    </fieldset>
				<article id="cople">
                    <label for="email">Correo electronico</label>
                    <input name="email" type="email"><br>
                </article>
                <article id="cople">
                    <label for="mobile">Telefono Movil</label>
                    <input name="mobile" type="tel"><br>
                </article>
			</fieldset>
            <label for="partner">Periodo inicial de inscripción</label>
            <select id="partner" name="partner">
                <option value="1">1 mes</option>
                <option value="2">2 meses</option>
                <option value="3">3 meses</option>
            </select><br>
            <label for="know">¿Cómo nos has conocido?</label>
            <input list="know">
            <datalist id="know">
              <option value="Revistas">
              <option value="Television">
              <option value="Radio">
              <option value="Amigos">
            </datalist><br>
            <?php }elseif ( empty($_SESSION) || $_SESSION['rol'] != 'admin') { ?>
              <label type="hidden" for="rol">Rol de la persona</label>
              <select type="hidden" id="rol" name="rol">
                  <option type="hidden" value="cliente">
              </select><br>
            <?php }elseif ($_SESSION['rol'] == 'admin') { ?>
              <label for="rol">Rol de la persona</label>
              <select id="rol" name="rol">
                  <option value="cliente">
                  <option value="monitor">
                  <option value="admin">
              </select><br>
              <?php }//fin elseif ?>
            <article id="botons">
                <input type="reset" value="Borrar">
                <input type="submit" value="Aceptar">
              </article>
        </form>
	</section>
	<?php include("./foot.php"); ?>

</body>
</html>
