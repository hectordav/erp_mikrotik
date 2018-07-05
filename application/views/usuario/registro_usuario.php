<!DOCTYPE html>
<html lang="es">
<head>
<title>Acceso Wifi BlueCarrot</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo  $this->config->base_url();?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?php echo $this->config->base_url();?>assets/css/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- Plugin CSS -->
<link href="<?php echo $this->config->base_url();?>assets/css/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url();?>assets/css/animate.min.css" rel="stylesheet">
<!-- Theme CSS -->
<link href="<?php echo $this->config->base_url();?>assets/css/creative.css" rel="stylesheet">
<script src="<?php echo $this->config->base_url();?>assets/js/jquery-1.9.1.js"></script>
    <!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->config->base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
<script src="<?php echo $this->config->base_url();?>assets/js/scrollreveal/scrollreveal.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

</head>
<body align="center"  style="background-color: #FEDB1D">
   	 <div id="palabra" style="display:block">
   	  <IMG SRC="<?=$this->config->base_url()?>assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=320 HEIGHT=96 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">

   	 </div>
     <div class="col-md-12 col-sm-12 col-xs-12">
           		<p></p>
					<div class="col-md-3 col-sm-3 col-xs-3">

					</div>
<form action="<?=$this->config->base_url();?>usuario/guardar_usuario_final" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
<input type="hidden" name="txt_id_usuario" id="txt_id_usuario" value="<?=$id_usuario?>">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-1 col-sm-1 col-xs-1" align="right">
      <label>Nombre</label>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="" placeholder="Ingrese su nombre" required="required" title="">
    <br>
  </div>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-1 col-sm-1 col-xs-1" align="right">
      <label>Login</label>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
    <input type="text" name="txt_login" id="txt_login" class="form-control" value="" placeholder="Ingrese login" required="required" title="">
    <br>
  </div>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-2 col-sm-2 col-xs-2"></div>
      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>clave</label>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
      <input type="password" name="txt_clave" id="txt_clave" class="form-control" value="" placeholder="Ingrese password" required="required" title="">
      <br>
    </div>
  </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-2 col-sm-2 col-xs-2"></div>
      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>Descripcion</label>

      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
      <input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control" value="" placeholder="Describe como eres" required="required" title="">
      <br>
    </div>
  </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-2 col-sm-2 col-xs-2"></div>
      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>Sobre Mi</label>

      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
      <input type="text" name="txt_sobre_mi" id="txt_sobre_mi" class="form-control" value="" placeholder="Hablanos un poco sobre ti" required="required" title="">
      <br>
    </div>
  </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-2 col-sm-2 col-xs-2"></div>
      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>Imagen</label>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
      <input type="file" name="mi_imagen" class="file">
      <br>
    </div>
  </div>
				</div>
       <button type="submit" class="btn btn-success btn-lg">Guardar</button>
       </form>
<script id="js_externo" src="<?=$this->config->base_url()?>assets/js/bcvideo.js"></script>

</body>
</html>
