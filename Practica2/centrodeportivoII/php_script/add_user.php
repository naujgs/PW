<?php

	//Iniciamos/Recuperamos la sesion activa con php
	session_start();

	//Incluyo datos de conexion y funciones
	include("../datos_conexion.php");
	include("../mis_funciones.php");

	//	Compruebo que todos los campos de registro esan llenos
	if(isset($_POST['dni'], $_POST['name'], $_POST['birth'], $_POST['street'], $_POST['number'], $_POST['city'], $_POST['zip'], $_POST['email'], $_POST['password']))
	{
		//compruebo si se realiza la conexion con la base de datos
		if(conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos) ){
			//Obtenemos datos pasados por el formulario de acceso
			$dni = $_POST['dni'];
			$nombre = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$clave = $_POST['password'];
			$rol = $_POST['rol'];

			/*	Comprobamos si ya tenemos el dni introducido en nuestra base de datos	*/
			if(!comprobarDNI($dni)){
			?>
				<center>
                    <p>ERROR. El D.N.I. introducido ya está registrado</p>
                    <p>Espere será redireccionado</p>
                    <img width="150px" src="../../img/giphy.gif"/>
                </center>

                <!--REDIRECCION-->
				<script type="text/javascript">setTimeout("location.href='../alta_usuario.php'", 3000);</script>
			<?php

			}else	//fin if(existe DNI)
				if(!comprobarUsername($username)){
					?>
					<center>
						<p>ERROR. El Nombre de usuario introducido ya está registrado</p>
						<p>Espere será redireccionado</p>
						<img width="150px" src="../../img/giphy.gif"/>
					</center>

					<!--REDIRECCION-->
					<script type="text/javascript">setTimeout("location.href='../alta_usuario.php'", 3000);</script>
					<?php
				}else{	//fin if(existe DNI)

				//	El DNI introducido no esta en la base de datos
				if(insertUser($dni, $nombre, $email, $username, $clave, $rol)){
					?>
					<center>
					<p>All right!!</p>
					<p>El registro se realizó con éxito</p><br/><br/>
	                <p>Espere será redireccionado</p>
                   	<img width="150px" src="../../img/giphy.gif"/>
                    </center>
							<!-- REDIRECCIONADO -->
               		<script type="text/javascript">setTimeout("location.href='../index_logueo.php'", 3000);</script>
					<?php

				}else{//	fin if(insertar datos) 29
					?>
                    <center>
					<p>ERROR!!</p>
					<p>El usuario no pudo ser insertado en la base de datos</p>
					<p>Contacte con el administrador del sistema</p>
                   	<img width="150px" src="../../img/giphy.gif"/>
                    </center>
							<!-- REDIRECCIONADO -->
               		<script type="text/javascript">setTimeout("location.href='../index_logueo.php'", 3000);</script>
                    <?php
				}	//fin else if(insertar datos) 39
			}// fin else del if(existe DNI) 27


			//Cerramos conexion con BD
			closeConexion($conex);
		}else{	//fin comprobar conexion base datos	11
			?>
            <center>
			<p>ERROR!! En la conexión con la Base de Datos</p>
			<p>Contacte con el administrador del sistema</p>
           	<img width="150px" src="../../img/giphy.gif"/>
            </center>

				<!-- REDIRECCIONADO -->
           	<script type="text/javascript">setTimeout("location.href='./log_out.php'", 3000);</script>
			<?php
		}
	}else{	/*	Fin de if(isset($_POST['dni'], $_POST['username'], $_POST['email'], $_POST['password']))	8*/
	//Si se intenta acceder desde URL sin formulario de acceso, se le echa fuera al registro
		?>
		<!--REDIRECCION-->
		<script type="text/javascript">location.href = "../alta_usuario.php";</script>
		<?php
	}

?>
