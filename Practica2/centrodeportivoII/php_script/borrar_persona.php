<?php

	//Iniciamos/Recuperamos la sesion activa con php
	session_start();

	//Incluyo datos de conexion y funciones
	include("./datos_conexion.php");
	include("./my_functions.php");

	/*//	Compruebo que todos los campos de registro esan llenos
	if( isset($_POST['dni'], $_POST['name'], $_POST['password'], $_POST['birth'], $_POST['street'], $_POST['city'], $_POST['zip'], $_POST['email'], $_POST['mobile'], $_POST['period'], $_POST['rol'], $_POST['know']) )
	{*/
		//alert("Todos campos");
		//compruebo si se realiza la conexion con la base de datos
		if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos) ){
//			alert('conexion');
			//Obtenemos datos pasados por el formulario de acceso
			$id = $_GET['dni'];
			//alert('No DNI');
			//	El DNI introducido no esta en la base de datos
      //padre NULL porque el es padre. Hijo NULL, porque todavia no tiene
			if( eliminarUser($id) ){
				//alert('user insertado');
				?>
        <?php $page = $_SERVER['HTTP_REFERER']; ?>
      <!-- REDIRECCIONADO -->
      <script type="text/javascript">setTimeout("location.href='<?php echo $page ?>'", 2000);</script>
				<?php

			}else{//	fin if(insertar datos) 29|54
				//alert('user NO insertado');
				?>
    			<center>
					<p>ERROR!!</p>
					<p>No se pudo eliminar a la persona de la base de datos</p>
					<p>Contacte con el administrador del sistema</p>
   					<img width="150px" src="../imagenes/giphy.gif"/>
    			</center>
          <?php $page = $_SERVER['HTTP_REFERER']; ?>
				<!-- REDIRECCIONADO -->
				<script type="text/javascript">setTimeout("location.href='<?php echo $page ?>'", 2000);</script>
    			<?php
			}	//fin else if(insertar datos) 39

			//Cerramos conexion con BD
			closeConexion($conex);
		}else{	//fin comprobar conexion base datos
			//alert('No Conexion datos');
		?>
        <center>
			<p>ERROR!! En la conexión con la Base de Datos</p>
			<p>Contacte con el administrador del sistema</p>
       		<img width="150px" src="../imagenes/giphy.gif"/>
        </center>

		<!-- REDIRECCIONADO -->
       	<script type="text/javascript">setTimeout("location.href='./log_out.php'", 2000);</script>
		<?php
		}
?>
