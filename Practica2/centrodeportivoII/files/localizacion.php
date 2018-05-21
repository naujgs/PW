<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ubicación | Centro Deportivo MusclePlus</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css"    />
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>
<body>
<header>
                <article id="imagen"><img src="../imagenes/ejercer.png" title="Icono diseñado por Freepik desde www.flaticon.com con licencia CC 3.0 BY"></article>
                            <h1 id="tituloWeb">Centro Deportivo MusclePlus</h1>
                <article id="login">

                        <p>Bienvenido Mr. User</p>
	                    <a href="../index.php">Log Out</a>

                </article>
            </header>

            <?php include("../horizontalMenu.php"); ?>

            <section id="main">
				<article id="mainLeft">
		            <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1123.6304850413355!2d-3.6235816407058903!3d37.19768927621438!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fc553d066253%3A0x25644a1f0bba7524!2sCETIC!5e0!3m2!1ses!2ses!4v1521993519382" width="90%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
            	</article>

                <article id="mainRight">
                	<p id="direccion">Rua del Percebe, 13<br>GRANADA - SPAIN<br>(+34) 958 00 00 11</p>

			</section>
		<?php include("../foot.php"); ?>
</body>
</html>
