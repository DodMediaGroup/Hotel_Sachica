<?php

/**
 * This is the model class for table "item_hab".
 *
 * The followings are the available columns in table 'item_hab':
 * @property integer $iditem_hab
 * @property string $titulo_hab_item
 * @property string $descripcion_hab_item
 * @property string $detalle
 * @property integer $status
 * @property integer $habitacion
 * @property integer $gallery
 *
 * The followings are the available model relations:
 * @property Galleries $gallery0
 * @property Habitacion $habitacion0
 */
class ItemHab extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_hab';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_hab_item, descripcion_hab_item, detalle, habitacion, gallery', 'required'),
			array('status, habitacion, gallery', 'numerical', 'integerOnly'=>true),
			array('titulo_hab_item, detalle', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iditem_hab, titulo_hab_item, descripcion_hab_item, detalle, status, habitacion, gallery', 'safe', 'on'=>'search'),
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
			'habitacion0' => array(self::BELONGS_TO, 'Habitacion', 'habitacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iditem_hab' => 'Iditem Hab',
			'titulo_hab_item' => 'Titulo Hab Item',
			'descripcion_hab_item' => 'Descripcion Hab Item',
			'detalle' => 'Detalle',
			'status' => 'Status',
			'habitacion' => 'Habitacion',
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

		$criteria->compare('iditem_hab',$this->iditem_hab);
		$criteria->compare('titulo_hab_item',$this->titulo_hab_item,true);
		$criteria->compare('descripcion_hab_item',$this->descripcion_hab_item,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('habitacion',$this->habitacion);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemHab the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
