<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Acceso Wifi BlueCarrot</title>
    <!-- Bootstrap Core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
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


<script type="text/javascript">

function mostrar_boton()
    {
      setTimeout(function() {
        $("#entrar").fadeIn(0);
        },500
        );
    }
</script>

</head>
<body id="page-top" style="background-color: #FEDB1D">


    <header>
    <div class="col-md-12 col-sm-12  col-xs-12">
    <br>

    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
    <p>
    <p>
       <div class="header-content-inner">
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
  <?php foreach ($comparte->result() as $data): ?>

        <IMG   class="img-responsive" SRC="<?=$this->config->base_url()?>uploads/<?= $data->info_comparte_espa?>" class="animated fadeInRight" WIDTH=200 HEIGHT=163 BORDER=0 ALT="comparte">
        </div>
        <?php endforeach ?>
  <?}

  elseif($user_language=='es'){?>
 <?php foreach ($comparte->result() as $data): ?>

        <IMG   class="img-responsive" SRC="<?=$this->config->base_url()?>uploads/<?= $data->info_comparte_eng?>" class="animated fadeInRight" WIDTH=200 HEIGHT=163 BORDER=0 ALT="comparte">
        </div>
        <?php endforeach ?>
  <?}
  elseif($user_language=='ca'){?>
   <?php foreach ($comparte->result() as $data): ?>

        <IMG   class="img-responsive" SRC="<?=$this->config->base_url()?>uploads/<?= $data->info_comparte_cata?>" class="animated fadeInRight" WIDTH=200 HEIGHT=163 BORDER=0 ALT="comparte">
        </div>
        <?php endforeach ?>
  <?}else{?>
  <?php foreach ($comparte->result() as $data): ?>

        <IMG  class="img-responsive" SRC="<?=$this->config->base_url()?>uploads/<?= $data->info_comparte?>" class="animated fadeInRight" WIDTH=400 HEIGHT=163 BORDER=0 ALT="comparte">
        </div>
        <?php endforeach ?>
  <?}?>


        <!-- ************************* -->

            <div class="col-md-12 col-sm-12 col-xs-12">

<?php

  //Almacenamos dicho idioma en una variable
  $user_language=getUserLanguage();

  //De acuerdo al idioma hacemos una o varias redirecciones.
  if($user_language=='en'){?>
   <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Like to continue</strong></h2>
  <?}

  elseif($user_language=='es'){?>
  <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Like para continuar</strong></h2>
  <?}
  elseif($user_language=='ca'){?>
   <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Like per continuar</strong></h2>
  <?}else{?>
   <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Like to continue</strong></h2>
  <?}?>
<!-- ************************************************************ -->

        </div>
        <!-- ******************************** -->
        <div class="col-md-12 col-sm-12 col-xs-12 " align="center">
        <div class="animated fadeInUp">
          <a href="http://www.facebook.com/sharer.php?u=<?= $this->config->base_url();?>login/compartir/<?= $data->id?>" target="blank" onclick="mostrar_boton()"><img class="img-responsive" src="<?= $this->config->base_url();?>assets/img/compartirF.png"></a>
        </div>
        <br>
         <div class="animated fadeInUp">
        <a href="http://twitter.com/home?status=<?= $this->config->base_url();?>login/compartir/<?= $data->id?>" target="blank" onclick="mostrar_boton()"><img class="img-responsive" src="<?= $this->config->base_url();?>assets/img/compartir_tw.png" ></a>
        </div><!--
        alt="" width="1000" height="200" -->
        </div>
<!-- *********************** -->
   <div id="entrar" class="col-md-12 col-sm-12 col-xs-12" style="display: none">
   </style>
                <br>

    <a href="<?=$this->config->base_url()?>login/busca_nueva_parrilla/2"><img src="<?= $this->config->base_url();?>assets/img/btn_continuar.png" class="img-responsive" alt="" width="150" height="38"></a>
            <!-- quitar el comentario porque estoy en pruebas. -->
               <!--  <a style="color: #FF8080"href="<?php echo $link_login_only; ?>?dst=<?php echo $link_orig_esc; ?>&username=T-<?php echo $mac_esc; ?>"><button type="button" style='width:100px; height:100px' class="form-control btn btn-info">Entrar</button></a> -->
            </div>
       </div>
    </header>

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
