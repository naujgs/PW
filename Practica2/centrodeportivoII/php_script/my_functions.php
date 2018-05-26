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

/* Funcion para insertar un nuevo hilo en la base de datos */
function insertHilo( $autor, $titulo, $mensaje){
	global $conex;

	/* ESCRIBIMOS LA INSERCION PARA LUEGO EJECUTARLA*/
	$inserta = "INSERT INTO foro (titulo, mensaje, id_autor) VALUES ('".$titulo."','".$mensaje."','".$autor."')";

	if ( !mysqli_query($conex, $inserta) ) {
		return false;
	}else{
		return true;
	}
}
/* Funcion para insertar un post en un hilo ya creado */
function insertPost( $autor, $titulo, $mensaje, $padre){
	global $conex;

	/* ESCRIBIMOS LA INSERCION PARA LUEGO EJECUTARLA*/
	$inserta = "INSERT INTO foro (titulo, mensaje, id_padre, id_autor) VALUES ('".$titulo."','".$mensaje."', '".$padre."', '".$autor."')";

	if ( !mysqli_query($conex, $inserta) ) {
		return false;
	}else{
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

function getClientsList(){
	global $conex;
	//$consulta = "SELECT * FROM usuarios WHERE dni != '".$Dni."' ORDER BY dni ASC";
  $consulta = "SELECT * FROM usuario WHERE rol = 'cliente'ORDER BY dni DESC";

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

function obtenerPost($id){
	global $conex;

	$consulta = "SELECT * FROM foro WHERE id_post = '".$id."'";

	// Si falla la conexion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}

}

function obtenerPostHijos($padre){
	global $conex;

	$consulta = "SELECT * FROM 	foro WHERE id_padre = '".$padre."' ORDER BY id_post ASC";

	// Si falla la conexion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}

/*Funcion para modificar los datos de un usuario*/
function editUser($usuario, $dni, $psw, $nombre, $nacimiento, $calle, $ciudad, $zip, $email, $telefono, $periodo, $rol){
	global $conex;

	/*MODIFICACION DE DATOS EN LA TABLA*/

	$consulta = "UPDATE usuario SET  dni='".$dni."',password='".$psw."', nombre='".$nombre."', nacimiento='".$nacimiento."', calle='".$calle."', ciudad='".$ciudad."', zip='".$zip."', email='".$email."', telefono='".$telefono."', periodo='".$periodo."', rol='".$rol."' WHERE dni='".$usuario."'";


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

function borrarPost($post){
	global $conex;

	/*MODIFICACION DE DATOS EN LA TABLA*/
	$consulta = "DELETE FROM foro WHERE id_post = '".$post."'";

	if( !mysqli_query($conex, $consulta) ) {
		return false;
	} else {
		return true;
	}
}

/*Funcion que usaremos para comprobar si un DNI ya esta registrado en la BD, para evitar que un DNI se registre
2 veces*/
function comprobarDNI($Dni){
	global $conex;
	$consulta = "SELECT dni FROM usuarios WHERE dni = '".$Dni."'";

	//Si falla la conexion con la tabla o los datos devueltos es 1 o mas(no se deberia dar el caso), ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) >= 1 ){
		return false;
	} else {
		return true;
	}
}

/*Funcion que obtiene todos los recursos guardados en la BD que aun no haya llegado su dia y hora (futuros)*/
function listadoPostPadre(){
	global $conex;
//busco los elementos que no tengan un post padre. Ellos son padre
	$consulta = "SELECT * FROM foro where id_padre is null";

	//Si falla la conexcion con la tabla o los datos devueltos es 0, ERROR
	if( !$datos = mysqli_query($conex, $consulta) or mysqli_num_rows($datos) < 1 ){
		return false;
	} else {
		//Si todo correcto devuelve datos.
		return $datos;
	}
}




 ?>
