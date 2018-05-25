<?php
	//Iniciamos/Recuperamos la sesion activa con php
	session_start();

	/*	compruebo que se ha iniciado sesion. De esta forma evitamos que accedan a la url sin logearse antes*/
  if( empty($_SESSION) ){
  ?>
        <!--	Redirijo	-->
    <script type="text/javascript"> location.href="./index.php";</script>
    <?php
  }

	//Incluimos las funciones php que creado y los datos de conexion de la base de datos
	include("./my_functions.php");
	include("./datos_conexion.php");

	//Si conectamos OK con la base de datos
	if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos)){
		//	obtenemos los datos que obtenemos del formulario

		/*	He obtenido el dni pre-cambio por si el dni que queremos ponerle ya estubiera en nuestra base de datos. Encontes le dejariamos establecido el que hay ahora mismo*/
		$id = $_SESSION['dni'];
		$dni_new = $_POST['dni'];
		$nombre_new = $_POST['name'];
		$birthD_new = $_POST['birth'];
		$direccion_new = $_POST['street'];
		$ciudad_new = $_POST['city'];
		$zip_new = $_POST['zip'];
		//if(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);)
		$email_new = $_POST['email'];
		$telefono_new = $_POST['telefono'];
		$periodo_new = $_POST['periodo'];
		$clave_new = $_POST['password'];
		$rol = $_SESSION['rol'];

		//hacer un if, si los validadores dan false, redirecciono al formulario

		//Edito los datos en la base de datos
		if(editUser($id, $dni_new, $clave_new, $nombre_new, $birthD_new, $direccion_new, $ciudad_new, $zip_new, $email_new, $telefono_new, $periodo_new, $rol)){
			//actualizo la sesion
			$_SESSION['nombre'] = $nombre_new;
			$_SESSION['dni'] = $dni_new;
			?>
			<center>
			<p>Datos modificados corréctamente</p>
			<p>Espere, será redireccionado</p>
			<img width="150px" src="../imagenes/giphy.gif"/>
			</center>

			<!--REDIRECCION-->
			<script type="text/javascript">setTimeout("location.href='../edit_my_info.php'", 3500);</script>
			<?php
		}else{
				?>
			<center>
			<p >ERROR!! No se han podido modificar los datos</p>
			<p>Espere, será redireccionado</p>
			<h1>error 1</h1>
			<img width="150px" src="../imagenes/giphy.gif"/>
			</center>

				<!-- REDIRECCIONADO -->
			<script type="text/javascript">setTimeout("location.href='../edit_my_info.php'", 3000);</script>
			<?php
			}
		closeConexion($conex);
	}else{	//si falla la base de datos
	?>
      <center>
	<p >ERROR!! En la conexión con la Base de Datos</p>
	<p>Contacte con el administrador del sistema</p>
	<img width="150px" src="../imagenes/giphy.gif"/>
      </center>

		<!-- REDIRECCIONADO -->
    	<script type="text/javascript">setTimeout("location.href='log_out.php'", 3000);</script>
	<?php

	}
?>
