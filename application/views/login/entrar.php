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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7&appId=1146513702098588";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <header>

    <div class="col-md-12 col-sm-12  col-xs-12">
    <br>
    <div class="col-md-6 col-sm-6 col-xs-6" align="center">
    <p><br><br><br><br><br></p>

    </div>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
    <p>
    <p>
        <div class="header-content-inner">
        <IMG SRC="../assets/img/Logo_blue_carrot_1.png" class="img-responsive animated fadeInRight" WIDTH=420 HEIGHT=96 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
            <div id="entrar">
                <br>
                  <a style="color: #FF8080"href="<?php echo $link_login_only; ?>?dst=<?php echo $link_orig_esc; ?>&username=T-<?php echo $mac_esc; ?>"><img id="bok" class="bOk" src="<?=$this->config->base_url()?>assets/img/btn_entrar.png" width="124" height="124"/></a>
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
