<!DOCTYPE html>
<html lang="<?php echo $adminlang; ?>"<?php echo $languageRTL;?>>
<head>
  <?php echo $meta;?>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">  
  <link rel="shortcut icon" href="<?php echo Yii::app()->getConfig('adminstyleurl');?>favicon.png">
  <title><?php echo $sitename;?></title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getConfig('adminstyleurl');?>bootstrap.css" />

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getConfig('adminstyleurl');?>navbar-static-top.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<!-- super/adminmenu.php usually follows -->