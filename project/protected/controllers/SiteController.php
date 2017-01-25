<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
        
	}

    public function actionNosotros(){
    	$pagina = Nosotros::model()->findByPk(1);
    	$items = ItemNosotros::model()->findAllByAttributes(array('status'=>1), array('order'=>'t.iditem_nosotros DESC'));

        $this->render('nosotros',array(
        	'pagina'=> $pagina,
        	'items' => $items
        	));
    }
    public function actionHabitacion(){
    	$pagina = Habitacion::model()->findByPk(1);
    	$items = ItemHab::model()->findAllByAttributes(array('status'=>1), array('order'=>'t.iditem_hab DESC'));

        $this->render('habitacion', array(
        	'pagina' => $pagina,
        	'items' => $items
        	));
    }
    
    public function actionServicios(){
    	$servicios = Servicio::model()->findAllByAttributes(array('status'=>1),array('order'=>'t.idservicio DESC'));
        $this->render('servicios',array(
        	'servicios' => $servicios
        	));
    }
    
    public function actionReserva(){
        $this->render('reserva');
    }
    
    public function actionUbicacion(){
        $this->render('ubicacion');
    }
    
    public function actionContacto(){
        $this->render('contacto');
    }
    
    public function actionPlanes(){
        $pagina = Planes::model()->findByPk(1);
       $items = ItemPlanes::model()->findAllByAttributes(array('status'=>1), array('order'=>'t.iditem_planes DESC'));

        $this->render('planes', array(
        	'pagina' => $pagina,
        	'items' => $items
        	));
    }
    
    public function actionDescubrir(){
        $pagina = Descubrir::model()->findByPk(1);
    	$items = ItemDescubrir::model()->findAllByAttributes(array('status'=>1), array('order'=>'t.iditem_des DESC'));

        $this->render('descubrir', array(
        	'pagina' => $pagina,
        	'items' => $items
        	));
    }
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
        $this->layout='//layouts/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		if(Yii::app()->request->isAjaxRequest){
			$arrayReturn = array(
				'status'=>false,
				'message'=>'No se pudo enviar el mensaje. Intente mas tarde.'
			);
			$emailContact = GeneralValue::model()->findByPk(5);
			$emailContent = '<p>Un usuario envio un mensaje desde el formulario de contacto de la pagina web de Hotel Calle Principal.</p><br>'.
			'<p><strong>Nombre: </strong>'.$_POST['name'].'</p>'.
			'<p><strong>Correo electrónico: </strong>'.$_POST['email'].'</p>'.
			'<p><strong>Telefono: </strong>'.$_POST['phone'].'</p><br>'.
			'<p><strong>Mensaje: </strong>'.$_POST['message'].'</p><br>';

			if(MyMethods::sentMail('Mensaje contacto web Hotel Calle Principal', $_POST['email'], $emailContact->value, $emailContent, array('fromName'=>$_POST['name']))){
				$arrayReturn = array(
					'status'=>true,
					'message'=>'Tu mensaje fue enviado con exito. Muy pronto nos comunicaremos contigo.'
				);
			}

			echo CJSON::encode($arrayReturn);
		}
		else
			throw new CHttpException(404,'The requested page does not exist.');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    function page_contacto(){
		if(Yii::app()->request->isAjaxRequest){
			$arrayReturn = array(
				'status'=>'error',
				'message'=>'No se pudo enviar el mensaje. Intente mas tarde.'
			);
			$emailContact = Variables::model()->findByPk(4);
			$emailContent = '<p>Un usuario envio un mensaje desde el formulario de contacto de la pagina web de Natural Drops.</p><br>'.
			'<p><strong>Nombre: </strong>'.$_POST['name'].'</p>'.
			'<p><strong>Correo electrónico: </strong>'.$_POST['email'].'</p>'.
			'<p><strong>Telefono: </strong>'.$_POST['phone'].'</p>'.
			'<p><strong>Asunto: </strong>'.$_POST['subject'].'</p><br>';

			if(MyMethods::sentMail('Mensaje contacto web Hotel Calle Principal', $_POST['email'], $emailContact->value, $emailContent, array('fromName'=>$_POST['name']))){
				$arrayReturn = array(
					'status'=>'success',
					'message'=>'Tu mensaje fue enviado con exito. Muy pronto nos comunicaremos contigo.'
				);
			}

			echo CJSON::encode($arrayReturn);
		}
		else{
			$this->suscription = true;
			
			$phone = Variables::model()->findByPk(5);
			$email = Variables::model()->findByPk(4);
			$address = Variables::model()->findByPk(6);

			$page = PagesSite::model()->findByAttributes(array('principal'=>14, 'language'=>Yii::app()->request->cookies['language']));
			if($page == null)
				$page = PagesSite::model()->findByPk(14);

			$this->render('contact', array(
				'page'=>$page,
				'phone'=>$phone,
				'email'=>$email,
				'address'=>$address,
			));
		}
	}

}