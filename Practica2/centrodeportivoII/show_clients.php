
<?php include("./php_script/simple_include.php"); ?>

<!doctype html>
<html>
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
                if( $clients = getClientsList() ){
                  while( $persona = mysqli_fetch_array($clients) ){ ?>
                    <article id="profile">
                          <p> D.N.I. <?php echo $persona['dni']; ?></p>
                          <p>Nombre: <?php echo $persona['nombre']; ?></p>
                          <p>Fecha Nacimiento: <?php echo $persona['nacimiento']; ?></p>
                          <p>Direccion: <?php echo $persona['calle']; ?></p>
                          <p><?php echo $persona['zip']; ?>, <?php echo $persona['ciudad']; ?></p>
                          <p>Email: <?php echo $persona['email']; ?></p>
                          <p>Telefono: <?php echo $persona['telefono']; ?></p>
                          <p>Periodo matricula:<?php echo $persona['periodo']; ?></p>
                          <p>¿Cómo nos conociste? <?php echo $persona['conociste']; ?></p>
                      </article>
                  <?php }  //while( $persona = mysqli_fetch_array($clients) )
                } // if( $clients = getClientsList() )
              } ?><!-- if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos)) -->
			</section>
			<?php include("./foot.php"); ?>
</body>
</html>
