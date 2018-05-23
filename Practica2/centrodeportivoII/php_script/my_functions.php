<?php
/*  ***************************************************************************
    ***************************************************************************
          FUNCIONES PARA TRABAJAR CON LOS USUARIOS (table:usuario)
    ***************************************************************************
    ***************************************************************************/

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
function insertUser($dni, $psw, $nombre, $nacimiento, $calle, $ciudad, $zip, $email, $telefono, $period, $conocist, $rol){
	global $conex;

	/*INSERCION DE DATOS EN LA TABLA*/
	$inserta = "INSERT INTO usuario (dni, password, nombre, nacimiento, calle, ciudad, zip, email, telefono, periodo, conociste, rol) VALUES ('".$dni."','".$psw."', '".$nombre."', '".$nacimiento."','".$calle."', '".$ciudad."', '".$zip."', '".$email."', '".$telefono."','".$period."', '".$conocist."', '".$rol."')";

	if( !mysqli_query($conex, $inserta) ) {
		return false;
	} else {
		return true;
	}
}

/*Funcion que devuelve los datos de un usuario por su nombre de usuario y clave*/
function searchUser($dni, $clave){
	global $conex;
	$consulta = "SELECT * FROM usuario WHERE dni = '".$dni."' AND password = '".$clave."'";

	//Si falla la conexcion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}

/*Funcion que obtiene todos los usuarios de la BD*/
function listUsersAll(){
	global $conex;
	//$consulta = "SELECT * FROM usuarios WHERE dni != '".$Dni."' ORDER BY dni ASC";
  $consulta = "SELECT * FROM usuario ORDER BY dni ASC";

	//Si falla la conexcion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}

/*Funcion que obtiene todos los usuarios con un determinado ROL*/
function listUserRoll($rol){
	global $conex;
	//$consulta = "SELECT * FROM usuario WHERE dni != '".$Dni."' ORDER BY dni ASC";
  $consulta = "SELECT * FROM usuario WHERE rol == '".$rol."' ORDER BY dni ASC";

	//Si falla la conexcion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}

/*Funcion que usaremos para obtener los datos de un usuario por su DNI*/
function obtenerDatosUser($Dni){
	global $conex;
	$consulta = "SELECT * FROM usuario WHERE dni = '".$Dni."'";

	//Si falla la conexcion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}

/*Funcion para modificar los datos de un usuario*/
function editUser($dni, $psw, $nombre, $nacimiento, $calle, $ciudad, $zip, $email, $telefono, $periodo, $rol){
	global $conex;

	/*MODIFICACION DE DATOS EN LA TABLA*/
	$consulta = "UPDATE usuario SET  dni='".$dni."',password='".$psw."', nombre='".$nombre."', nacimiento='".$nacimiento.", calle='".$calle."', ciudad='".$ciudad."', zip=¡".$zip.", email='".$email."', telefono='".$telefono."', periodo='".$periodo."', rol='".$rol."' WHERE dni = '".$dni."'";


	if( !mysqli_query($conex, $consulta) ) {
		return false;
	} else {
		return true;
	}
}

/*Funcion para eliminar un usuario de la BD */
function eliminarUser($Dni){
	global $conex;

	/*MODIFICACION DE DATOS EN LA TABLA*/
	$consulta = "DELETE FROM usuarios WHERE dni = '".$Dni."'";

	if( !mysqli_query($conex, $consulta) ) {
		return false;
	} else {
		return true;
	}
}


 ?>