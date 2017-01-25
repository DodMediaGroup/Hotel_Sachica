<?php $this->renderPartial('//layouts/_menu2'); ?>
    <div class="row contenedor-2">
        <div class="col-xs-12 col-sm-5">
            <div class="end-xs">
                <h2 class="title-solid-2 wow fadeInLeft" data-wow-delay="1s">Servicios</h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 texto-gris wow fadeInRight" data-wow-delay="1s">
            <p class="text-com" style="padding: 0px 50px">Ofrecemos una gama de servicios para facilitar su estadía.</p>
        </div>
    </div>
    <div class="row-2 between-xs middle-xs center-xs contenedor-ser">
        <?php 
            foreach ($servicios as $key => $servicio) { ?>
                
            <div class="col-xs-12 col-sm-6 col-md-4 center-xs servicio">
                <div class="content-img-serv wow fadeInUp" data-wow-delay=".5s">
                    <img class="img-serv" src="images/servicio/600x480/<?php echo $servicio->imagen; ?>" alt="">
                    <div class="text-hover hvr-rectangle-out">
                        <div class="content-hover">
                            <h1 class="text-serv text-com"><?php echo $servicio->titulo_servicio; ?></h1>
                            <a class="text-serv-opt text-com  hvr-pulse" href="<?php echo $this->createUrl('page/'.$servicio->idservicio.'_'.MyMethods::normalizarUrl($servicio->titulo_servicio)); ?>">
                                <p>
                                    <br> conoce más <span class="fl-serv"><b>>></b></span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             <?php   
            }
         ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php $this->renderPartial('//layouts/_parallax-map'); ?>