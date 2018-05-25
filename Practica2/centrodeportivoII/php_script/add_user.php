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
			$dni = $_POST['dni'];
			$nombre = $_POST['name'];
			$clave = $_POST['password'];
			$nacimiento = $_POST['birth'];
			$calle = $_POST['street'];
			$ciudad = $_POST['city'];
			$codPost = $_POST['zip'];
			$email = $_POST['email'];
			$telefono = $_POST['mobile'];
			$rol = $_POST['rol'];
			//$tiempo = $_POST['period'];
			$tiempo = $_POST['periodo'];
			$conocer = $_POST['know'];

			/*	Comprobamos si ya tenemos el dni introducido en nuestra base de datos	*/
			if(comprobarDNI($dni)){
				//alert('SI DNI');
				?>
				<center>
	        		<p>ERROR. El D.N.I. introducido ya está registrado</p>
	        		<p>Espere será redireccionado</p>
	        		<img width="150px" src="../imagenes/giphy.gif"/>
	    		</center>

	        <!--REDIRECCION-->
					<script type="text/javascript">setTimeout("location.href='../altausuario.php'", 3000);</script>
				<?php

			}else{	//fin if(existe DNI)
				//alert('No DNI');
				//	El DNI introducido no esta en la base de datos
				if( insertUser($dni, $clave, $nombre, $nacimiento, $calle, $ciudad, $codPost, $email, $telefono, $tiempo, $conocer, $rol) ){
					//alert('user insertado');
					?>
						<center>
							<p>All right!!</p>
							<p>El registro se realizó con éxito</p><br/><br/>
                			<p>Espere será redireccionado</p>
               				<img width="150px" src="../imagenes/giphy.gif"/>
                		</center>
						<!-- REDIRECCIONADO -->
           				<script type="text/javascript">setTimeout("location.href='../index.php'", 3000);</script>
					<?php

				}else{//	fin if(insertar datos) 29|54
					//alert('user NO onsertado');
					?>
            			<center>
							<p>ERROR!!</p>
							<p>El usuario no pudo ser insertado en la base de datos</p>
							<p>Contacte con el administrador del sistema</p>
           					<img width="150px" src="../imagenes/giphy.gif"/>
            			</center>
						<!-- REDIRECCIONADO -->
       					<script type="text/javascript">setTimeout("location.href='../index.php'", 3000);</script>
            		<?php
				}	//fin else if(insertar datos) 39
			}
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
       	<script type="text/javascript">setTimeout("location.href='./log_out.php'", 3000);</script>
		<?php
		}
	/*}else{	/*	Fin de if(isset($_POST['dni'], $_POST['name'], $_POST['password'], $_POST['birth'], $_POST['street'], $_POST['city'], $_POST['zip'], $_POST['email'], $_POST['mobile'], $_POST['period'], $_POST['rol'], $_POST['know']))	*/
		//Si se intenta acceder desde URL sin formulario de acceso, se le echa fuera al registro
	/*	alert('falta campo');
		?>
		<!--REDIRECCION-->
		<script type="text/javascript">location.href = "../altausuario.php";</script>
		<?php
	}*/

?>
