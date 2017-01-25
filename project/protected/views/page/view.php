<?php $this->renderPartial('//layouts/_menu2'); ?>
    <div class="row contenedor-serv">
        <div class="col-xs-12">
            <div class="start-xs">
                <div class="ry"></div>
                <h2 class="title-solid-serv wow fadeInDownBig"><?php echo $servicio->titulo_servicio ?></h2>
                <div class="row content-serv-">
                    <div class="col-xs-12">
                        <p class="text-com text-serv-alone wow fadeInRight"><?php echo $servicio->descripcion_servicio ?></p>
                    </div>
                    <div class="col-xs-12 center-xs wow fadeInLeft">
                        <p class="row center-xs">
                        <?php 
                            foreach ($servicio->gallery0->images as $i => $image) { ?>
                                 <a class="col-lg-4 col-sm-6 fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $servicio->gallery; ?>/<?php echo $image->name ?>"><img class="img-serv-" src="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $servicio->gallery; ?>/<?php echo $image->name ?>" alt="" /></a>
                            <?php 
                            }
                         ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="btn-back-serv  wow fadeInRight" data-wow-delay=".5s">
                <a href="<?php echo $this->createUrl('servicios/') ?>">
                    <button class="btn-back hvr-pulse"><span class="title-2"><b><<</b></span> Volver </button>
                </a>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//layouts/_parallax-map'); ?>