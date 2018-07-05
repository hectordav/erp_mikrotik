<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
<style>
    img {
        height: auto;
        max-width: 100%;
        }
</style>
</head>
<header>
<body id="page-top" style="background-color: #FEDB1D">
    <div class="col-md-12 col-sm-12  col-xs-12">
<br>
<div class="col-md-6 col-sm-6 col-xs-6" align="center">
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" align="center">
<p>
<p>
    <div class="header-content-inner">
     <p><br><br><br><br>
    <IMG SRC="<?php $this->config->base_url()?>assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=320 HEIGHT=96 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
  //Creamos una función que detecte el idioma del navegador del cliente.
  function getUserLanguage() {
   $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
   return $idioma;
  }

  //Almacenamos dicho idioma en una variable
  $user_language=getUserLanguage();
  //De acuerdo al idioma hacemos una o varias redirecciones.
  if($user_language=='en'){?>
  <h2 style="color: white; background= black" class="animated fadeInUp"><strong>
ok to access Free wifi</strong></h2>
  <?}
  elseif($user_language=='es'){?>
  <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Ok para Acceso Free-wifi</strong></h2>
  <?}
  elseif($user_language=='ca'){?>
  <h2 style="color: white; background= black" class="animated fadeInUp"><strong>ok per accés free wifi</strong></h2>
  <?}else{?>
  <h2 style="color: white; background= black" class="animated fadeInUp"><strong>
ok to access Free wifi</strong></h2>
  <?}?>

        <!-- **************************************** -->
          <form action="<?php $this->config->base_url()?>login/select_int" method="post" accept-charset="utf-8">
            <!-- <?php if ($mac): ?> -->
  <!--   <input type="hidden" name="mac" id="mac" value="<?php echo $mac?>">
    <input type="hidden" name="ip" value="<?php echo $ip ?>">
    <input type="hidden" name="username" value="<?php echo $username?>">
    <input type="hidden" name="link-login" value="<?php echo $link_login?>">
    <input type="hidden" name="link-orig" value="<?php echo $link_orig?>">
    <input type="hidden" name="error" value="<?php echo $error?>">
    <input type="hidden" name="chap-id" value="<?php echo $chap_id ?>">
    <input type="hidden" name="chap-challenge" value="<?php echo $chap_challenge?>">
    <input type="hidden" name="link-login-only" value="<?php echo $link_login_only?>)">
    <input type="hidden" name="link-orig-esc" value="<?php echo $link_orig_esc?>">
    <input type="hidden" name="mac-esc" value="<?php echo $mac_esc?>">
      <!--  <h2 style="color: white; background= black" class="animated fadeInUp"><strong>SITIO WEB EN MANTENIMIENTO. PRONTO ESTAREMOS AL AIRE.</strong></h2> --> -->
        <button type="submit" class="btn"  style="background-color: #FEDB1D"> <IMG SRC="<?php $this->config->base_url()?>assets/img/Ok.png" class="animated fadeInRight" WIDTH=150 HEIGHT=50 BORDER=0 ALT="Bluecarrot"style="max-width:350px;"></button>
        </form>
       <br>
       <br>
       <br>
       <br>
    <label>Al hacer ok aceptas nuestras<a href="<?= $this->config->base_url();?>assets/img/condiciones_uso_bluecarrot_wifi.pdf" download="condiciones_uso_bluecarrot_wifi.pdf"> &nbsp; &nbsp;condiciones uso bluecarrot</a></h2></label>
        </div>
    </div>
</header>
<!-- <?php else: ?> -->

    <IMG SRC="<?php $this->config->base_url()?>assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=320 HEIGHT=96 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
<!-- <h2 style="color: white; background= black" class="animated fadeInUp"><strong>SITIO WEB EN MANTENIMIENTO. PRONTO ESTAREMOS AL AIRE.</strong></h2> -->
    <!-- <?php echo "<h1><strong>Equipo no Registrado</strong></h1>";?> -->
    <div>

    </div>
    <!-- <?php endif ?> -->


<!-- jQuery -->
<script src="<?php echo $this->config->base_url();?>assets/js/jquery-1.9.1.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->config->base_url();?>assets/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="<?php echo $this->config->base_url();?>assets/js/scrollreveal/scrollreveal.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- Theme JavaScript -->
<script src="<?php echo $this->config->base_url();?>assets/js/creative.min.js"></script>
</body>
</html>
