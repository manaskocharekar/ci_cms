<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="M@nas Koch@rekar">
    
      

 <title>CMS</title>

    <!-- Bootstrap -->
    <!-- siimple style -->

    <link href="<?php  echo site_url('../assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400.500" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php  echo site_url('../assets/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php  echo site_url('../assets/js/bootstrap.min.js'); ?>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
    <script src="<?php  echo site_url('../assets/js/tinymce/tinymce.min.js'); ?>"></script>
        
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="<?php  echo site_url('../assets/css/custom.css'); ?>" rel="stylesheet">

      <?php if(isset($sortable) && $sortable === TRUE) : ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="<?php  echo site_url('../assets/js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php  echo site_url('../assets/js/jquery-ui.js'); ?>"></script>
        <script src="<?php  echo site_url('../assets/js/jquery.mjs.nestedSortable.js'); ?>"></script>
      <?php endif; ?>
     <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>

    </head>



<body style = "padding-top:70px;">
  <?php
  include("nav.php");   //navigation
    ?>
