<div class="page-heading">
    <h1>Administración Reservas</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-content">
                <div class="widget-header transparent">
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                    </div>
                </div>
                <div class="data-table-toolbar">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-4">
                            <div class="toolbar-btn-action">
                                <!--<a class="btn btn-success" href="<?php echo $this->createUrl('reserva/create'); ?>"><i class="fa fa-plus-circle"></i> Add new</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <form class='form-horizontal' role='form'>
                        <table class="table table-striped table-bordered js-data-table" cellspacing="0" width="100%">
                            <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Fecha desde</th>
                                    <th>Fecha hasta</th>
                                    <th>N° Adultos</th>
                                    <th>N° Niños</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de reservación</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Fecha desde</th>
                                    <th>Fecha hasta</th>
                                    <th>N° Adultos</th>
                                    <th>N° Niños</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de reservación</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
					            	foreach ($reservas as $key => $reserva) { ?>
                                    <tr>
                                        <td style="text-align:center;">
                                            <?php echo $key+1; ?>
                                        </td>
                                        <td style="width:120px;">
                                            <div class="btn-group btn-group-xs">
                                                <?php if($reserva->status == 1){ ?>
                                                    <a href="<?php echo $this->createUrl('reserva/status')."/".$reserva->idreserva; ?>" data-toggle="tooltip" title="Aprobar" class="btn btn-default"><i class="fa fa-check"></i></a>
                                                    <?php } else{ ?>
                                                        <a href="<?php echo $this->createUrl('reserva/status')."/".$reserva->idreserva; ?>" data-toggle="tooltip" title="Cancelar" class="btn btn-default"><i class="fa fa-minus-circle"></i></a>
                                                        <?php } ?>
                                                            <a data-msj='¿Esta seguro de querer cancelar la reserva del señor:  "<?php echo $reserva->usuarioidusuario->nombre; ?>"? Despues no podra recuperarla.' href="<?php echo $this->createUrl('reserva/delete_reserva')."/".$reserva->idreserva; ?>" data-toggle="tooltip" title="Cancelar" class="js-confirm btn btn-default"><i class="fa icon-cancel-3"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $reserva->usuarioidusuario->nombre.' '.$reserva->usuarioidusuario->apellido; ?>
                                        </td>
                                        <td>
                                            <?php echo $reserva->fecha_desde;?>
                                        </td>
                                        <td>
                                            <?php echo $reserva->fecha_hasta; ?>
                                        </td>
                                        <td>
                                            <?php echo $reserva->numero_adultos; ?>
                                        </td>
                                        <td>
                                            <?php echo $reserva->numero_ninos; ?>
                                        </td>
                                        <td>
                                            <?php echo $reserva->usuarioidusuario->telefono; ?>
                                        </td>
                                        <td>
                                            <?php echo $reserva->fecha_creacion; ?>
                                        </td>
                                       <td><span class="label label-<?php echo($reserva->status == 1)?"success":"warning" ?>"><?php echo ($reserva->status == 1)?'Solicitada':'Aprovada'; ?></span></td>
                                    </tr>
                                    <?php }
								?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>