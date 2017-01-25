<?php

/**
 * This is the model class for table "item_planes".
 *
 * The followings are the available columns in table 'item_planes':
 * @property integer $iditem_planes
 * @property string $titulo_plan
 * @property string $descripcion_plan
 * @property integer $status
 * @property integer $planes
 * @property integer $gallery
 *
 * The followings are the available model relations:
 * @property Galleries $gallery0
 * @property Planes $planes0
 */
class ItemPlanes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_planes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_plan, descripcion_plan, planes, gallery', 'required'),
			array('status, planes, gallery', 'numerical', 'integerOnly'=>true),
			array('titulo_plan', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iditem_planes, titulo_plan, descripcion_plan, status, planes, gallery', 'safe', 'on'=>'search'),
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
			'planes0' => array(self::BELONGS_TO, 'Planes', 'planes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iditem_planes' => 'Iditem Planes',
			'titulo_plan' => 'Titulo Plan',
			'descripcion_plan' => 'Descripcion Plan',
			'status' => 'Status',
			'planes' => 'Planes',
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

		$criteria->compare('iditem_planes',$this->iditem_planes);
		$criteria->compare('titulo_plan',$this->titulo_plan,true);
		$criteria->compare('descripcion_plan',$this->descripcion_plan,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('planes',$this->planes);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemPlanes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
