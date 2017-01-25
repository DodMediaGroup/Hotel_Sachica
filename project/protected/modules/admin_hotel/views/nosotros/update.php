<div class="page-heading">
    <h1>Editar Item Pagina Nosotros- <small><?php echo $model->titulo_nosotros; ?></small></h1>
</div>

<?php $this->renderPartial('_form', array(
			'model'=>$model,
			'galerias'=>$galerias
)); ?>