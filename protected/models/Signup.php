<?php

/**
 * This is the model class for table "usr".
 *
 * The followings are the available columns in table 'usr':
 * @property integer $id
 * @property string $fullname
 * @property string $password
 * @property string $passwordr
 * @property string $email
 * @property integer $admin
 * @property string $headline
 * @property string $location
 * @property integer $typeof_id
 *
 * The followings are the available model relations:
 * @property Element[] $elements
 * @property Typeof $typeof
 * @property UsrDetails[] $usrDetails
 */
class Signup extends CActiveRecord
{
  private $_identity;
  public $passwordr;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usr the static model class
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
		return 'usr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullname, password, email, passwordr', 'required'),
			array('admin, typeof_id', 'numerical', 'integerOnly'=>true),
    		array('fullname, password, email, headline, location', 'length', 'max'=>255),
      		array('passwordr', 'compare', 'compareAttribute'=>'password'),
			array('id, fullname, password, email, admin, headline, location, typeof_id', 'safe', 'on'=>'search'),
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
			'elements' => array(self::HAS_MANY, 'Element', 'usr_id'),
			'typeof' => array(self::BELONGS_TO, 'Typeof', 'typeof_id'),
			'usrDetails' => array(self::HAS_MANY, 'UsrDetails', 'usr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fullname' => 'Nombre Completo',
			'password' => 'Contraseña',
			'passwordr' => 'Repite tu Contraseña',
			'email' => 'Email',
			'admin' => 'Admin',
			'headline' => 'Slogan',
			'location' => 'Ubicación',
			'typeof_id' => 'Cuál es tu rol',
		);
	}


  public function create_user()
  {
      $usr = new Usr;
      $_POST['Signup']['password'] = md5($_POST['Signup']['password']);
      $usr->attributes = $_POST['Signup'];
      if ($usr->save(false) ){
            $this->_identity=new UserIdentity($this->fullname,$this->password);
			      Yii::app()->user->login( $this->_identity, 3600*24*30 );
            return true;
      }
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
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('headline',$this->headline,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('typeof_id',$this->typeof_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
