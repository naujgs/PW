<?php
/*  Recupero la sesion  */
session_start();

//Elimino los valores de la sesion
$_SESSION = array();
session_destroy();

 ?>

 <center>
 <p>Cerrando Sesión</p>
 <p>Hasta Pronto!</p>
 <img width="150px" src="../imagenes/giphy.gif"/>
<!-- REDIRECCIONADO -->
 <script type="text/javascript">setTimeout("location.href='../index.php'", 3000);</script>
