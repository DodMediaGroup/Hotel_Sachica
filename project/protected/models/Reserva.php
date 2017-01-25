<?php

/**
 * This is the model class for table "reserva".
 *
 * The followings are the available columns in table 'reserva':
 * @property integer $idReserva
 * @property string $fecha_desde
 * @property string $fecha_hasta
 * @property integer $numero_adultos
 * @property integer $numero_ninos
 * @property string $fecha_creacion
 * @property integer $status
 * @property integer $Usuario_idUsuario
 *
 * The followings are the available model relations:
 * @property Habitacion $habitacionIdHabitacion
 * @property Usuario $usuarioIdUsuario
 */
class Reserva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reserva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_desde, fecha_hasta, numero_adultos, usuario_idusuario', 'required'),
			array('numero_adultos, numero_ninos, status, usuario_idusuario', 'numerical', 'integerOnly'=>true),
			array('fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idreserva, fecha_desde, fecha_hasta,  numero_adultos, numero_ninos, fecha_creacion, status, usuario_idusuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuarioidusuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_idusuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idreserva' => 'Id Reserva',
			'fecha_desde' => 'Fecha Desde',
			'fecha_hasta' => 'Fecha Hasta',
			'numero_adultos' => 'Numero Adultos',
			'numero_ninos' => 'Numero Ninos',
			'fecha_creacion' => 'Fecha Creacion',
			'status' => 'status',
			'usuario_idusuario' => 'Usuario Id Usuario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idReserva',$this->idReserva);
		$criteria->compare('fecha_desde',$this->fecha_desde,true);
		$criteria->compare('fecha_hasta',$this->fecha_hasta,true);
		$criteria->compare('numero_adultos',$this->numero_adultos);
		$criteria->compare('numero_ninos',$this->numero_ninos);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('usuario_idusuario',$this->usuario_idUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reserva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
