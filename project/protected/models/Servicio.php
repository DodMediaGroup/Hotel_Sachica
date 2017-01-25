<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $idservicio
 * @property string $titulo_servicio
 * @property string $descripcion_servicio
 * @property string $imagen
 * @property integer $status
 * @property integer $gallery
 *
 * The followings are the available model relations:
 * @property Galleries $gallery0
 */
class Servicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_servicio, descripcion_servicio, imagen, gallery', 'required'),
			array('status, gallery', 'numerical', 'integerOnly'=>true),
			array('titulo_servicio', 'length', 'max'=>255),
			array('imagen', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idservicio, titulo_servicio, descripcion_servicio, imagen, status, gallery', 'safe', 'on'=>'search'),
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
			'gallery0' => array(self::BELONGS_TO, 'Galleries', 'gallery'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idservicio' => 'Idservicio',
			'titulo_servicio' => 'Titulo Servicio',
			'descripcion_servicio' => 'Descripcion Servicio',
			'imagen' => 'Imagen',
			'status' => 'Status',
			'gallery' => 'Gallery',
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

		$criteria->compare('idservicio',$this->idservicio);
		$criteria->compare('titulo_servicio',$this->titulo_servicio,true);
		$criteria->compare('descripcion_servicio',$this->descripcion_servicio,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
