<?php

class ApiController extends Controller
{
	public function actionAdd_User()
	{
		if(Yii::app()->request->isAjaxRequest){
            $name=trim($_POST["User"]["nombre"]);
            $lastname=trim($_POST["User"]["apellido"]);
            $email=trim($_POST["User"]["correo"]);
            $phone=trim($_POST["User"]["telefono"]);
            
            $response=array();
                        
            
            if($name!="" && $lastname!="" && $email!= ""){
                
                $validador=new CEmailValidator;
                
                if($validador->validateValue($email)){
                    
                $user = Usuario::model()->findByAttributes(array("correo" => $email));
                if($user== null){
                    $model=new Usuario;
                    $model->attributes=$_POST["User"];
                    $model->fecha_creacion=new CDbExpression("now()");
                    
                    $model->save();
                    $user=$model;
                }
                    
                    
                 $response["user"]= array(
                        "nombre"=> $user->nombre,
                        "apellido"=>$user->apellido,
                        "correo"=>$user->correo,                       
                        "telefono"=>$user->telefono,
                        "idusuario"=>$user->idusuario
                    );
                
                $response["status"]=true;
                }else{
                    $response["error"]="Correo electronico invalido";
                    $response["status"]=false;
                }
                
                                
            }else{
                $response["error"]="Complete todo los campos del formulario";
                $response["status"]=false;
            }
            
            echo CJSON::encode($response);
            
        }else{    
           throw new CHttpException(404, "La pagina solicitada no existe");
        }
        
	}
    
    public function actionadd_reservation()
    {
        if(Yii::app()->request->isAjaxRequest){
            if(isset($_POST["User"]) && isset($_POST["Reserva"])){
                $user=Usuario::model()->findByAttributes(array("idusuario"=> $_POST["User"]["idusuario"], "status"=> 1));
                if($user!=null){
                    $user->attributes=$_POST["User"];
                    $user->save();
                    $response=$this->add_reserva($user,$_POST["Reserva"]);
                                        
                }else{
                    $response["error"]= "La acción requerida no es posible realizarla";
                    $response["status"]=false;
                }
                
            }else{
                $response["error"]="Complete todo los campos del formulario";
                $response["status"]=false;
            }
           echo CJSON::encode($response);
            
        }else{
            throw new CHttpException(404, "La pagina solicitada no existe");
        }
        
    }
    
    public function actionadd_reserva(){
        if(Yii::app()->request->isAjaxRequest){
             if(isset($_POST["User"]) && isset($_POST["Reserva"])){
                 $user=Usuario::model()->findByAttributes(array("correo" => trim($_POST["User"]["correo"])));
                 if($user==null){
                    $model=new Usuario;
                    $model->attributes=$_POST["User"];
                    $model->fecha_creacion=new CDbExpression("now()");
                    if($model->save()){
                        $user=$model;
                    }else{
                        $response["error"]= $model->getErrors();
                        $response["status"]=false;                         
                    }
                 }
                 if($user!=null){
                     $response=$this->add_reserva($user,$_POST["Reserva"]);
                 }
                 
             }else{
                  $response["error"]="Complete todo los campos del formulario";
                $response["status"]=false;
            }
            echo CJSON::encode($response);
        }else{
            throw new CHttpException(404, "La pagina solicitada no existe");
        }
    }
    
    private function add_reserva($user, $reserva){
        date_default_timezone_set("America/Bogota");
        if(!(MyMethods::isValidDate($reserva["fecha_desde"],"d/m/Y") && MyMethods::isValidDate($reserva["fecha_hasta"],"d/m/Y"))){
            $response["error"]="Fecha no valida";
            $response["status"]=false;
        }
        else{
            $desde=@date_create(str_replace("/","-",$reserva["fecha_desde"]), new DateTimeZone("Europe/London"));
                $reserva["fecha_desde"]=date_format($desde,"Y/m/d");
            $hasta=@date_create(str_replace("/","-",$reserva["fecha_hasta"]), new DateTimeZone("Europe/London"));
                $reserva["fecha_hasta"]=date_format($hasta,"Y/m/d"); 
            
            $reservamodel= new Reserva;
            $reservamodel->attributes=$reserva;
            $reservamodel->fecha_creacion=new CDbExpression("now()");
            $reservamodel->usuario_idusuario=$user->idusuario;
            if($reservamodel->save()){
                $response["exito"]= "Su reserva se a realizado con exito!";
                $response["status"]=true;

                $emailContact = GeneralValue::model()->findByPk(5);
                $emailContent = '<p>Tu solicitud de reserva en Hotel Calle Principal se realizo con exito. Pronto nos comunicaremos contigo.</p><br>'.
                    '<p><strong>DETALLES DE LA RESERVA</strong></p>'.
                    '<p><strong>Nombre: </strong>'.$reservamodel->usuarioidusuario->nombre.' '.$reservamodel->usuarioidusuario->apellido.'</p>'.
                    '<p><strong>Fecha Reserva: </strong>'.$reservamodel->fecha_desde.' - '.$reservamodel->fecha_hasta.'</p>'.
                    '<p><strong>No. Adultos: </strong>'.$reservamodel->numero_adultos.'</p>'.
                    '<p><strong>No. Niños: </strong>'.(($reservamodel->numero_ninos != '')?$reservamodel->numero_ninos:0).'</p><br>'.
                    '<p><strong>Fecha Realización Reserva: </strong>'.date("d/m/Y").'</p>';
               //Esta es para el cliente
                MyMethods::sentMail('Estado de su Reserva', $emailContact->value, $reservamodel->usuarioidusuario->correo, $emailContent);

                $emailContent = '<p>Solicitaron una reserva desde el sitio web de Hotel Calle Principal.</p><br>'.
                    '<p><strong>DETALLES DE LA RESERVA</strong></p>'.
                    '<p><strong>Nombre: </strong>'.$reservamodel->usuarioidusuario->nombre.' '.$reservamodel->usuarioidusuario->apellido.'</p>'.
                    '<p><strong>Correo electrónico: </strong>'.$reservamodel->usuarioidusuario->correo.'</p>'.
                    '<p><strong>Teléfono: </strong>'.$reservamodel->usuarioidusuario->telefono.'</p><br>'.
                    '<p><strong>Fecha Reserva: </strong>'.$reservamodel->fecha_desde.' - '.$reservamodel->fecha_hasta.'</p>'.
                    '<p><strong>No. Adultos: </strong>'.$reservamodel->numero_adultos.'</p>'.
                    '<p><strong>No. Niños: </strong>'.(($reservamodel->numero_ninos != '')?$reservamodel->numero_ninos:0).'</p><br>'.
                    '<p><strong>Fecha Realización Reserva: </strong>'.date("d/m/Y").'</p>';
                //Esta es para el hotel
                MyMethods::sentMail('Solicitud de Reserva', $reservamodel->usuarioidusuario->correo, $emailContact->value, $emailContent);
                
            } 
            else{
                $response["error"]= $reservamodel->getErrors();
                $response["status"]=false;
            }
        }

        return $response;    
    }
}