<div class="page-heading">
    <h1>Editar <?php echo $model->titulo; ?></h1>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'paginas_form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'role'=>'form',
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
					<h2><strong>Páginas</strong></h2>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->labelEx($model,'titulo'); ?>
        				<?php echo $form->textField($model,'titulo',array('class'=>'form-control','maxlength'=>250,'placeholder'=>'Titulo','required'=>true, 'name'=> "Paginas[titulo]")); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Contenido</strong></h2>
				</div>
				<div class="widget-content">
					<?php echo $form->textArea($model,'descripcion',array('class'=>'js-ckeditor', 'name'=> "Paginas[descripcion]")); ?>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('paginas/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>