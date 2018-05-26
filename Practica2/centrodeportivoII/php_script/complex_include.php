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

	include("./php_script/datos_conexion.php");
	include("./php_script/my_functions.php");
?>
