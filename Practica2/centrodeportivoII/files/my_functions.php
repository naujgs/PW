<?php
//Variable ambito global. La iniciamos asi para evitar problemas
$conex = false;

/*FUNCIONES PARA TRABAJAR CON LOS USUARIOS: ALTAS, MODIFICACIONES, BAJAS, ETC */

/*Funcion para conectar con la BaseDatos*/
function conectarBaseDatos($host, $usuario_bd, $clave_bd, $basedatos){
	//Cuando queramos usar la variable conex, debemos llamarla
	global $conex;
	if( !$conex = mysqli_connect($host, $usuario_bd, $clave_bd) ){
		return false;
	} else if( !mysqli_select_db($conex, $basedatos) ) {
		return false;
	} else {
		//Establecemos que la conexion se haga con la codificacion UTF8
		mysqli_query($conex, "SET NAMES 'utf8'");
		return true;
	}
}

//Funcion para cerrar conexion con base datos
function closeConexion($conex){
	global $conex;
	mysqli_close($conex);
}

/*Funcion para cuando un usuario se registra en el sistema*/
function insertUser($dni, $nombre, $nacimiento, $calle, $ciudad, $zip, $email, $telefono, $period, $conocist, $rol){
	global $conex;

	/*INSERCION DE DATOS EN LA TABLA*/
	$inserta = "INSERT INTO usuario (dni, nombre, nacimiento, calle, ciudad, zip, email, telefono, periodo, conociste, rol) VALUES ('".$dni."', '".$nombre."', '".$nacimiento."','".$calle."', '".$ciudad."', '".$zip."', '".$email."', '".$telefono."','".$period."', '".$conocist."', '".$rol."')";

	if( !mysqli_query($conex, $inserta) ) {
		return false;
	} else {
		return true;
	}
}

/*Funcion que devuelve los datos de un usuario por su nombre de usuario y clave*/
function searchUser($Username, $Clave){
	global $conex;
	$consulta = "SELECT * FROM usuarios WHERE username = '".$Username."' AND clave = '".$Clave."'";

	//Si falla la conexcion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}


 ?>
