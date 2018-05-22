<?php
//Creo una sesion
	session_start();

	//Incluimos las funciones y datos de conexion
	include("../my_functions.php");
	include("../datos_conexion.php");

	if(conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos) ){

		//Compruebo que las variables usuario y contraseña vengan del formulario de acceso, porque no estan vacias.
		if(isset($_POST['dni'], $_POST['password'])){

			$dni = $_POST['dni'];
			$clave = $_POST['password'];

			//usamos nuestra funcion para consultar los datos del Usuario logueado y lo guardamos en la cookie "SESSION"
			if($usuario = searchUser($dni, $clave)){

				while($valor = mysqli_fetch_array($usuario)){ //mysqli_fetch_array -> guarda en un array la informacion de $usuario
          /*  "Asigno" valores a la sesion. Luego sera habierta con <session_start()>*/
					$_SESSION['nombre'] = $valor['nombre'];
					$_SESSION['rol'] = $valor['rol'];
					$_SESSION['dni'] = $valor['dni'];
				}

			}else{
				//si el usuario no existe, mostramos un error y redireccionamos
				?>
          <center>
  				      <p>ERROR!!</p>
                <p>El usuario introducido no está registrado en el sistema</p>
                <img width="150px" src="../../imgagenes/giphy.gif"/>
          </center>
  				<!-- REDIRECCIONADO -->
         	<script type="text/javascript">setTimeout("location.href='../../index.php'", 3000);</script>
				<?php
			}
			//cerramos la sesion iniciada al principio
			closeConexion($conex);

		}else{
			//Si se intenta acceder desde URL sin formulario de acceso, se le echa fuera a la web de acceso
			?>
            	<center> <img width="150px" src="../../img/giphy.gif"/></center>
				<!--REDIRECCION-->
			<script type="text/javascript">location.href = "../../index.php";</script>
			<?php
		}
	} else {
			//Si falla la conexion mostramos error por una funcion javascript
			?>
        <center>
          <p align="center">ERROR!! En la conexión con la Base de Datos</p>
          <p align="center">Contacte con el administrador del sistema</p>
          <img width="150px" src="../../img/giphy.gif"/>
        </center>

					<!-- REDIRECCIONADO -->
				<script type="text/javascript">setTimeout("location.href='../../index.php'", 3000);</script>
      <?php
	}
?>
