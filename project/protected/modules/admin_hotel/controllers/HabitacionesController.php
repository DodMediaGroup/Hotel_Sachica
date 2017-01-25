<?php

class HabitacionesController extends Controller
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

        $model=new ItemHab;

        $galerias=Galleries::model()->findAllByAttributes(array("status"=> 1));



        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ItemHab']))
        {
            $errors = false;

            $model->attributes=$_POST['ItemHab'];

            $model->habitacion = 1;

            $model->clearErrors();

            if($model->validate(null, false)){

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->iditem_hab));
                }
            }
        }
        $this->render('create',array(
            'galerias'=>$galerias,
            'model'=>$model,
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

        if(isset($_POST['ItemHab']))
        {
            $errors = false;

            $model->attributes=$_POST['ItemHab'];

            $model->habitacion = 1;

            $model->clearErrors();

            if($model->validate(null, false)){

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->iditem_hab));
                }
            }
        }
        $this->render('update',array(
            'galerias'=>$galerias,
            'model'=>$model,
        ));
    }


     public function actionStatus($id){
        $itemHab = $this->loadModel($id);
        if($itemHab->status == 1)
            $itemHab->status = 0;
        else if($itemHab->status == 0)
            $itemHab->status = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $itemHab->save();
        $this->redirect(array('admin'));
    }


    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_post($id)
    {
        $itemHab = $this->loadModel($id);

       $itemHab->status = 2;
       $itemHab->save();
       $this->redirect(array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Habitacion');
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

        $items_hab = ItemHab::model()->findAll(array('condition'=>'t.status != 2', 'order'=>'t.iditem_hab DESC'));

        $this->render('admin',array(
            'items_hab'=>$items_hab,
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
         $model=ItemHab::model()->findByAttributes(array('iditem_hab'=>$id), array('condition'=>'t.status != 2'));
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='habitacion-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}