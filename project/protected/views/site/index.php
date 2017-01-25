   <?php $this->renderPartial('//layouts/_menu'); ?>
    <div class="popUp popUp__form">
        <div class="popUp__close"></div>
        <div class="popUp__contenido">
            <div class="row reserva-reveal middle-xs between-xs center-xs">
                <div class="col-xs-6 col-sm-6 around-xs reserva-img">
                    <p class="text-res text-argon"> <img class="img-res" src="images/reserva.svg" alt="">Solicitar
                        <br>Reserva</p>
                </div>
                <div class="col-xs-6 col-sm-6">
                    <h1 class="text-gracias text-argon">¡Gracias!</h1>
                </div>
            </div>
            <div class="shadow">
                <p class="text-reveal">Apreciado <span class="popUp__form__name"></span> <span class="popUp__form__lastname"></span> Su proceso de reserva ha iniciado, en breve nos pondremos en contacto para confirmar la disponibilidad y garantizar su reserva. Gracias.</p>
                <form class="form row-2" id="form__popUp__confirmar" action="<?php echo $this->createUrl('api/add_reservation') ?>">
                    <div class="popUp__data_user">
                        <div class="popUp__data__user__static row-2">
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva-static">
                                    <label>Nombre: </label><span class="popUp__form__name"></span></p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva-static">
                                    <label>Apellido: </label><span class="popUp__form__lastname"></span></p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva-static">
                                    <label>Correo: </label><span class="popUp__form__email"></span></p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva-static">
                                    <label>Telefono: </label><span class="popUp__form__phone"></span></p>
                            </div>
                            <div class="col-xs-12">
                                <p class="btn__form__popUp__edit">Editar</p>
                            </div>
                        </div>
                        <div class="popUp__form_edit row-2">
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva">
                                   <label for="">Nombre</label>
                                    <input type="text" class="popUp__form__name" name="User[nombre]" required>
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva">
                                   <label for="">Apellido</label>
                                    <input type="text" class="popUp__form__lastname" name="User[apellido]" required>
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva">
                                   <label for="">Correo</label>
                                    <input type="email" class="popUp__form__email" name="User[correo]" required>
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-com datos-reserva">
                                   <label for="">Teléfono</label>
                                    <input type="phone" class="popUp__form__phone" name="User[telefono]">
                                </p>
                            </div>
                            <input class="popUp__form__id" type="hidden" name="User[idusuario]">
                        </div>
                    </div>
                    <div class="line-">
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <select class="opt-cont text-com dropdown-2" style="width: 100%;" id="dropdown-2" name="Reserva[numero_adultos]" required>
                            <option value="">N° Adultos</option>
                            <option value="1">1 Adulto</option>
                            <option value="2">2 Adultos</option>
                            <option value="3">3 Adultos</option>
                            <option value="4">4 Adultos</option>
                            <option value="5">5 Adultos</option>
                            <option value="6">6 Adultos</option>
                            <option value="7">7 Adultos</option>
                        </select>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <select class="opt-cont text-com dropdown-2" style="width: 100%;" id="dropdown-2" name="Reserva[numero_ninos]">
                            <option value="">N° Niños</option>
                            <option value="1">1 Niño</option>
                            <option value="2">2 Niños</option>
                            <option value="3">3 Niños</option>
                            <option value="4">4 Niños</option>
                            <option value="5">5 Niños</option>
                            <option value="6">6 Niños</option>
                            <option value="7">7 Niños</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input class="icon-fecha-2 input-reveal " type="text" id="from" name="Reserva[fecha_desde]" style="width: 100%;" placeholder="Desde" required readonly>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input class="icon-fecha-2 input-reveal " type="text" id="to" name="Reserva[fecha_hasta]" style="width: 100%;" placeholder="Hasta" required readonly>
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-12 center-xs hvr-pulse">
                        <button type="submit" class="btn-conf text-com">Confirmar<span class="indicador"><b>>></b></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="content-serv-land wow fadeInUp" data-wow-delay="1s">
        <form action="<?php echo $this->createUrl('api/add_user') ?>" id="reserva_index">
            <div class="row reserva middle-xs between-xs center-xs">
                <div class="col-xs-12 col-sm around-xs reserva-img">
                    <p class="text-res text-argon"> <img class="img-res" src="<?php echo Yii::app()->request->baseUrl; ?>/images/reserva.svg" alt="">Solicitar
                        <br>Reserva</p>
                </div>
                <div class="col-xs-12 col-sm around-xs" style="padding-right: 0px; padding-left: 5px;">
                    <input class="input-res" type="text" placeholder="Nombre" name="User[nombre]" required>
                </div>
                <div class="col-xs-12 col-sm around-xs" style="padding-right: 0px; padding-left: 5px;">
                    <input class="input-res" type="text" placeholder="Apellido" name="User[apellido]" required>
                </div>
                <div class="col-xs-12 col-sm around-xs" style="padding-right: 0px; padding-left: 5px;">
                    <input class="input-res" type="email" placeholder="Correo electrónico" name="User[correo]" required>
                </div>
                <div class="col-xs-12 col-sm around-xs exc" style="padding-right: 0px; padding-left: 5px;">
                    <input class="input-res" type="tel" placeholder="Teléfono" name="User[telefono]">
                </div>
                <div class="col-xs-12 col-sm-12 col-md btn-reserva around-xs center-xs" style="padding-right: 0px; padding-left: 10px;">
                    <button type="submit" class="btn-reservar">Reservar<b>>></b></button>
                </div>
            </div>
        </form>
        <div class="row tarjeta text-com between-xs middle-xs">
            <div class="col-xs-12 col-sm-4 around-xs center-xs">
                <div class="box">
                    <div class="center">
                        <img class="img-lan" src="<?php echo Yii::app()->request->baseUrl; ?>/images/servicios-landing/landing-planes-especiales.png" alt="">
                    </div>
                    <div class="texto-servicios">
                        <h3 class="title-2 text-argon">Planes Especiales</h3>
                        <p class="text-se">Toma un descanso merecido en el mejor lugar de Sàchica</p>
                        <div class="ry-serv"></div>
                        <a class="text-lan-op hvr-pulse" href="<?php echo $this->createUrl('planes/') ?>"> <b>Reservas: +57 314 353 0369 </b><span class="indicador"><b>>></b></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 around-xs center-xs">
                <div class="box">
                    <div class="center">
                        <img class="img-lan" src="<?php echo Yii::app()->request->baseUrl; ?>/images/servicios-landing/landing-service.png" alt="">
                    </div>
                    <div class="texto-servicios">
                        <h3 class="title-2 text-argon">Servicios</h3>
                        <p class="text-se">Conoce todos nuestros servicios para familias y grupos empresariales</p>
                        <div class="ry-serv"></div>
                        <a class="text-lan-opt hvr-pulse" href="<?php echo $this->createUrl('servicios/') ?>"> <b>Conoce más</b> <span class="indicador"><b>>></b></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 around-xs center-xs">
                <div class="box-end">
                    <div class="center">
                        <img class="img-lan" src="<?php echo Yii::app()->request->baseUrl; ?>/images/servicios-landing/landing-semana-santa.png" alt="">
                    </div>
                    <div class="texto-servicios">
                        <h3 class="title-2 text-argon">Semana Santa</h3>
                        <p class="text-se">Festival de música Sacra
                            <br> Celebraciones Religiosas</p>
                        <div class="ry-serv"></div>
                        <a class="text-lan-opt  hvr-pulse" href="<?php echo $this->createUrl('descubrir/') ?>"> <b>Conoce más</b> <span class="indicador"><b>>></b></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row contenedor" style="background: #f9f7f4;">
        <div class="col-xs-12 col-sm-6">
            <div class="end-xs">
                <h2 class="title-solid wow fadeInLeft" data-wow-delay="1s">BIENVENIDOS</h2>
            </div>
            <div class="col-sm-12 col-xs-12 end-xs text-reserva wow fadeInLeft" data-wow-delay="1s">
                <h3 class="text-reserva-1 end-xs text-argon">Reservas: </h3>
                <h2 class="text-reserva-2 text-argon"> +57 314 353 0369</h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 texto-gris wow fadeInRight" style="margin-top: 10px;" data-wow-delay="1s">
            <p class="text-com text-welcome">Hotel Calle Principal, es un reconocido hotel, una joya en ascenso en la naturaleza del valle de Leyva.
                <br>
                <br> El ambiente refinado y luminoso de las habitaciones hará de su estancia una experiencia única e inolvidable. </p>
        </div>
    </div>
    <?php $this->renderPartial('//layouts/_parallax-map'); ?>