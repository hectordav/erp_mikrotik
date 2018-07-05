<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Siguenos BlueCarrot</title>
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
function mostrar_boton(){
      setTimeout(function() {

        $("#entrar").fadeIn(0);
        },500

        );
    }
</script>
</head>

<!--*********************************Script de facebook*********************************-->
<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({appId: '1146513702098588', status: true, cookie: true, xfbml: true});
        FB.Canvas.setSize({ width: 520, height: 1500 });
        FB.Event.subscribe('edge.create',
            function(response) {
                alert('Muchas Gracias!');
                // put redirect code here eg
             /*   window.location = "<?php $this->config->base_url()?>login/entrar"; */
             document.getElementById('entrar').style.display = 'block';
            }
        );
    };

    //Load the SDK asynchronously
    (function() {
        var e = document.createElement('script'); e.async = true;
            e.src = document.location.protocol +
              '//connect.facebook.net/es_ES/all.js';
            document.getElementById('fb-root').appendChild(e);
    }());
</script>
<!-- ***********************************************************************************-->

<!--******************Script de instagram***********************************-->
  <style>.ig-b- { display: inline-block; }
.ig-b- img { visibility: hidden; }
.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
<!-- ********************************************************************************* -->

<body id="page-top" style="background-color: #FEDB1D" align="center">

    <header>

    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
    <p>
    <p>
        <div class="header-content-inner">
        <IMG SRC="../assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=300 HEIGHT=244 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
<!-- ************************************************************ -->
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
        <div class="col-md-3 col-sm-3 col-xs-3">

        </div>
        <script type="text/javascript">
function mostrar_boton(){
      setTimeout(function() {
        $("#entrar").fadeIn(0);
        },500
        );
    }
</script>
      <?php foreach ($seguir->result() as $data): ?>
        <?$id_tipo= $data->id_tipo?>
        <?php if ($id_tipo==2):?>
  <!--********************************twitter****************************************** -->
       <div class="col-md-12 col-sm-12 col-xs-12" align="center">
       <br>
          <div id="contenedor" onmouseover="mostrar_boton()"><a href="<?=$data->descripcion_det_seguir?>"  class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Seguir @bluecarrotwifi</a></div><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
  <!--********************************************************************************* -->
        <?php endif ?>
        <?php if ($id_tipo==1):?>

    <!--******************************facebook*****************************************-->
    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <br>
    <fb:like href="<?=$data->descripcion_det_seguir?>"  data-layout="button"  data-action="like"  data-size="large" data-show-faces="false" ata-share="false" send="false"  font=""></fb:like>
    </div>
  <!--******************************************************************************* -->
       <p></p>
        <?php endif ?>
        <?php if ($id_tipo==3):?>
        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <br>
  <!-- **************************************instagram ******************************-->
     <script type="text/javascript">
     function abrir_instagram(){
      setTimeout(function() {
        window.open('<?=$data->descripcion_det_seguir?>','','top=300,left=500,width=300,height=300');
        $("#entrar").fadeIn(0);
        },500
        );
    }
    </script>
      <div id="contenedor" onclick="abrir_instagram()">
          <a class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
      </div>
  <!-- ******************************************************************************-->
  </div>
        <?php endif ?>
      <?php endforeach ?>
<!-- **************************el entrar***************************************-->
   <div id="entrar" class="col-md-12 col-sm-12 col-xs-12" style="display: none">
   </style>

                <br>
    <a href="<?=$this->config->base_url()?>login/busca_nueva_parrilla/3"><img src="<?= $this->config->base_url();?>assets/img/btn_continuar.png" alt="" width="150" height="38"></a>

            </div>
  <!-- ****************************************************************************** -->
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
