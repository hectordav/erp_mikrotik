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
/*
           $(document).ready(function(e) {
           // Cuando le dás click muestra #content
           $('#face').click(function(){
              $("#entrar").toggleClass("hide");
           });

           // Simular click
           $('#face').click();
           });*/
      <!-- </script>.



<!-- esto es lo viejo -->
<!--<script type="text/javascript">


/*function mostrar_boton()
    {
      setTimeout(function() {
        $("#entrar").fadeIn(0);
        },500
        );
    }*/
</script>-->
</head>
<body id="page-top" style="background-color: #FEDB1D">
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
    <header>

    <div class="col-md-12 col-sm-12  col-xs-12">
    <br>
    <div class="col-md-6 col-sm-6 col-xs-6" align="center">
        <IMG SRC="../assets/img/Logo_blue_carrot_1.png" class="animated fadeInLeft" WIDTH=200 HEIGHT= BORDER=0 ALT="Bluecarrot">
    </div>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
    <p>
    <p>
        <div class="header-content-inner">
        <IMG SRC="../assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=200 HEIGHT=163 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h2 style="color: white; background= black" class="animated fadeInUp"><strong>Like para Continuar</strong></h2>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">

        </div>

        <!-- fb -->
        <div class="col-md-2 col-sm-2 col-xs-2" align="center">

          <fb:like href="https://www.facebook.com/bluecarrotwifi/?fref=ts"  data-layout="button_count"  data-action="like"  data-size="large" data-show-faces="false" ata-share="false" send="false"  font=""></fb:like>

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
