<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>
        <?php echo CHtml::encode($this->pageTitle); ?>
    </title>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png"  type="image/png">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <!--wow-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/wow/animate.min.css">
    <!--slide-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-slide/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-slide/owl.theme.css">
    <!--calendario-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/calendar/jquery-ui.css" rel="stylesheet">
    <!--fancybox -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.css?v=2.1.5">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox-thumbs.css?v=1.0.7">
    
    </head>

<body>
    <div class="popUp popUp__loading">
        <div class="popUp__close"></div>
        <div class="popUp__contenido__loading">
            
        </div>
    </div>
    <div class="popUp popUp__alerta">
        <div class="popUp__close"></div>
        <div class="popUp__contenido">
            <div class="text-argon col-xs-12 m-error">
                <p id="text__popUp"></p>
            </div>
        </div>
    </div>