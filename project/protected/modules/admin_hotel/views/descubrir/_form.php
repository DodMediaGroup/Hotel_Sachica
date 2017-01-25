<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'des-form',
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
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Descubrir</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
						<div class="form-group">
							<?php echo $form->labelEx($model,'titulo_descubrir'); ?>
	        				<?php echo $form->textField($model,'titulo_des',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Título','required'=>true)); ?>
						</div>
						<div class="form-group">
								<label for="">Galeria</label>
							<?php
								foreach ($galerias as $key => $galeria) {
							?>
								<div>
									<label><input type="radio" <?php echo ($galeria->id_gallery == $model->gallery)?'checked':''; ?> name="ItemDescubrir[gallery]" value="<?php echo $galeria->id_gallery ?>"> <?php echo $galeria->name; ?></label>
								</div>
							<?php } ?>
						</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Descripción</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->textArea($model,'descripcion_des',array('class'=>'js-ckeditor')); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('descubrir/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>