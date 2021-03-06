<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ERP Oliver</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
        foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
  <!-- Bootstrap 3.3.6
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/bootstrap/css/bootstrap.min.css">-->
  <!-- Font Awesome -->
  <link rel="icon" type="<?=$this->config->base_url()?>assets/img/blue_carrot.png" href="/images/mifavicon.png" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= $this->config->base_url();?>assets/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="<?= $this->config->base_url();?>assets/css/animate.min.css" rel="stylesheet">
   <link href="<?= $this->config->base_url();?>assets/css/scrolling-nav.css" rel="
   stylesheet">

</head>
