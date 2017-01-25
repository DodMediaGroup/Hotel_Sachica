<?php

/**
 * This is the model class for table "item_descubrir".
 *
 * The followings are the available columns in table 'item_descubrir':
 * @property integer $iditem_des
 * @property string $titulo_des
 * @property string $descripcion_hab_item
 * @property integer $status
 * @property integer $descubrir
 * @property integer $gallery
 *
 * The followings are the available model relations:
 * @property Descubrir $descubrir0
 * @property Galleries $gallery0
 */
class ItemDescubrir extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_descubrir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_des, descripcion_des, descubrir, gallery', 'required'),
			array('status, descubrir, gallery', 'numerical', 'integerOnly'=>true),
			array('titulo_des', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iditem_des, titulo_des, descripcion_des, status, descubrir, gallery', 'safe', 'on'=>'search'),
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
			'descubrir0' => array(self::BELONGS_TO, 'Descubrir', 'descubrir'),
			'gallery0' => array(self::BELONGS_TO, 'Galleries', 'gallery'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iditem_des' => 'Iditem Des',
			'titulo_des' => 'Titulo Des',
			'descripcion_des' => 'Descripcion Hab Item',
			'status' => 'Status',
			'descubrir' => 'Descubrir',
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

		$criteria->compare('iditem_des',$this->iditem_des);
		$criteria->compare('titulo_des',$this->titulo_des,true);
		$criteria->compare('descripcion_des',$this->descripcion_des,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('descubrir',$this->descubrir);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemDescubrir the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
