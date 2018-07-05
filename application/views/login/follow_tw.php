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

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
    <p>
    <p>
        <div class="header-content-inner">
        <IMG SRC="../assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=300 HEIGHT=244 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Like para Continuar</strong></h2>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">

        </div>

        <!-- fb -->
        <div class="col-md-2 col-sm-2 col-xs-2" align="center">

          <div id="contenedor" onmouseover="mostrar_boton()"><a href="https://twitter.com/bluecarrotwifi"  class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @bluecarrotwifi</a></div><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

          </div>
<!-- *********************** -->
   <div id="entrar" class="col-md-12 col-sm-12 col-xs-12" style="display: none">
   </style>
                <br>
                <a style="color: #FF8080"href="<?php echo $link_login_only; ?>?dst=<?php echo $link_orig_esc; ?>&username=T-<?php echo $mac_esc; ?>"><button type="button" style='width:100px; height:100px' class="form-control btn btn-info">Entrar</button></a>
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
