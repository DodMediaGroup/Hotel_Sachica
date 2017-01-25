<?php

class ServiciosController extends Controller
{
	/**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='/layouts/main';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array(
                    'admin',
                    'create',
                    'view',
                    'update',
                    'status',
                    'delete_post'
                ),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
         $this->writeScripts();

        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
         $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=new Servicio;

        $galerias=Galleries::model()->findAllByAttributes(array("status"=> 1));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Servicio']))
        {
            $errors = false;

            $model->attributes=$_POST['Servicio'];
            $model->clearErrors();
            $model->imagen = "default.png";

            if($model->validate(null, false)){
                if($_FILES['logo']['size'] > 0){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['logo'], 500, 'servicio/');

                    if(!$uploadLogo['status']){
                        $model->addError('imagen', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->imagen = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'servicio/', $model->imagen, 600, 480);
                    }
                }
                else{
                    $model->addError('imagen', 'Es necesario agregar una imagen al servicio!!!');
                    $errors = true;
                }
                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->idservicio));
                }
            }
        }
        $this->render('create',array(
            'galerias'=>$galerias,
            'model'=>$model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
       $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model = $this->loadModel($id);

        $galerias=Galleries::model()->findAllByAttributes(array("status"=> 1));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Servicio']))
        {
            $errors = false;

            $model->attributes=$_POST['Servicio'];
            $model->clearErrors();

            if($model->validate(null, false)){
                if($_FILES['logo']['size'] > 0){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    $currentImagen = $model->imagen;
                    $uploadLogo = MyMethods::uploadImage($_FILES['logo'], 500, 'servicio/');

                    if(!$uploadLogo['status']){
                        $model->addError('imagen', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->imagen = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'servicio/', $model->imagen, 600, 480);

                         @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/servicio/".$currentImagen);
                        @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/servicio/200x315/".$currentImagen);
                    }
                }
            }
            if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->idservicio));
                }
        }
        $this->render('update',array(
            'galerias'=>$galerias,
            'model'=>$model
        ));
    }


     public function actionStatus($id){
        $servicio = $this->loadModel($id);
        if($servicio->status == 1)
            $servicio->status = 0;
        else if($servicio->status == 0)
            $servicio->status = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $servicio->save();
        $this->redirect(array('admin'));
    }


    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_post($id)
    {
        $servicio = $this->loadModel($id);

       $servicio->status = 2;
       $servicio->save();
       $this->redirect(array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Servicio');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $scriptsAdd = array(
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/css/dataTables.bootstrap'
            ),
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/jquery.dataTables.min'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/dataTables.bootstrap'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min'
            )
        );
        $this->addScripts($scriptsAdd);
        $this->writeScripts();

        $servicios = Servicio::model()->findAll(array('condition'=>'t.status != 2', 'order'=>'t.idservicio DESC'));

        $this->render('admin',array(
            'servicios'=>$servicios,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Habitacion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
         $model=Servicio::model()->findByAttributes(array('idservicio'=>$id), array('condition'=>'t.status != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Habitacion $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='servicio-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}