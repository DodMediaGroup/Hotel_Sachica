<?php $this->renderPartial('//layouts/_menu2'); ?>
    <div class="row contenedor-2">
        <div class="col-xs-12 col-sm-5">
            <div class="end-xs">
                <h2 class="title-solid-3 wow fadeInLeft" data-wow-delay="1s"><?php echo $pagina->titulo; ?></h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 texto-gris text-sub wow fadeInRight" data-wow-delay="1s">
            <p class="text-com"><?php echo $pagina->descripcion; ?></p>
        </div>
    </div>
    <?php 
    foreach ($items as $key => $item) { ?>
        <div class="row-2 item-hab">
        <div class="col-xs-3 col-sm-3">
            <div class="end-xs tarjeta-hab">
                <h2 class="title-solid-hab text-com wow fadeInLeft" data-wow-delay="1s"><b><?php echo $item->titulo_plan; ?></b><a class="text-hab-opt text-com js-active-detalle" href=""> <b>Detalles</b> <span class="title-2"><b>>></b></span></a></h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 wow fadeInUp col-sm-9">
            <div class="owl-demo img-hab">
                <?php 
                    foreach ($item->gallery0->images as $i => $image) { ?>
                        <div class="item">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $item->gallery; ?>/<?php echo $image->name ?>" alt="<?php echo $item->titulo_plan; ?>">
                        </div>
                <?php
                }
                ?>
            </div>
            <div class="detalle js-accordeon row-2">
                <div class="ry-deta"></div>
                <div class="text-com text-deta-hab"><?php echo $item->descripcion_plan; ?></div>
                <div class="col-xs-12 col-sm center-xs btn-hab">
                    <button class="btn-res hvr-pulse" href="<?php echo $this->createUrl('reserva/') ?>">RESERVAR <span class="title-2"><b>>></b></span></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
     ?>    
    <br>
    <br>
    <br>
    <?php $this->renderPartial('//layouts/_parallax-map'); ?>