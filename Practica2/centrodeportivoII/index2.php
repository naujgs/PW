<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Actividades | Centro Deportivo MusclePlus</title>
   	<link rel="stylesheet" type="text/css" href="./estilos.css"    />
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>

<body>
<section id="page">
	    <header>
        	<article id="imagen"><img src="./imagenes/ejercer.png" title="Icono diseñado por Freepik desde www.flaticon.com con licencia CC 3.0 BY"></article>
                        <h1 id="tituloWeb">Centro Deportivo MusclePlus</h1>
            <article id="login">

                	<p>Bienvenido Mr. User</p>
                    <a href="./index.php">Log Out</a>
            </article>
        </header>
        <?php include("./horizontalMenu.php"); ?>
        <section id="main">
            <article id="mainLeft">

            <a href="https://www.freepik.es/foto-gratis/pesos-del-ejercicio-de-pesas-fuerte-atletica_1052591.htm" target="_blank"><img src="imagenes/709.jpg"><br>Designed by Freepik</a>
            <h3>Tu marcas el objetivo, nosotros te ayudamos a alcanzarlo</h3>
            </article>
            <article id="mainRight">
	            <ul id="mainMenu">
                    <li><a href="./actividades.php">Actividades</a></li>
                    <li><a href="./horario.php">Horario</a></li>
                    <li><a href="./tecnicos.php">Tecnicos</a></li>
                    <li><a href="./localizacion.php">Localización</a></li>
                    <li><a href="./altausuario.php">Alta de usuarios</a></li>
                    <li><a href="./foro.php">Foro</a></li>
            	</ul>
            </article>
        </section>
        <?php include("./foot.php"); ?>
	</section>
</body>
</html>
