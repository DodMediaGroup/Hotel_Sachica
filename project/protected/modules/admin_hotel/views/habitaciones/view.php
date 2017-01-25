<div class="row" style="margin-top:60px;">
	<div class="col-sm-12">
		<div class="widget widget-tabbed">
			<!-- Nav tab -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-tags"></i> Datos</a></li>
			  <li class=""><a href="#article" data-toggle="tab"><i class="fa fa-tags"></i> Contenido</a></li>
			</ul>
			<!-- End nav tab -->

			<!-- Tab panes -->
			<div class="tab-content">
				
				<!-- Tab about -->
				<div class="tab-pane animated fadeInRight active" id="about">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-12">
								<h2><?php echo $model->titulo_hab_item; ?></h2>
							</div>
							<div class="col-sm-12">
								<p>
									<strong>Galeria Adjunta:</strong><br>
									<?php 
									echo $model->gallery0->name;
									 ?>
								</p>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
				<!-- Tab about -->
				<div class="tab-pane animated fadeInRight" id="article">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-12">
								<h2>Descripción</h2>
								<?php echo $model->descripcion_hab_item;	 ?>
							</div>
							<div class="col-sm-12">
								<h2>Detalles</h2>
								<?php echo $model->detalle;	 ?>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
				<!-- End Tab about -->
			</div><!-- End div .tab-content -->
		</div><!-- End div .box-info -->
	</div>
</div>