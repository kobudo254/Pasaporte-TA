<!doctype html>
<html>
<head>

    <meta charset="iso-8859-1" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$seo['titulo']?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico" /> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/app.css">

    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.mobile-1.4.5.min.js"></script>
    <script src="<?=base_url()?>assets/js/app.js"></script>

    <?php if (isset($extraHeadContent)) {echo $extraHeadContent;} ?>        
</head>