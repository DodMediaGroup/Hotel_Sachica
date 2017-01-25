<div class="page-heading">
    <h1>Editar Plan <small><?php echo $model->titulo_des; ?></small></h1>
</div>

<?php $this->renderPartial('_form', array(
			'model'=>$model,
			'galerias'=>$galerias
)); ?>