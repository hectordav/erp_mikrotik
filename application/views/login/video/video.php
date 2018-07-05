<!DOCTYPE html>
<html lang="es">
<head>
    <meta HTTP-EQUIV="Refresh" CONTENT="100; URL=http://www.facebook.com/" />
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

</style>
</head>
<body id="page-top" style="background-color: #000000" align="center" >
 <div class="container">
   <div class="row">

  <div class="col-sm-12">
  <div class="embed-responsive embed-responsive-16by9">
  <!-- **************************************************** -->
  <video preload="auto" controls id="mivideo">
    <source src="<?=$this->config->base_url()?>/uploads/video_prueba.webm">
    <!-- <source src="<?=$this->config->base_url()?>/uploads/video_prueba.ogv"> -->
  <source src="<?=$this->config->base_url()?>/uploads/video_prueba.MP4">
    <!-- <object type="video/ogg" data="/media/video.oga" width="320" height="240">
    <param name="src" value="/media/video.oga">
    <param name="autoplay" value="true">
    <param name="autoStart" value="0">
    </object> -->
  </video>
<script>
 var video = document.getElementById('mivideo');
video.addEventListener('click',function(){
  video.play();
  alert("algo");
},false);
</script>
</div>
</div>

</div>
 </div>


<script src="<?php echo $this->config->base_url();?>assets/js/jquery-1.9.1.js"></script>
    <!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->config->base_url();?>assets/js/bootstrap.min.js"></script>

</body>
</html>
