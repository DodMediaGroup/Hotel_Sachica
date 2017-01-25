<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'servicios-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'role'=>'form',
        'enctype'=>"multipart/form-data",
    )
)); ?>

	<div class="row">
		<?php if($form->errorSummary($model) != ""){ ?>
			<div class="col-sm-12">
	            <div class="alert alert-danger">
	                <?php echo $form->errorSummary($model); ?>
	            </div>
	        </div>
        <?php } ?>
		<div class="col-sm-6">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Datos Generales</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->labelEx($model,'titulo_servicio'); ?>
        				<?php echo $form->textField($model,'titulo_servicio',array('class'=>'form-control','maxlength'=>250,'placeholder'=>'Título','required'=>true)); ?>
					</div>
					<div class="form-group">
								<label for="">Galeria</label>
							<?php
								foreach ($galerias as $key => $galeria) {
							?>
								<div>
									<label><input type="radio" <?php echo ($galeria->id_gallery == $model->gallery)?'checked':''; ?> name="Servicio[gallery]" value="<?php echo $galeria->id_gallery ?>"> <?php echo $galeria->name; ?></label>
								</div>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Imagen Portada</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->labelEx($model,'imagen'); ?>
						<div class="imag-before-upload" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/servicio/default.png);">
							<?php if(!$model->isNewRecord){ ?>
								<div class="img" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/servicio/600x480/<?php echo $model->imagen; ?>)"></div>
							<?php } ?>
						</div>
						<input type="file" accept="image/*" class="btn btn-default js-show-before" name="logo" data-before=".imag-before-upload" title="<?php echo ($model->isNewRecord)?'Agregar Imagen':'Cambiar Imagen' ?>">
						<p class="help-block"><strong>Nota: </strong> Dimensiones recomendadas de 480x600. Peso maximo 500Kb.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Descripción</strong> del servicio</h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->textArea($model,'descripcion_servicio',array('class'=>'form-control', "style"=>"height: 160px; resize: none;")); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('servicios/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>