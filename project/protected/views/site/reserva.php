<?php $this->renderPartial('//layouts/_menu2'); ?>
    <div class="row contenedor-2" style="background-color: white;">
        <div class="col-xs-12 col-sm-5">
            <div class="end-xs">
                <h2 class="title-solid-3 wow fadeInLeft" data-wow-delay="1s">Solicitar Reserva</h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 texto-gris text-sub wow fadeInRight" data-wow-delay="1s">
            <p class="text-com">Ahorre tiempo, antes de llamar o enviar su mail, reserve por éste medio y a la mayor brevedad le devolveremos un correo contestando sus inquietudes.</p>
        </div>
        <div class="contenedor-cont ">
            <form class="form row-2" action="<?php echo $this->createUrl('api/add_reserva') ?>" id="form__popUp__confirmar">
                <div class="col-xs-12 col-sm-6">
                    <input class="input-cont text-com wow fadeInLeft" data-wow-delay=".5s" type="text" required placeholder="Nombre" name="User[nombre]">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <input class="input-cont text-com wow fadeInRight" data-wow-delay=".5s" type="text" required placeholder="Apellido" name="User[apellido]">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <input class="input-cont text-com wow fadeInRight" data-wow-delay=".5s" type="text" required placeholder="Correo eletrónico" name="User[correo]">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <input class="input-cont text-com wow fadeInRight" data-wow-delay=".5s" type="text" required placeholder="Telefono" name="User[telefono]">
                </div>
                <div class="col-xs-12 col-sm-3">
                     <select class="opt-cont text-com wow fadeIn dropdown-2" required data-wow-delay=".8s" name="Reserva[numero_adultos]">
                        <option value="0">N° Adultos</option>
                        <option value="1">1 Persona</option>
                        <option value="2">2 Personas</option>
                        <option value="3">3 Personas</option>
                        <option value="4">4 Personas</option>
                        <option value="5">5 Personas</option>
                        <option value="6">6 Personas</option>
                        <option value="7">7 Personas</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <select class="opt-cont text-com wow fadeIn dropdown-2" required data-wow-delay=".8s" name="Reserva[numero_ninos]">
                        <option value="0">N° Niños</option>
                        <option value="1">1 Persona</option>
                        <option value="2">2 Personas</option>
                        <option value="3">3 Personas</option>
                        <option value="4">4 Personas</option>
                        <option value="5">5 Personas</option>
                        <option value="6">6 Personas</option>
                        <option value="7">7 Personas</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <input class="opt-cont text-com wow fadeInRight icon-fecha-3" required readonly id="from" data-wow-delay=".8s" type="text" placeholder="Desde" name="Reserva[fecha_desde]">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <input class="opt-cont text-com wow fadeInRight icon-fecha-3" required readonly id="to" data-wow-delay=".8s" type="text" placeholder="Hasta" name="Reserva[fecha_hasta]">
                </div>
                <div class="col-xs-12 center-xs">
                    <button type="submit" class="btn-cont text-com  wow fadeIn"><a style="text-decoration:none; color:white;">
                    Reservar
                    <span class="title-cont"><b>>></b></span></a>
                    </button>
                </div>
            </form>
            <br>
            <br>
            <div class="row-2">
                <div class="text-com texto-gris start-xs col-xs-12 col-sm-6 wow fadeInLeft">
                    <div class="ry-cont"></div>
                    <h3 class="title-orange">Tenga en cuenta esta información:</h3>
                    <ul class="list-res">
                        <li>- Hotel no apto para mascotas debido a la ausencia de área y personal para su cuidado</li>
                        <li>- Hotel no apto para personas con discapacidad motriz, respiratoria, cardiaca o nerviosa.</li>
                    </ul>
                </div>
                <div class="text-com texto-gris col-xs-12 col-sm-6 wow fadeInRight">
                    <div class="ry-cont"></div>
                    <h3 class="title-orange ">Métodos de reserva</h3>
                    <ul class="list-res">
                        <li>- Horario de atención: De 8AM hasta 8:00PM</li>
                        <li>- Vía mail: info@hotelcalleprincipal.com</li>
                        <li>- Vía telefínica: 310 873 3121 / 311 254 7919</li>
                    </ul>
                </div>
                <div class="text-com texto-gris start-xs col-xs-12 col-sm-6 wow fadeInLeft">
                    <div class="ry-cont"></div>
                    <h3 class="title-orange">Formas de pago</h3>
                    <ul class="list-res">
                        <li>- Consignación en efectivo</li>
                        <li>- Se reciben tarjetas de Crédito Visa, Mastercard o American Express</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php $this->renderPartial('//layouts/_parallax-map'); ?>