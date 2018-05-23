<?php

/*	iniciamos sesion en php y utilizamos la informacion almacenada en la cookie que creamos en "comprobar_aceso.php"	*/
session_start();

/*$_SESSION['nombre'];
$_SESSION['rol'];*/

?>
  <article id="imagen"><img src="imagenes/ejercer.png" title="Icono diseñado por Freepik desde www.flaticon.com con licencia CC 3.0 BY"></article>
  <h1 id="tituloWeb">Centro Deportivo MusclePlus</h1>
  <?php
    if( empty($_SESSION) ){
   ?>
  <article id="login">
    <form action="./php_script/check_access.php" method="post">
      <table cellspacing="0">
        <tbody>
          <tr>
            <td>
              <label for="dni">DNI:</label>
            </td>
            <td>
              <label for="password">Contraseña:</label>
            </td>
          </tr>
          <tr>
            <td>
              <input id="dni" name="dni" type="text"/>
            </td>
            <td>
              <input id="password" name="password" type="password"/>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <input type="submit" value="Aceptar"/>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </article>
  <?php } else{//fin if( empty($_SESSION['nomre']) ) ?>
  <article id="login">
    <p>Bienvenido <?php echo $_SESSION['nombre'] ?></p>
    <a href="./php_script/log_out.php">Log Out</a>
  </article>
<?php
  }//fin del else
 ?>
