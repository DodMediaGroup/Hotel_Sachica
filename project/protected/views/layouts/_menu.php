<?php
	$ruta = explode("/",Yii::app()->request->pathInfo);
	$page = strtolower($ruta[0]);
?>
    <div class="container-header">
        <div class="logo-header wow fadeInDown">
            <a href="<?php echo $this->createUrl('index/') ?>"><img class="logo-h hvr-pulse" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt=""></a>
        </div>
        <header class="header-back">
            <div class="menu-bar text-com">
                <a class="br-menu"><span class="icon-menu"></span>
                    MENU
                </a>
            </div>
            <div class="row-2 around-xs center-xs middle-xs title-nav text-com wow fadeIn">
                <a href="<?php echo $this->createUrl('index/') ?>" class="logo wow fadeInLeftBig"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-nav.png" alt=""></a>
                <nav class="col-xs-12 center-xs">
                    <ul class="center-xs">
                        <li class="item-nav hvr-bob">
                            <a class="text-nav" href="<?php echo $this->createUrl('nosotros/') ?>">
                                <p>NOSOTROS</p>
                            </a>
                        </li>
                        <li class="item-nav hvr-bob">
                            <a class="text-nav" href="<?php echo $this->createUrl('habitacion/') ?>">
                                <p>HABITACIONES</p>
                            </a>
                        </li>
                        <li class="item-nav hvr-bob">
                            <a class="text-nav" href="<?php echo $this->createUrl('servicios/') ?>">
                                <p>SERVICIOS</p>
                            </a>
                        </li>
                        <li class="item-nav hvr-bob">
                            <a class="text-nav" href="<?php echo $this->createUrl('reserva/') ?>">
                                <p>RESERVAS</p>
                            </a>
                        </li>
                        <li class="item-nav hvr-bob">
                            <a class="text-nav" href="<?php echo $this->createUrl('ubicacion/') ?>">
                                <p>UBICACIÓN</p>
                            </a>
                        </li>
                        <li class="item-nav hvr-bob">
                            <a class="text-nav" href="<?php echo $this->createUrl('contacto/') ?>">
                                <p>CONTACTO</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>