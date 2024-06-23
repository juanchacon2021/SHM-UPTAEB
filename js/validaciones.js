//Validación de todos los campos antes del envio
function validarenvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{6,12}$/,
		$("#nombre"),$("#nombre"),"Solo letras y/o numeros y/o # - entre 3 y 12 caracteres")==0){
		muestraMensaje("Nombre <br/>Solo letras y/o numeros y/o # - entre 3 y 12 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{6,12}$/,
		$("#clave"),$("#sclave"),"Solo letras y/o numeros y/o # - entre 6 y 12 caracteres")==0){
		muestraMensaje("Clave <br/>Solo letras y/o numeros y/o # - entre 6 y 12 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{12,40}$/,
		$("#direccion"),$("#sdireccion"),"Solo letras y/o numeros y/o # - entre 12 y 40 caracteres")==0){
		muestraMensaje("direccion <br/>Solo letras y/o numeros y/o # - entre 12 y 40 caracteres");
		return false;
	}
	else if(validarkeyup(/^[0-9]{10,11}$/,$("#telefono"),
		$("#stelefono"),"El formato debe ser 9999999")==0){
	    muestraMensaje("el telefono debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}
	else if(validarkeyup(/^[0-9]{1,3}$/,$("#edad"),
		$("#sedad"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La edad debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}
	else if(validarkeyup(/^[A-Za-z0-9@.,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{12,40}$/,
		$("#correo"),$("#scorreo"),"Solo letras y/o numeros y/o # - entre 12 y 40 caracteres")==0){
		muestraMensaje("correo <br/>Solo letras y/o numeros y/o # - entre 12 y 40 caracteres");
		return false;
	}	
	else if(validarkeyup(/^[A-Za-z0-9@.,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{2,40}$/,
		$("#nombre"),$("#snombre"),"Solo letras # - entre 2 y 40 caracteres")==0){
		muestraMensaje("apellido <br/>Solo letras # - entre 2 y 40 caracteres");
		return false;
	}	
	else if(validarkeyup(/^[A-Za-z0-9@.,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{2,40}$/,
		$("#apellido"),$("#sapellido"),"Solo letras # - entre 2 y 40 caracteres")==0){
		muestraMensaje("apellido <br/>Solo letras # - entre 12 y 40 caracteres");
		return false;
	}		

	return true;
}