<footer id="footer">
    <div class="footer row-2">
        <div class="col-xs-12 col-sm-8">
            <h5 class="text-footer text-com">
                <div class="socials row middle-xs">
                    <?php $social = GeneralValue::model()->findByPk(2); ?>
                    <a href="<?php echo $social->value; ?>" target="_blank" class="social__button icon-facebook"></a>
                    <?php $social = GeneralValue::model()->findByPk(3); ?>
                    <a href="<?php echo $social->value; ?>" target="_blank" class="social__button icon-twitter"></a>
                    <?php $social = GeneralValue::model()->findByPk(4); ?>
                    <a href="<?php echo $social->value; ?>" target="_blank" class="social__button icon-instagram"></a>
                </div>
                Dirección: Calle 3 N° 1A - 66 Sáchica - Boyacá - Colombia <br>
                Celular: (57) 34353 0369 <br>
                <?php $social = GeneralValue::model()->findByPk(5); ?>
                Email: <?php echo $social->value; ?>
            </h5>
        </div>
        <div class="col-xs-12 col-sm-4 logo-footer center-xs">
            <img class="img-footer" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="">
        </div>
    </div>
</footer>
<!--jquery -->
<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/vendor/calendar/jquery.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/vendor/calendar/jquery-ui.js');
?>
    <script>
       
    </script>
    <!--google maps -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/wow/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-slide/owl.carousel.js"></script>
    <!--fancybox-->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    
    <script>
        new WOW().init();
    </script>
    <!--main -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>

    </body>

    </html>