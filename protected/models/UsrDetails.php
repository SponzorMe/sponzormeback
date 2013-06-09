<?php

/**
 * This is the model class for table "usr_details".
 *
 * The followings are the available columns in table 'usr_details':
 * @property integer $id
 * @property integer $usr_id
 * @property string $k
 * @property string $v
 *
 * The followings are the available model relations:
 * @property Usr $usr
 */
class UsrDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsrDetails the static model class
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
		return 'usr_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usr_id, k, v', 'required'),
			array('usr_id', 'numerical', 'integerOnly'=>true),
			array('k, v', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usr_id, k, v', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usr_id' => 'Usr',
			'k' => 'K',
			'v' => 'V',
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
		$criteria->compare('usr_id',$this->usr_id);
		$criteria->compare('k',$this->k,true);
		$criteria->compare('v',$this->v,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}