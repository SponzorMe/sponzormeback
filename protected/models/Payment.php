<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property integer $id
 * @property integer $referencia
 * @property integer $usr_id
 * @property integer $causa_id
 * @property string $date
 * @property double $value
 * @property string $currency
 *
 * The followings are the available model relations:
 * @property Usr $usr
 * @property Causa $causa
 */
class Payment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payment the static model class
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
		return 'payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('referencia, usr_id, causa_id', 'numerical', 'integerOnly'=>true),
			array('value', 'numerical'),
			array('currency', 'length', 'max'=>45),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, referencia, usr_id, causa_id, date, value, currency', 'safe', 'on'=>'search'),
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
			'causa' => array(self::BELONGS_TO, 'Causa', 'causa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'referencia' => 'Referencia',
			'usr_id' => 'Usr',
			'causa_id' => 'Causa',
			'date' => 'Date',
			'value' => 'Value',
			'currency' => 'Currency',
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
		$criteria->compare('referencia',$this->referencia);
		$criteria->compare('usr_id',$this->usr_id);
		$criteria->compare('causa_id',$this->causa_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('currency',$this->currency,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}