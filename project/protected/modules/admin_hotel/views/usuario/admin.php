<div class="page-heading">
    <h1>Administración Usuarios</h1>
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
                                <!--<a class="btn btn-success" href="<?php echo $this->createUrl('usuario/create'); ?>"><i class="fa fa-plus-circle"></i> Add new</a>-->
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
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Fecha de creación</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                   <th>#</th>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Fecha de creación</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
					            	foreach ($usuarios as $key => $usuario) { ?>
                                    <tr>
                                        <td style="text-align:center;">
                                            <?php echo $key+1; ?>
                                        </td>
                                        <td style="width:120px;">
                                            <div class="btn-group btn-group-xs">
                                                <?php if($usuario->status == 1){ ?>
                                                    <a href="<?php echo $this->createUrl('usuario/status')."/".$usuario->idusuario; ?>" data-toggle="tooltip" title="Desactivar" class="btn btn-default"><i class="fa fa-minus-circle"></i></a>
                                                    <?php } else{ ?>
                                                        <a href="<?php echo $this->createUrl('usuario/status')."/".$usuario->idusuario; ?>" data-toggle="tooltip" title="Activar" class="btn btn-default"><i class="fa fa-check"></i></a>
                                                        <?php } ?>
                                                            <a data-msj='¿Esta seguro de querer eliminar al usuario:  "<?php echo $usuario->nombre; ?>"? Despues no podra recuperar esta información, recuerde que otra opción es desactivar al usuario.' href="<?php echo $this->createUrl('usuario/delete_usuario')."/".$usuario->idusuario; ?>" data-toggle="tooltip" title="Eliminar" class="js-confirm btn btn-default"><i class="fa fa-power-off"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $usuario->nombre.' '.$usuario->apellido; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->correo; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->telefono; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->fecha_creacion; ?>
                                        </td>
                                       <td><span class="label label-<?php echo($usuario->status == 1)?"success":"warning" ?>"><?php echo ($usuario->status == 1)?'Activo':'Inactivo'; ?></span></td>
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