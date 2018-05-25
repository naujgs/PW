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
			<a id="btnNewPost" href="nuevo_hilo.php">Crear Hilo</a>
			<table id="foroEntradas">
	  		<thead>
	  			<tr>
	    			<th>Título</th><th>Autor</th>
	      	</tr>
				</thead>
				<tbody> <?php
				//compruebo si se realiza la conexion con la base de datos
				if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos) ){
					//Obtengo un listado con todos los recursos operativos del usuario
					if( $informacion = listadoPostPadre() ){

						while( $post = mysqli_fetch_array($informacion) ){

							//Obtengo la informacion del autor del post
							if ($infoAutor = obtenerDatosUser($post['id_autor']) ) {
								$autor = mysqli_fetch_array($infoAutor);
								?>
								<tr>
									<td>
										<a href="./foroHilo.php?hilo=<?php echo $post['id_post']; ?>"><?php echo $post['titulo']; ?></a>
									</td>
									<td>
										<?php echo $autor['nombre']; ?>
									</td>
								</tr>
								<?php
							}	//if ( get_user($post['id_autor']) )
						}	//while( $post = mysqli_fetch_array($informacion) )
					}	//if( $informacion = listadoPostPadre() )
				}//fin if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos) )
				?>
	    	</tbody>
	    </table>

		</section>
		<?php include("./foot.php"); ?>
</body>
</html>
