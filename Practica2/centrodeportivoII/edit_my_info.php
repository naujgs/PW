<?php
	/*	Reestablecemos la sesion activa, para poder obtener datos de esta atraves de la cookie*/
	/*	La sesion fue creada al logearnos en el fichero "comprobar_validacion.php"*/
	session_start();

  /*	compruebo que se ha iniciado sesion. De esta forma evitamos que accedan a la url sin logearse antes*/
  if( empty($_SESSION) ){
  ?>
        <!--	Redirijo	-->
    <script type="text/javascript"> location.href="./index.php";</script>
    <?php
  }

	//Cuando se llama a esta pagina, se envia el dni del usuario que se desea modificar. Ahora recuperamos dicho dni
	$dni = $_SESSION['dni'];

	include("./php_script/datos_conexion.php");
	include("./php_script/my_functions.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edita tu informacion de usuario usuario | Centro Deportivo MusclePlus</title>
	<link rel="stylesheet" type="text/css" href="./estilos.css"    />
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>
<body>
	<header>
    <?php include("./cabecera.php") ?>
	</header>
  <section id="main">
  	<?php include("./horizontalMenu.php"); ?>

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
    	<form action="./php_script/mod_my_info.php" method="post" onSubmit="return modifica_datos_registro();">
			<fieldset>
                <legend>Datos Personales</legend>
                <article id="cople">
                    <label for="dni">DNI</label>
                    <input name="dni" type="text" value="<?php echo $usuario['dni']?>"><br>
                </article>
                <article id="cople">
                    <label for="name">Nombre y Apellidos:</label>
                    <input name="name" type="text" value="<?php echo $usuario['nombre']?>"><br>
                </article>
                <article id="cople">
                    <label for="password">Contraseña:</label>
                    <input name="password" type="password" value="<?php echo $usuario['password']?>"><br>
                </article>
                <article id="cople">
                    <label for="birth">Fecha de Nacimiento:</label>
                    <input name="birth" type="date" value="<?php echo $usuario['nacimiento']?>"><br>
                </article>
                    <fieldset>
                        <legend>Dirección</legend>
                        <article id="cople">
                            <label for="street">Calle y número</label>
                            <input name="street" type="text" value="<?php echo $usuario['calle']?>">
                        </article>
                        <article id="cople">
                            <label for="city">Ciudad</label>
                            <input name="city" type="text" value="<?php echo $usuario['ciudad']?>">
                        </article>
                        <article id="cople">
	                        <label for="zip">Cod. Postal</label>
	                        <input name="zip" type="number" value="<?php echo $usuario['zip']?>">
						</article>
                    </fieldset>
				<article id="cople">
                    <label for="email">Correo electronico</label>
                    <input name="email" type="email" value="<?php echo $usuario['email']?>"><br>
                </article>
                <article id="cople">
                    <label for="telefono">Telefono Movil</label>
                    <input name="telefono" type="tel" value="<?php echo $usuario['telefono']?>"><br>
                </article>
			</fieldset>
      <label for="periodo">Periodo inicial de inscripción</label>
      <select name="periodo">
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

</body>
</html>
