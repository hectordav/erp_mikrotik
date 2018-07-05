
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
    <link href="<?php echo  $this->config->base_url();?>assets/css/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="<?php echo $this->config->base_url();?>assets/css/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>assets/css/animate.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="<?php echo $this->config->base_url();?>assets/css/creative.css" rel="stylesheet">
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7&appId=1544378379203285";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style>.ig-b- { display: inline-block; }
.ig-b- img { visibility: hidden; }
.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>

<body id="page-top" style="background-color: #FEDB1D">
    <header>
   <div class="col-md-12 col-sm-12  col-xs-12">
    <br>
    <div class="col-md-6 col-sm-6 col-xs-6" align="center">
       <!--  <IMG SRC="../assets/img/Logo_blue_carrot_1.png" class="animated fadeInLeft" WIDTH=200 HEIGHT= BORDER=0 ALT="Bluecarrot"> -->
    </div>
    </div>

        <div class="header-content-inner">
       <IMG SRC="<?php echo $this->config->base_url()?>assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=320 HEIGHT=96 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
          <div class="col-md-12 col-sm-12 col-xs-12 animated fadeInUp">

              <?php if ($login): ?>
            <br>
            <a href="<?= $login ?>" title="Facebook"><button type="button" class="btn btn-primary" title="Facebook" style=' width:250px; height:60px; border-radius: 5px; '><h4><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;<strong>Login Facebook</h4></strong></button></a>
				      <?php endif ?>

                <br>


          <br>
            <a href="<?php echo site_url('twitter/redirect');?>" title="Twitter"><button type="button" class="btn btn-info" title="Twitter" style=' width:250px; height:60px; border-radius: 5px;'><h4><i class="fa fa-twitter-square" aria-hidden="true"></i>&nbsp;<strong>Login Twitter</h4></strong></button></a>
           <!--  <p></p>
            <a href="<?php echo site_url('welcome/redirect');?>" title="Twitter"><button type="button" class="btn btn-warning" title="Instagram" style=' width:250px; height:60px; border-radius: 5px; color: white'><h4><i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;<strong>Login Instagram</h4></strong></button></a> -->
            <p></p>
           <!--  <a href="myModal" data-toggle="modal" data-target="#myModal" title="Registrate"><button class="btn btn-danger" type="button" style=' width:250px; height:60px; border-radius: 5px;'><h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i><strong>&nbsp;Registrate</strong></h4></button></a> -->
            <br>
            <div id="entrar" style='display:none;'>
                <a style="color: #FF8080"href="$(link-login-only)?dst=$(link-orig-esc)&amp;username=T-$(mac-esc)"><button type="button" style='width:100px; height:100px' class="btn btn-info">Entrar</button></a>
            </div>
            </div>
        </div>
        </div>
    </header>

<!-- *********************************modal reg ******************************* -->
<div class="modal fade modal-xs" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Conectate</h4>
      </div>
      <div class="modal-body">
  <div align="center">
   <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>login/registro_sin_facebook" method="POST">
       <div class="fb-page" data-href="https://www.facebook.com/bluecarrotwifi/" data-tabs="timeline" data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/bluecarrotwifi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/trotamundotapas/"></a></blockquote></div>
  </div>
       <fieldset>
       <div class="col-md-12 col-sm-12 col-xs-12">
         <p>
         <div class="col-md-11 col-sm-11 col-xs-11">
            <input type="email" class="form-control" name="txt_login" id="txt_login" value="" placeholder="Email" required="required">
  <!-- quitar comentario -->
  <!--  <input type="hidden" name="mac" id="mac" value="<?php echo $mac?>"> -->
         </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <p>
         <div class="col-md-11 col-sm-11 col-xs-11">
            <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" value="" placeholder="Nombre/Name" required="required">
         </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
         <p>
         <div class="col-md-11 col-sm-11 col-xs-11">
            <input type="date" class="form-control" name="dt_fecha" id="dt_fecha" value="" title="DD-MM-AAAA /Date of Birth" required="required">
         </div>
        </div>
         <div class="col-md-12 col-sm-12 col-xs-12">
         <p>
         <div class="col-md-11 col-sm-11 col-xs-11">
           <input type="radio" name="opcion" value="1" placeholder="" checked="checked"> Masculino
            <input type="radio" name="opcion" value="2" placeholder="">Femenino
         </div>
        </div>
       </fieldset>
      </div>
      <div class="modal-footer">
      <br>
      <button  type="submit" class="btn btn-primary">Continuar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--***************************modal *************************************** -->
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