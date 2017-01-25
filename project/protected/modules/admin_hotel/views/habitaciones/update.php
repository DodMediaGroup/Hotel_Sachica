<div class="page-heading">
    <h1>Editar Habitación- <small><?php echo $model->titulo_hab_item; ?></small></h1>
</div>

<?php $this->renderPartial('_form', array(
			'model'=>$model,
			'galerias'=>$galerias
)); ?>