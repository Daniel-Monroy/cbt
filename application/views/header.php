<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> CBT | 2019 </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url()?>assets/img/template/logo-cbt.png">
  <?php
  echo get_assets("bower_components/bootstrap/dist/css/bootstrap.min.css", "adm_lte-css");
  echo get_assets("bower_components/font-awesome/css/font-awesome.min.css", "adm_lte-css");
  echo get_assets("bower_components/Ionicons/css/ionicons.min.css", "adm_lte-css");
  echo get_assets("dist/css/AdminLTE.min.css", "adm_lte-css");
  echo get_assets("dist/css/skins/_all-skins.min.css", "adm_lte-css");
  echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">';
  echo get_assets("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css", "adm_lte-css");
  echo get_assets("bower_components/datatables.net-bs/css/responsive.bootstrap.min.css", "adm_lte-css");
 ?>

  <?php
  if (isset($extraHeadPluginsContent)) {echo $extraHeadPluginsContent;}
  ?>
  
  <?php
  if (isset($extraHeadContent)) {echo $extraHeadContent;}
  ?>
  <body class="hold-transition register-page">
