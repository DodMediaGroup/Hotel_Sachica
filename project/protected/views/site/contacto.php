<?php $this->renderPartial('//layouts/_menu2'); ?>
    <div class="row contenedor-2 center-xs" style="background-color: white;">
        <div class="col-xs-12 col-sm-5">
            <div class="end-xs">
                <h2 class="title-solid-3  wow fadeInLeft" data-wow-delay="1s">Contacto</h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 texto-gris text-sub wow fadeInUp" data-wow-delay="1s">
            <p class="text-com">Ahorre tiempo, antes de llamar o enviar su mail, reserve por éste medio y a la mayor brevedad le devolveremos un correo contestando sus inquietudes.</p>
        </div>
        <div class="popUp popUp__contacto">
            <div class="popUp__close"></div>
            <div class="popUp__contenido">
                <div class="row reserva-reveal middle-xs between-xs center-xs">
                    <div class="col-xs-12 center-xs">
                        <h1 class="text-gracias">¡Gracias!</h1>
                    </div>
                </div>
                <br>
                <div class="col-xs-12">
                    <p id="text__popUp" class="text-argon"></p>
                </div>
                <div class="col-xs-12 center-xs">
                    <button class="btn-conf text-com"><a style="text-decoration:none; color: #b5b5b5;" href="<?php echo $this->createUrl('contacto/') ?>">Volver</a><span class="title-2"><b>>></b></span></button>
                </div>
            </div>
        </div>
        <div class="contenedor-cont">

            <form class="form row" action="<?php echo $this->createUrl('contact/') ?>" id="form__popUp__contacto">
                <div class="col-xs-12 col-sm-4">
                    <input class="input-cont text-com wow fadeInUp" data-wow-delay=".5s" type="text" name="name" required placeholder="Nombre">
                </div>
                <div class="col-xs-12 col-sm-4">
                    <input class="input-cont text-com wow fadeInUp" data-wow-delay=".5s" type="email" name="email" required placeholder="Correo eletrónico">
                </div>
                <div class="col-xs-12 col-sm-4">
                    <input class="input-cont text-com wow fadeInUp" data-wow-delay=".5s" type="phone" name="phone" placeholder="Teléfono">
                </div>
                <div class="col-xs-12 col-sm-12">
                    <textarea name="message" class="input-cont-msn text-com wow fadeInUp" placeholder="Comentario" required></textarea>
                </div>
                <div class="col-xs-12 center-xs">
                    <button type="submit" class="btn-cont text-com  wow fadeIn"><a style="text-decoration:none; color: #fff;">Enviar<span class="title-cont"><b>>></b></span></a></button>
                </div>
            </form>
            <div class="text-com texto-gris start-xs col-xs-12 wow fadeInUp">
                <div class="ry-cont"></div>
                <div class="text-contac-1">
                    <p class=" text-cont">Dirección: </p> <span class="span-cont">Calle 3 Nº 1A-66 Sáchica - Boyacá - Colombia</span>
                </div>
                <div class="text-contac">
                    <p class="text-cont">Celular: </p> <span class="span-cont">(57) 314 353 0369</span>
                </div>
                <div class="text-contac">
                    <?php $social = GeneralValue::model()->findByPk(5); ?>
                    <p class="text-cont">Email: </p> <span class="span-cont"><?php echo $social->value; ?></span>
                </div>
                <div class="socials row middle-xs">
                    <?php $social = GeneralValue::model()->findByPk(2); ?>
                    <a href="<?php echo $social->value; ?>" target="_blank" class="social__button icon-facebook"></a>
                    <?php $social = GeneralValue::model()->findByPk(3); ?>
                    <a href="<?php echo $social->value; ?>" target="_blank" class="social__button icon-twitter"></a>
                    <?php $social = GeneralValue::model()->findByPk(4); ?>
                    <a href="<?php echo $social->value; ?>" target="_blank" class="social__button icon-instagram"></a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php $this->renderPartial('//layouts/_parallax-map'); ?>