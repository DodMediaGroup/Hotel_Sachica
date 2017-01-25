<?php

/**
 * This is the model class for table "item_nosotros".
 *
 * The followings are the available columns in table 'item_nosotros':
 * @property integer $iditem_nosotros
 * @property string $titulo_nosotros
 * @property string $descripcion_nosotros
 * @property integer $status
 * @property integer $nosotros
 * @property integer $gallery
 *
 * The followings are the available model relations:
 * @property Galleries $gallery0
 * @property Nosotros $nosotros0
 */
class ItemNosotros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_nosotros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_nosotros, descripcion_nosotros, nosotros, gallery', 'required'),
			array('status, nosotros, gallery', 'numerical', 'integerOnly'=>true),
			array('titulo_nosotros', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iditem_nosotros, titulo_nosotros, descripcion_nosotros, status, nosotros, gallery', 'safe', 'on'=>'search'),
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
			'nosotros0' => array(self::BELONGS_TO, 'Nosotros', 'nosotros'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iditem_nosotros' => 'Iditem Nosotros',
			'titulo_nosotros' => 'Titulo Nosotros',
			'descripcion_nosotros' => 'Descripcion Nosotros',
			'status' => 'Status',
			'nosotros' => 'Nosotros',
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

		$criteria->compare('iditem_nosotros',$this->iditem_nosotros);
		$criteria->compare('titulo_nosotros',$this->titulo_nosotros,true);
		$criteria->compare('descripcion_nosotros',$this->descripcion_nosotros,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('nosotros',$this->nosotros);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemNosotros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
