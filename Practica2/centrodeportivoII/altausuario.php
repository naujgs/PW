<?php
	/*	Reestablecemos la sesion activa, para poder obtener datos de esta atraves de la cookie*/

	include("./php_script/datos_conexion.php");
	include("./php_script/my_functions.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro nuevo usuario | Centro Deportivo MusclePlus</title>
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
    <!-- <form onsubmit="return modifica_datos_registro();" action="./php_script/mod_my_info.php" method="post"> -->
    	<form action=".php_script/add_user.php" method="post">
			<fieldset>
                <legend>Datos Personales</legend>
                <article id="cople">
                    <label for="dni">DNI</label>
                    <input id="dni" name="dni" type="text"><br>
                </article>
                <article id="cople">
                    <label for="name">Nombre y Apellidos:</label>
                    <input id="name" name="name" type="text"><br>
                </article>
                <article id="cople">
                    <label for="password">Contraseña:</label>
                    <input id="password" name="password" type="password"><br>
                </article>
                <article id="cople">
                    <label for="birth">Fecha de Nacimiento:</label>
                    <input id="birth" name="birth" type="date"><br>
                </article>
                    <fieldset>
                        <legend>Dirección</legend>
                        <article id="cople">
                            <label for="street">Calle</label>
                            <input id="street" name="street" type="text">
                        </article>
                        <article id="cople">
                            <label for="city">Ciudad</label>
                            <input id="city" name="city" type="text">
                        </article>
                        <article id="cople">
                          <label for="zip">Cod. Postal</label>
	                        <input id="zip" name="zip" type="number">
						</article>
                    </fieldset>
				<article id="cople">
                    <label for="email">Correo electronico</label>
                    <input id="email" name="email" type="email"><br>
                </article>
                <article id="cople">
                    <label for="mobile">Telefono Movil</label>
                    <input id="mobile" name="mobile" type="tel"><br>
                </article>
			</fieldset>
            <label for="period">Periodo inicial de inscripción</label>
            <select id="period" name="pariod">
                <option value="1">1 mes</option>
                <option value="2">2 meses</option>
                <option value="3">3 meses</option>
            </select><br>
            <label for="know">¿Cómo nos has conocido?</label>
						<select id="know">
              <option value="Revistas">
              <option value="Television">
              <option value="Radio">
              <option value="Amigos">
            </select><br>
            <?php if ( empty($_SESSION) || $_SESSION['rol'] != 'admin') { ?>
              <label style="visibility: hidden;" for="rol">Rol de la persona</label>
              <!-- <select style="visibility: hidden;" id="rol" name="rol">
                  <option value="cliente"> -->
                <input id="rol"style="visibility:hidden" name="rol" value="cliente" />
              </select><br>
            <?php }elseif ($_SESSION['rol'] == 'admin') { ?>
              <label for="rol">Rol de la persona</label>
              <select id="rol" name="rol">
                  <option value="cliente">Cliente</option>
                  <option value="monitor">Monitor</option>
                  <option value="admin">Administrador</option>
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
