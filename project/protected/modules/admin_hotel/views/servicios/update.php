<div class="page-heading">
    <h1>Editar <?php echo $model->titulo_servicio; ?></h1>
</div>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'galerias'=>$galerias
)); ?>