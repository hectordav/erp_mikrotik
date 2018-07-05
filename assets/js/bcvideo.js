var video = document.getElementById("Video1");
if (video.canPlayType) { 
	document.getElementById("boton_play").addEventListener("click", playVideo, false);

    video.addEventListener("ended", function () {
		horaFin = getHora();
		if(getSegundosTranscurridos(horaIni, horaFin)>14){
		
			setVideoVistoIOS();
		}else{
			playVideo();	
		}
	}, false);
	video.addEventListener("timeupdate", function () {
		if(video.currentTime>0){
			document.getElementById("cargando").style.display="none";
		}
	}, false);	
	video.addEventListener("error", function (err) {
		alert("Se ha producido algun error: "+err);
	}, true);
}else{
 alert("Error No puede reproducir");	
}

function play(){
	document.getElementById("video").style.display = "block";
	document.getElementById("cargando").style.display = "block";
	document.getElementById("boton_play").style.display = "none";
	document.getElementById("Video1").controls = false;
	video.play();
	document.getElementById("palabra").style.display = "none";
	document.getElementById("boton_play").style.display = "none";
	document.getElementById("anuncio").style.display = "none";
}

