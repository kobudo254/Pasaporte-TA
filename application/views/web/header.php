<!doctype html>
<html data-base-url="<?=base_url()?>">   
<head>
    <meta charset="iso-8859-1" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />    
    <title><?=$seo['titulo']?></title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico" /> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/_reset.css">

<? if($this->config->item('css_fw') == "jqm"): ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<? elseif($this->config->item('css_fw') === "foundation"): ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/foundation-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/foundation.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/app.css">
    <script src="<?=base_url()?>assets/js/vendor/modernizr.js"></script>    
<? endif; ?>
    <?php if (isset($extraHeadContent)) {echo $extraHeadContent;} ?>  

</head>