
function isAndroidDevice(userAgent){
	if ( userAgent.match('android') ){
		return true;
	}else{
		return false;	
	}
}

function isAppleDevice(userAgent){
	// Apple IOS CNA Detection
	// source : http://stackoverflow.com/a/20035215
	if ( userAgent.match('iphone') || userAgent.match('ipad')){
		return true;
	}else{
		return false;	
	}
}

function isMacDevice(userAgent){
	// Apple IOS CNA Detection
	// source : http://stackoverflow.com/a/20035215
	if ( userAgent.match('macintosh') ){
		return true;
	}else{
		return false;	
	}
}

/**
* Función para saber si el dispositivo cliente es un PC.
* @param userAgent Variable que guarda la información del dispositivo donde
* se esta ejecutando.
*/
function isPcDevice(userAgent){
	if ( userAgent.match('windows nt') ){
		return true;
	}else{
		return false;	
	}
}

/**
* Función para saber si el dispositivo cliente es un dispositivo mobil que utiliza windows.
* @param userAgent Variable que guarda la información del dispositivo donde
* se esta ejecutando.
*/
function isWindowsDevice(userAgent){
	if ( userAgent.match('windows phone') ){
		return true;
	}else{
		return false;	
	}
}

/**
* Función que mira los metadatos del navegador y los compara con el arrayDispositivos para
* detectar el userAgent.
* @param ruta Ruta donde llamará al .php funciones para guardar el userAgent en caso de no conocerlo.
* @return String Devuelve el nombre del userAgent.
*/
function localizarUserAgent(ruta){
	var userAgent;
	var arrayDispositivos = ["iphone", "ipad", "windows phone", "android", "windows nt", "macintosh", "linux", "playstation", "cros", "blackberry", "bb10", "playbook", "hisense", "bada"];
	var posArrayDispositivos=[];
	var auxPos, auxPos2, auxDisp;
	var conocido = false;
	
	userAgent = navigator.userAgent.toLowerCase();

	//Miro en que posición aparece las palabras del arrayDispositivos
	for(i=0; i<arrayDispositivos.length; i++){
		posArrayDispositivos[i] = userAgent.indexOf(arrayDispositivos[i]); 
		if(posArrayDispositivos[i] == -1){
			 posArrayDispositivos[i] =1000;
		}else{
			conocido = true;
		}
	}
	
	if(conocido){//Si el userAgent pertenece a alguno de la lista del Array
		//Ordenamos el array según el valor de las posiciones más pequeñas
		for(i=1; i<posArrayDispositivos.length; i++){
			for(j=i; j>0; j--){
				auxPos = posArrayDispositivos[j-1];
				auxPos2 = posArrayDispositivos[j];
				if(auxPos>auxPos2){
					posArrayDispositivos[j] = auxPos;
					posArrayDispositivos[j-1] = auxPos2;
					
					auxDisp =arrayDispositivos[j-1];
					arrayDispositivos[j-1] = arrayDispositivos[j];
					arrayDispositivos[j] = auxDisp;
				}else{
					j=0;
				}
			}
		}
	}else{//Si NO es ninguno del Array
		arrayDispositivos[0] = "otro";
		registrarUserAgent(navigator.userAgent, ruta);
	}
	return arrayDispositivos[0];
}

/**
* Función que envia a un php la información para registrar en la base de datos la información del 
* user agent desconocido.
* @param datosUA Los datos que proporciona el navegador para detectar el user agent.
* @param ruta Ruta donde llamará al .php funciones para guardar el userAgent en caso de no conocerlo.
*/
function registrarUserAgent(datosUA, ruta){
	var xmlhttp;
	var bd = ruta+"?query=insert into LOGS (CATEGORIA, DATOS) values ('USER_AGENT','"+datosUA+"')";
	
	if(window.XMLHttpRequest) {  // Navegadores que siguen los estándares
	  xmlhttp = new XMLHttpRequest();
	}
	else if(window.ActiveXObject) {  // Navegadores obsoletos
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	// Preparar la funcion de respuesta
  	xmlhttp.onreadystatechange = actualizaBD;

	xmlhttp.open("POST", bd, true);
	xmlhttp.send();
	function actualizaBD(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			//alert("RESPUESTA: "+xmlhttp.responseText);
		}
	}
}