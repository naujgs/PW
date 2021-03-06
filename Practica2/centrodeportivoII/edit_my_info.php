
<?php include("./php_script/complex_include.php"); ?>
<?php
  //Cuando se llama a esta pagina, se envia el dni del usuario que se desea modificar. Ahora recuperamos dicho dni
  $dni = $_SESSION['dni'];
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edita tu informacion de usuario usuario | Centro Deportivo MusclePlus</title>
	<link rel="stylesheet" type="text/css" href="./estilos.css"    />
			<!-- CARGAMOS FUNCIONES JAVASCRIPT -->

	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>
<body>
	<header>
    <?php include("./cabecera.php") ?>
	</header>
		<?php include("./horizontalMenu.php"); ?>
  <section id="main">

    <!-- Conectamos con la base de datos para obtener los datos del usuario que deseamos modificar -->
    <?php
    	if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos)){
    		//Ahora obtenemos toda la informacion del usuario cuyo dni nos pasaron al invocar esta web
    		if($informacion =obtenerDatosUser($dni) ){
    			$usuario = mysqli_fetch_array($informacion);
    		}
    	}
    	//cerramos la conexion con la base de datos realizada en el if(conectarBaseDatos)
    	closeConexion($conex);
  	?>
    <p id="edit_user">Modifica los datos de <u><b><?php echo $usuario['nombre'];?></b></u><br/>Cada campo muestra el valor actual</p>
    	<form onsubmit="return validador_formulario_usuario();" action="./php_script/mod_my_info.php" method="post">
			<fieldset>
                <legend>Datos Personales</legend>
                <article id="cople">
                    <label for="dni">DNI</label>
                    <input id="dni" name="dni" type="text" value="<?php echo $usuario['dni']?>"><br>
                </article>
                <article id="cople">
                    <label for="name">Nombre y Apellidos:</label>
                    <input id="name" name="name" type="text" value="<?php echo $usuario['nombre']?>"><br>
                </article>
                <article id="cople">
                    <label for="password">Contraseña:</label>
                    <input id="password" name="password" type="password" value="<?php echo $usuario['password']?>"><br>
                </article>
                <article id="cople">
                    <label for="birth">Fecha de Nacimiento:</label>
                    <input id="birth" name="birth" type="date" value="<?php echo $usuario['nacimiento']?>"><br>
                </article>
                    <fieldset>
                        <legend>Dirección</legend>
                        <article id="cople">
                            <label for="street">Calle y número</label>
                            <input id="street" name="street" type="text" value="<?php echo $usuario['calle']?>">
                        </article>
                        <article id="cople">
                            <label for="city">Ciudad</label>
                            <input id="city" name="city" type="text" value="<?php echo $usuario['ciudad']?>">
                        </article>
                        <article id="cople">
	                        <label for="zip">Cod. Postal</label>
	                        <input id="zip" name="zip" type="number" value="<?php echo $usuario['zip']?>">
						</article>
                    </fieldset>
				<article id="cople">
                    <label for="email">Correo electronico</label>
                    <input id="email" name="email" type="email" value="<?php echo $usuario['email']?>"><br>
                </article>
                <article id="cople">
                    <label for="telefono">Telefono Movil</label>
                    <input id="telefono" name="telefono" type="tel" value="<?php echo $usuario['telefono']?>"><br>
                </article>
			</fieldset>
      <label for="periodo">Periodo inicial de inscripción</label>
      <select id="periodo" name="periodo">
          <option value="1">1 mes</option>
          <option value="2">2 meses</option>
          <option value="3">3 meses</option>
      </select><br>

            <article id="botons">
                <input type="submit" value="Aceptar">
			</article>
        </form>
	</section>
	<?php include("./foot.php"); ?>
	<script type="text/javascript" src="./js/dinamic_functions.js"></script>
</body>
</html>
