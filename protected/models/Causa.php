<?php

/**
 * This is the model class for table "causa".
 *
 * The followings are the available columns in table 'causa':
 * @property integer $id
 * @property string $end_date
 * @property string $name
 * @property string $description
 * @property integer $usr_id
 *
 * The followings are the available model relations:
 * @property Usr $usr
 * @property Payment[] $payments
 */
class Causa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Causa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'causa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, usr_id', 'required'),
			array('usr_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('end_date, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, end_date, name, description, usr_id', 'safe', 'on'=>'search'),
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
			'usr' => array(self::BELONGS_TO, 'Usr', 'usr_id'),
			'payments' => array(self::HAS_MANY, 'Payment', 'causa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'end_date' => 'End Date',
			'name' => 'Name',
			'description' => 'Description',
			'usr_id' => 'Usr',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('usr_id',$this->usr_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}