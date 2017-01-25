<?php $path = explode("/",Yii::app()->request->pathInfo); ?>
<li>
	<a href='<?php echo $this->createUrl('index/') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'index')?'active':''):'active'; ?>">
		<i class='icon-home-3'></i>
		<span>Dashboard</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('reserva/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'reserva')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-calendar'></i>
		<span>Reservas</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('usuario/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'usuario')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-user'></i>
		<span>Usuarios</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('paginas/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'paginas')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-file'></i>
		<span>Páginas</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('nosotros/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'nosotros')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-edit'></i>
		<span>Nosotros</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('habitaciones/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'habitaciones')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-header'></i>
		<span>Habitaciones</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('planes/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'planes')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-glass'></i>
		<span>Planes</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('descubrir/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'descubrir')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-globe'></i>
		<span>Descubrir</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('servicios/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'servicios')?'active':''):''; ?>">
		<i class='glyphicon glyphicon-bell'></i>
		<span>Servicios</span>
	</a>
</li>
<li class='has_sub'>
	<a href='#'>
		<i class='icon-picture-2'></i>
		<span>Multimedia</span>
		<span class="pull-right">
			<i class="fa fa-angle-down"></i>
		</span>
	</a>
	<ul>
		<li>
			<a href='<?php echo $this->createUrl('galleries/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'galleries')?'active':''):''; ?>">
				<span>Galerias</span>
			</a>
		</li>
		<li>
			<a href='<?php echo $this->createUrl('imagesbank/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'imagesbank')?'active':''):''; ?>">
				<span>Banco de Imagenes</span>
			</a>
		</li>
	</ul>
</li>