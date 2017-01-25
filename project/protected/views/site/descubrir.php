<?php $this->renderPartial('//layouts/_menu2'); ?>
    <div class="row contenedor-2" style="background-color: white;">
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
        foreach ($items as $key => $item) {?>
        <div class="row-2 item-hab" style="background-color: white;">
            <div class="col-xs-3 col-sm-3">
                <div class="end-xs tarjeta-hab">
                    <h2 class="title-solid-hab text-com wow fadeInLeft" data-wow-delay="1s"><b><?php echo $item->titulo_des; ?></b><a class="text-hab-opt text-com js-active-detalle" href=""> <b>Detalles</b> <span class="title-2"><b>>></b></span></a></h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 wow fadeInUp">
                <div class="owl-demo img-hab">
                   <?php 
                            foreach ($item->gallery0->images as $i => $image) { ?>
                                <div class="item">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $item->gallery; ?>/<?php echo $image->name ?>" alt="<?php echo $item->titulo_des; ?>">
                                 </div>
                        <?php
                        }
                         ?>
                </div>
                <div class="detalle js-accordeon row-2">
                    <div class="text-com text-deta-hab"><?php echo $item->descripcion_des; ?></div>
                </div>
            </div>
        </div>

        <?php        
        }
     ?>
    
    <div style="height: 150px; width: 100%;background-color: #fff;"></div>
    <?php $this->renderPartial('//layouts/_map'); ?>