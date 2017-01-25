<div class="profile-banner" style="background-position: center 75%; background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/admin/gray.jpg);">
	<div class="col-sm-3 avatar-container">
		<img style="border-radius: 0px; max-height: 315px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/servicio/600x480/<?php echo $model->imagen; ?>" class="img-circle profile-avatar" alt="<?php echo $model->titulo_servicio; ?>">
	</div>
</div>

<div class="row" style="margin-top: 60px;">
	<div class="col-sm-3">
		<!-- Begin user profile -->
		<div class="text-center user-profile-2" style="margin-top: 160px;">
			<h4><?php echo $model->titulo_servicio; ?></h4>
		</div><!-- End div .box-info -->
		<!-- Begin user profile -->
	</div><!-- End div .col-sm-3 -->
	<div class="col-sm-9">
		<div class="widget widget-tabbed">
			<!-- Nav tab -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-tags"></i> Datos Generales</a></li>
			  <li><a href="#article" data-toggle="tab"><i class="fa fa-desktop"></i> Contenido</a></li>
			</ul>
			<!-- End nav tab -->

			<!-- Tab panes -->
			<div class="tab-content">
				
				<!-- Tab about -->
				<div class="tab-pane animated fadeInRight active" id="about">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-12">
								<h2><?php echo $model->titulo_servicio; ?></h2>
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
								<p><?php echo $model->descripcion_servicio; ?></p>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
			</div><!-- End div .tab-content -->
		</div><!-- End div .box-info -->
	</div>
</div>