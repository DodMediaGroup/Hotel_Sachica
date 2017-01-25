<?php

class PaginasController extends Controller
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
                    'update',
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
        $model=new Habitacion;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Habitacion']))
        {
            $model->attributes=$_POST['Habitacion'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->idhab));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
       public function actionUpdate()
    {
    	if(isset($_GET["page"])){

	    	$scriptsAdd = array(
	            array(
	                'type'=>'css',
	                'file'=>'assets/admin/libs/bootstrap-validator/css/bootstrapValidator.min'
	            ),
	            array(
	                'type'=>'js',
	                'file'=>'assets/admin/libs/bootstrap-validator/js/bootstrapValidator.min'
	            ),
	            array(
	                'type'=>'js',
	                'file'=>'assets/admin/libs/ckeditor/ckeditor'
	            ),
	            array(
	                'type'=>'js',
	                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
	            ),
	            array(
	                'type'=>'js',
	                'file'=>'assets/admin/js/pages/form-validation'
	            )
	        );
		        $this->addScripts($scriptsAdd, 'admin');
		        $this->writeScripts();

		        $model=$_GET["page"]::model()->findByPk(1);

		        // Uncomment the following line if AJAX validation is needed
		        // $this->performAjaxValidation($model);

		        if(isset($_POST['Paginas']))
		        {
		            $errors = false;

		            $model->attributes = $_POST['Paginas'];
		            $model->clearErrors();

		            if($model->validate(null, false)){
		                if($model->save()){
		                    $this->redirect(array('admin'));
		                }
		            }
		        }

		        $this->render('update',array(
		            'model'=>$model,
		        ));
		    	}
    	else{
    		throw new CHttpException(404,'The requested page does not exist.');
    	}
        
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
        $paginas = array(); 
        $habitacion = Habitacion::model()->findByPk(1);
        $descubrir = Descubrir::model()->findByPk(1);
        $planes = 	 Planes::model()->findByPk(1);
        $nosotros = Nosotros::model()->findByPk(1);
        $paginas[] = array(
        	'data'=> $habitacion,
        	'controller'=> "Habitacion"
        	);
        $paginas[] = array(
        	'data' => $descubrir,
        	'controller'=> "Descubrir"
        	);
        $paginas[] = array(
        	'data' => $planes,
        	'controller'=> "Planes"
        	);
        $paginas[] = array(
        	'data' => $nosotros,
        	'controller'=> "Nosotros"
        	);
        $this->render('admin',array(
            'paginas'=>$paginas,
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
        $model=Habitacion::model()->findByPk($id);
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