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
<script>
function selectRadio(r){
    document.getElementById(r).checked = true;
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
       <?php foreach ($pregunta_respuesta->result() as $data): ?>
        <?$pregunta_esp=$data->pregunta_esp;?>
        <?$pregunta_cata=$data->pregunta_cata;?>
        <?$pregunta_eng=$data->pregunta_eng;?>
        <?$id_pregunta=$data->id_pregunta;?>
        <?$id_parrilla=$data->id_parrilla?>
        <?php endforeach ?>
      <div class="header-content-inner">
     <p>
    <IMG SRC="<?php $this->config->base_url()?>../assets/img/Logo_blue_carrot_1.png" class="animated fadeInRight" WIDTH=320 HEIGHT=96 BORDER=0 ALT="Bluecarrot"style="max-width:350px;">
    <br><br>

        </div>

       <!-- **********************la pregunta************************* -->
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
   <h2><strong><?=$pregunta_eng?></strong></h2>
  <?}
  elseif($user_language=='es'){?>
  <h2><strong><?=$pregunta_esp?></strong></h2>
  <?}
  elseif($user_language=='ca'){?>
   <h2><strong><?=$pregunta_cata?></strong></h2>
  <?}else{?>
   <h2><strong><?=$pregunta_eng?></strong></h2>
  <?}?>
  <!--*************************************-->
        </div>
       <form  role="form" action="<?php echo $this->config->base_url();?>pregunta_respuesta/guardar_respuesta" method="POST">
      <input type="hidden" name="txt_id_pregunta" id="txt_id_pregunta" value="<? echo $id_pregunta?>">
      <input type="hidden" name="txt_id_parrilla" id="txt_id_parrilla" value="<? echo $id_parrilla?>">


<?php
  //Almacenamos dicho idioma en una variable
  $user_language=getUserLanguage();
  //De acuerdo al idioma hacemos una o varias redirecciones.
  if($user_language=='en'){?>
   <?php foreach ($pregunta_respuesta->result() as $data): ?>
        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4" align="justify">
          <input type="radio" value="<?=$data->id_respuesta?>" id="respuesta.<?=$data->id_respuesta?>" name="respuesta">
          <button type="button" onclick="selectRadio('respuesta.<?=$data->id_respuesta?>');mostrar_boton()"  class="btn" style="background-color: #FEDB1D"><h3><strong><?=$data->respuesta_eng?></strong></h3></button>
        </div>
        <?php endforeach ?>
  <?}
  elseif($user_language=='es'){?>
  <?php foreach ($pregunta_respuesta->result() as $data): ?>
    <?print_r($data->id_pregunta)?>
        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4" align="justify">
           <input type="radio" value="<?=$data->id_respuesta?>" id="respuesta.<?=$data->id_respuesta?>" name="respuesta">
        <button type="button" onclick="selectRadio('respuesta.<?=$data->id_respuesta?>');mostrar_boton()"  class="btn" style="background-color: #FEDB1D"><h3><strong><?=$data->respuesta_esp?></strong></h3></button>
        </div>
        <?php endforeach ?>
  <?}
  elseif($user_language=='ca'){?>
   <?php foreach ($pregunta_respuesta->result() as $data): ?>
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4" align="justify">
           <input type="radio" value="<?=$data->id_respuesta?>" id="respuesta.<?=$data->id_respuesta?>" name="respuesta">
           <button type="button" onclick="selectRadio('respuesta.<?=$data->id_respuesta?>');mostrar_boton()"  class="btn" style="background-color: #FEDB1D"><h3><strong><?=$data->respuesta_cata?></strong></h3></button>
          </div>
        <?php endforeach ?>
  <?}else{?>
   <?php foreach ($pregunta_respuesta->result() as $data): ?>
          <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4" align="justify">
           <input type="radio" value="<?=$data->id_respuesta?>" id="respuesta.<?=$data->id_respuesta?>" name="respuesta">
           <button type="button" onclick="selectRadio('respuesta.<?=$data->id_respuesta?>');mostrar_boton()"  class="btn" style="background-color: #FEDB1D"><h3><strong><?=$data->respuesta?></strong></h3></button>
          </div>
        <?php endforeach ?>
  <?}?>

      <!-- ******************************** -->


        <!-- ***************************** -->
      <div id="entrar" style="display: none" class="col-md-12 col-sm-12 col-xs-12 " align="center">
           <button type="submit" class="btn" style="background-color: #FEDB1D"><img class="img-responsive" src="<?=$this->config->base_url()?>assets/img/btn_continuar.png" alt=""></button>
            <p>
            </div>
      </form>
<!-- *********************** -->
   <div id="entrar" class="col-md-12 col-sm-12 col-xs-12" style="display: none">
   </style>
                <br>

            <!-- quitar el comentario porque estoy en pruebas. -->
               <!--  <a style="color: #FF8080"href="<?php echo $link_login_only; ?>?dst=<?php echo $link_orig_esc; ?>&username=T-<?php echo $mac_esc; ?>"><button type="button" style='width:100px; height:100px' class="form-control btn btn-info">Entrar</button></a> -->
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
