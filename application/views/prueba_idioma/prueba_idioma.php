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
  <?
  $i=0;
    while ($i <= 10) {
    echo $i++;
    }?>
  <?}
  elseif($user_language=='es'){?>
  <?
  $i=0;
    while ($i <= 10) {
    echo $i++;
    }?>
  <?}
  elseif($user_language=='ca'){?>
   <?
   $i=0;
    while ($i <= 10) {
    echo $i++;
    }?>
  <?}else{?>

   <?
    while ($i <= 10) {
    echo $i++;
    }?>

  <?}?>