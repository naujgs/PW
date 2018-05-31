<?php include("./php_script/simple_include.php"); ?>

<html>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Nuestro Equipo | Centro Deportivo MusclePlus</title>
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
                if( $clients = getWorkersList() ){
                  while( $persona = mysqli_fetch_array($clients) ){ ?>
                    <article id="profile">
                          <p>Nombre: <?php echo $persona['nombre']; ?></p>
                          <p>Fecha Nacimiento: <?php echo $persona['nacimiento']; ?></p>
                          <p>Ciudad: <?php echo $persona['ciudad']; ?></p>
                          <p>Rol: <?php echo $persona['rol']; ?></p>
                          <?php
                          if( !empty($_SESSION) ){
                            if( $_SESSION['rol'] == "admin" || $persona['dni'] == $_SESSION['dni']){ ?>
      											<a href="./php_script/borrar_persona.php?dni=<?php echo $persona['dni']; ?>"><img src="./imagenes/borrar.png"></a>
      										<?php }     //if( $_SESSION['rol'] == "admin" || $persona['dni'] == $_SESSION['dni'])
                        } // if( !empty($_SESSION) ) ?>
                      </article>
                  <?php }  //while( $persona = mysqli_fetch_array($clients) )
                } // if( $clients = getClientsList() )
              } // if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos)) ?>
			</section>
			<?php include("./foot.php"); ?>
</body>
</html>
