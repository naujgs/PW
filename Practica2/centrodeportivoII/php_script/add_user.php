<?php

	//Iniciamos/Recuperamos la sesion activa con php
	session_start();

	//Incluyo datos de conexion y funciones
	include("../datos_conexion.php");
	include("../mis_funciones.php");

	//	Compruebo que todos los campos de registro esan llenos
	if( isset($_POST['dni'], $_POST['name'], $_POST['password'], $_POST['birth'], $_POST['street'], $_POST['city'], $_POST['zip'], $_POST['email'], $_POST['mobile'], $_POST['period'], $_POST['rol'], $_POST['know']) )
	{
		//compruebo si se realiza la conexion con la base de datos
		if( conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos) ){
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
			$conocer = $_POST['know'];

			/*	Comprobamos si ya tenemos el dni introducido en nuestra base de datos	*/
			if(!comprobarDNI($dni)){
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

				//	El DNI introducido no esta en la base de datos
				if(insertUser($dni, $nombre, $email, $username, $clave, $rol)){
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
	}else{	/*	Fin de if(isset($_POST['dni'], $_POST['name'], $_POST['password'], $_POST['birth'], $_POST['street'], $_POST['city'], $_POST['zip'], $_POST['email'], $_POST['mobile'], $_POST['period'], $_POST['rol'], $_POST['know']))	*/
		//Si se intenta acceder desde URL sin formulario de acceso, se le echa fuera al registro
		?>
		<!--REDIRECCION-->
		<script type="text/javascript">location.href = "../alta_usuario.php";</script>
		<?php
	}

?>
