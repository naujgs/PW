
<?php include("./php_script/complex_include.php"); ?>

<?php
	//Cuando se llama a esta pagina, se envia el id del post que empieza el hilo
	$id = $_GET['hilo'];
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cómo respirar para la correcta realizacion de un ejercicio| Centro Deportivo MusclePlus</title>
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
    <?php
      if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos)){
	      //Ahora obtenemos toda la informacion del usuario cuyo dni nos pasaron al invocar esta web
        if($post = obtenerPost($id) ){
          $hilo = mysqli_fetch_array($post);

          if ( $autor = obtenerDatosUser($hilo['id_autor']) ) {
            $owner = mysqli_fetch_array($autor);
          } // if ( $autor = obtenerDatosUser($hilo['id_autor']) )
        } // if($post = obtenerPost($id) )
      } //if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos))
      //cerramos la conexion con la base de datos realizada en el if(conectarBaseDatos)
      closeConexion($conex);
    ?>
    <article id="entradasHilo">
      <article id="hiloBlock">
        <article id="hiloUsuario">
        	<img src="./imagenes/bebe2.png" title="Icono diseñado por Freepik desde www.flaticon.com con licencia CC 3.0 BY">
        	<p id="nombre"><?php echo $owner['nombre'] ?></p>
          <p id="titulo">De: </p><p id="info"><?php echo $owner['ciudad']; ?></p>
          <p id="titulo">Rol: </p><p id="info"><?php echo $owner['rol']; ?></p>
        </article>
        <article id="hiloMensaje">
        	<h4><?php echo $hilo['titulo']; ?></h4>
          <p><?php echo $hilo['mensaje']; ?></p>
					<!-- Si eres administrador o el autor del post-->
					<?php if( $_SESSION['rol'] == "admin" || $owner['dni'] == $_SESSION['dni']){ ?>
						<a href="./php_script/borrar_hilo.php?id=<?php echo $hilo['id_post']?>&padre=<?php echo $hilo['id_padre'] ?>"><img src="./imagenes/borrar.png"></a>
					<?php } ?>
        </article>
      </article>

			<?php
				if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos)){
					//Ahora obtenemos todos los post que componen el hilo. Todos menos el padre
					if($post = obtenerPostHijos($id) ){
						while( $hilo2 = mysqli_fetch_array($post) ){
							if ( $autor2 = obtenerDatosUser($hilo2['id_autor']) ) {
								$owner2 = mysqli_fetch_array($autor2);
								?>
								<article id="hiloBlock">
									<article id="hiloUsuario">
										<img src="./imagenes/bebe2.png" title="Icono diseñado por Freepik desde www.flaticon.com con licencia CC 3.0 BY">
										<p id="nombre"><?php echo $owner2['nombre'] ?></p>
										<p id="titulo">De: </p><p id="info"><?php echo $owner2['ciudad']; ?></p>
										<p id="titulo">Rol: </p><p id="info"><?php echo $owner2['rol']; ?></p>
									</article>
									<article id="hiloMensaje">
										<h4><?php echo $hilo2['titulo']; ?></h4>
										<p><?php echo $hilo2['mensaje']; ?></p>
										<!-- Si eres administrador o el autor del post-->
										<?php if( $_SESSION['rol'] == "admin" || $owner2['dni'] == $_SESSION['dni']){ ?>
											<a href="./php_script/borrar_post.php?id=<?php echo $hilo2['id_post']?>&padre=<?php echo $hilo2['id_padre'] ?>"><img src="./imagenes/borrar.png"></a>
										<?php } ?>
									</article>
								</article>
								<?php
							} // if ( $autor = obtenerDatosUser($hilo['id_autor']) )
						}	//fin while
					} // if($post = obtenerPost($id) )
				} //if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos))
				//cerramos la conexion con la base de datos realizada en el if(conectarBaseDatos)
				closeConexion($conex);
			?>
			<form onsubmit="return validador_crear_hilo();" id="nuevoHilo" action="./php_script/crea_post.php" method="post">
        <label for="mensaje">Aportación</label>
        <textarea id="mensaje" name="mensaje"type="text" placeholder="Maximo 1024 caracteres"></textarea></br>
        <input id="titulo" name="titulo" style="visibility:hidden" value="RE: <?php echo $hilo['titulo']?>"></br>
        <input id="autor" name="autor" style="visibility:hidden" value="<?php echo $_SESSION['dni']?>">
				<input id="padre" name="padre" style="visibility:hidden" value="<?php echo $hilo['id_post']?>">
        <article id="botons">
          <input type="reset" value="Borrar">
          <input type="submit" value="Aceptar">
        </article>
      </form>
    </article>

  </section>
  <?php include("./foot.php"); ?>
</body>
</html>
