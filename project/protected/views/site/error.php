<?php
/* @var $this SiteController */
/* @var $error array */
$this->renderPartial('//layouts/_header');
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
); 
?>
    <div class="content-error text-argon">
        <img class="error-logo" src="images/logo.png" alt="">
        <h2 class="text-error text-com">Error <?php echo $code; ?></h2>
        <h1 class="text-error">PÁGINA NO ENCONTRADA</h1>
        <h3 class="description-error text-argon">Parece que ha habido un error<br> con la página que estabas buscando</h3>

    </div>
    <footer class="footer-error text-argon">
        <p>Dirección: calle 3 N° 1A-66 Sáchica - Boyacá - Colombia</p>
        <p>Teléfono: (57) 8 - 734 21 88</p>
        <p>Celular: (57) 314 353 0369</p>
        <p>email: contactenos@hotelcalleprincipal.com</p>
    </footer>