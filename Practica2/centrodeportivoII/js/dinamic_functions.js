

/*	funcion para validar los datos del formulario de modificacion de datos de un usuario*/
function validador_formulario_usuario(){
//	alert('dentro');

	/*obtengo los datos que deseo validar*/
	dni = document.getElementById("dni").value;
	nombre = document.getElementById("name").value;
	clave = document.getElementById("password").value;
  direccion = document.getElementById("street").value;
  zip = document.getElementById("zip").value;
	email = document.getElementById("email").value;
	alert(nombre);
	/*compruebo que obtengo bien los datos*/

	var error = true;

	/*	Comprobamos el DNI*/
		var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

		/*	Comprobamos que DNI no esta vacio*/
		if( dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {
			alert('ERROR. El campo DNI está vacio');
			error = false;
		}else{
			/*	Comprobamos que el formato es el correcto. 8numeros y una letra*/
			if( dni.length>0 && !(/^\d{8}[A-Z]$/.test(dni)) ) {
				alert('Formato DNI incorrecto.\nEscriba 8 numeros y 1 letra')
				error = false;
			}

			/*	Compruebo si la letra del DNI corresponde con el numero introducido*/
			if(dni.charAt(8) != letras[(dni.substring(0, 8))%23]) {
				alert('ERROR. Letra DNI incorrecta o minuscula');
				error = false;
			}
		}

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

  return error;
}

function validador_crear_hilo(){
//Comprobamos que ambos campos de un hilo no estan vacios

	titulo = document.getElementById("titulo").value;
	msj = document.getElementById("mensaje").value;
	var pass = true;

	if( titulo == null || titulo.length == 0 || /^\s+$/.test(titulo) ) {
		alert('ERROR. El campo TITULO está vacio');
		pass = false;
	}

	if( mensaje == null || mensaje.length == 0 || /^\s+$/.test(mensaje) ) {
		alert('ERROR. El campo MENSAJE está vacio');
		pass = false;
	}

	return pass;

}
