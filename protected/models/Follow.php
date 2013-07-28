<?php

/**
 * This is the model class for table "follow".
 *
 * The followings are the available columns in table 'follow':
 * @property integer $id
 * @property integer $follower
 * @property integer $following
 *
 * The followings are the available model relations:
 * @property Usr $follower0
 * @property Usr $following0
 */
class Follow extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Follow the static model class
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
        return 'follow';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('follower, following', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, follower, following', 'safe', 'on'=>'search'),
        );
    }


    public function beforeValidate()
    {
        if (parent::beforeValidate()) {

            $validator = CValidator::createValidator('unique', $this, 'following', array(
                'criteria' => array(
                    'condition'=>'`follower`=:secondKey AND `following`=:firstKey',
                    'params'=>array(
                        ':secondKey'=>$this->follower, 
                        ':firstKey'=>$this->following, 
                    )
                )
            ));
            $this->getValidatorList()->insertAt(0, $validator); 
            return true;
        }
        return false;
    }


    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userFollower' => array(self::BELONGS_TO, 'Usr', 'follower'),
            'userFollowing' => array(self::BELONGS_TO, 'Usr', 'following'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'follower' => 'Follower',
            'following' => 'Following',
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
        $criteria->compare('follower',$this->follower);
        $criteria->compare('following',$this->following);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
