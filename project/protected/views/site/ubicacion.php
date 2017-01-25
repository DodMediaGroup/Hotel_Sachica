<?php $this->renderPartial('//layouts/_menu2'); ?>
<div class="row contenedor-2">
            <div class="col-xs-12 col-sm-5">
                <div class="end-xs">
                    <h2 class="title-solid wow fadeInLeft" data-wow-delay="1s">Ubicación</h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 text-sub texto-gris wow fadeInRight" style="padding: 0px 10%;" data-wow-delay="1s">
                <p class="text-com">El Hotel Calle Principal tiene como sede el municipio de Sáchica. Dista 32 kilómetros de la Ciudad de Tunja, capital del Departamento de Boyacá y 130 kilómetros de Bogotá, Capital de Colombia, por vía pavimentada en su mayor parte doble calzada. Es una población colonial ubicada a 5 minutos (6kms) de Villa de Leyva, con una temperatura promedio de 23°c. Sáchica cuenta con unos 5.000 habitantes. Es conocida como la "Jerusalén de Colombia" por su tradición que data de más de 50 años celebrando la Semana Santa a lo vivo. Igualmente realiza en el mes de octubre el reinado nacional de la cebolla. Además de cebolla, el municipio es uno de los principales productores de tomate en Colombia.</p>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nosotros/temp_map.jpg" alt="">
            </div>
        </div>
 <div class="line"></div>
<div style="margin-top: 0px; height: 800px;" id="map" class="wow fadeIn"><?php $this->renderPartial('//layouts/_parallax-map'); ?></div>
