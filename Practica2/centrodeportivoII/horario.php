<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Horario Actividades | Centro Deportivo MusclePlus</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css"    />
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!--Fuente de google-->
</head>

<body>
	<section id="page">
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
            <table id="schedule">
            	<caption> Horario de actividades</caption>
                	<thead>
                    	<tr>
                        <th>Hora</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th>
                        </tr>
					</thead>
                    <tbody>
                    	<tr><td>8:00-9:00</td><td>Zumba</td><td>Body Pum</td><td>Spining</td><td>Aqua Fit</td><td>Kraw Maga</td></tr>                       	<tr><td>9:00-10:00</td><td>Global Training</td><td>Spining</td><td>Xpress Core</td><td>Aerobic</td><td>Zumba</td></tr>
                    	<tr><td>10:00-11:00</td><td rowspan="2">Zumba</td><td>Body Pum</td><td>Karate Junior</td><td>Aqua Fit</td><td>Kraw Maga</td></tr>
                    	<tr><td>11:00-12:00</td><td>Xpress Foam</td><td>Yoga Strength</td><td>Acrosport Jun</td><td>Zumba</td></tr>
                    </tbody>
            </table>
        </section>
        <?php include("../foot.php"); ?>
	</section>



</body>
</html>
