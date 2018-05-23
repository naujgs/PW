/*	funcion para validar los datos del formulario de modificacion de datos de un usuario*/
function modifica_datos_registro(){
	alert('dentro');

	/*obtengo los datos que deseo validar*/
	nombre = document.getElementById("name").value;
	clave = document.getElementById("password").value;
  direccion = document.getElementById("street").value;
  zip = document.getElementById("zip").value;
	email = document.getElementById("email").value;
	alert(nombre);
	/*compruebo que obtengo bien los datos*/

	var error = true;

/*	Comprobamos el NOMBRE*/

	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
		alert('ERROR. El campo NOMBRE está vacio');
		error = false;
	}

/*	Comprobamos la CONTRASEÑA*/
	/*	Compruebo que el campo no esta vacio o tiene espacios en blanco*/
	if( clave == null || clave.length == 0 || /^\s+$/.test(clave) ) {
		alert('ERROR. El campo CONTRASEÑA está vacio');
		error = false;
	}

	/*	Compruebo que la contraseña tenga al menos 5 caracteres y no mas de 8*/
	if( clave.length < 5 && clave.length > 0 &&clave.length > 8){
		alert('La CONTRASEÑA debe tener entre 5 y 8 caracteres');
		error = false;
	}

	/*	Compruebo que la direccion no esta vacia*/
	if( direccion == null || direccion.length == 0 || /^\s+$/.test(direccion) ){
		alert('ERROR. El campo DIRECCION está vacio');
		error = false;
	}

  /*	Compruebo que el campo no esta vacio o tiene espacios en blanco*/
  if( zip == null || zip.length == 0 || /^\s+$/.test(zip) ) {
    alert('ERROR. El campo CODIGO POSTAL está vacio');
    error = false;
  }

/*	Comprobamos el CORREO ELECTRONICO*/
	/*	Comprobamos que el EMAIL no esta vacio*/
	if( email == null || email.length == 0 || /^\s+$/.test(email) ){
		alert('ERROR. El campo EMAIL está vacio');
		error = false;
	}

	/* Si en algun momento se hemos activado el booleano error, devolvemos false para que no se envie,
true en caso contrario */
	/*if(error){
		return false;
	}else{
		return true;
	}*/
  return error;
}
