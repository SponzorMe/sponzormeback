<?php

/**
 * This is the model class for table "wall".
 *
 * The followings are the available columns in table 'wall':
 * @property integer $id
 * @property string $url
 * @property string $text
 * @property integer $likecount
 * @property integer $deleted
 * @property string $json
 * @property integer $usr_id
 * @property string $date_created
 */
class Wall extends CActiveRecord
{
    public $deleted = 0;
    public $likecount = 0;
    public $json = array();
    public $type = 1;
    public $url;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Wall the static model class
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
        return 'wall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            // array('likecount, deleted, usr_id', 'numerical', 'integerOnly'=>true),
            array('url', 'length', 'max'=> 1024),
            array('text, json, date_created', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, url, text, likecount, deleted, json, usr_id, date_created', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'url' => 'Url',
            'text' => 'Text',
            'likecount' => 'Likecount',
            'deleted' => 'Deleted',
            'json' => 'Json',
            'usr_id' => 'Usr',
            'date_created' => 'Date Created',
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
        $criteria->compare('url',$this->url,true);
        $criteria->compare('text',$this->text,true);
        $criteria->compare('likecount',$this->likecount);
        $criteria->compare('deleted',$this->deleted);
        $criteria->compare('json',$this->json,true);
        $criteria->compare('usr_id',$this->usr_id);
        $criteria->compare('date_created',$this->date_created,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function beforeSave()
    {
        $this->json = json_encode($this->json);
        return parent::beforeSave();
    }

    public function save($runValidation = true, $attributes = NULL)
    {
        if(  !isset( $_FILES['Wall']['tmp_name']['url']  ) ) { // $this->type != 1 ){
            parent::save($runValidation, $attributes);
            return true;
        }
        // vamos a guardar las imagencitas y eso 
        require_once('./protected/extensions/Upload.php');
        $f = new Upload( $_FILES['Wall']['tmp_name']['url'] );
        if( $f->uploaded && $f->file_is_image ) {
            $ratio = $f->image_src_x / $f->image_src_y;
            $ratios = array(3, 1.5, 0.75);
            $size =  [ 3 =>['x'=>900, 'y'=>300 ], 1.5 => ['x'=>450, 'y'=>300] ,  0.75 => ['x'=>450, 'y'=>600 ] ] ;
            $rs = array();
            for($i =0; $i < count($ratios); $i++){
                $rs[] =  abs( $ratio   - $ratios[$i]   ) ; 
            }
            $ratio =  $ratios[ array_search( min($rs) , $rs )  ] ;
            $big = false;
            if( $ratio  == 1.5 && $f->image_src_y >= 900 ){
                $size['1.5'] = ['x'=>900, 'y'=>600];
                $big = true; 
            }
            $f->image_resize = true;
            $f->image_convert = 'jpg';
            $f->file_new_name_body = Yii::app()->user->getId().time();
            $f->image_ratio_crop = true;
            $f->jpeg_quality = 100;
            $f->image_x = $size[$ratio]['x'];
            $f->image_y = $size[$ratio]['y'];
            $f->process('./uploads');
            if($f->processed ){
                Yii::import('application.extensions.file.*');
                $name =  $_FILES['Wall']['name']['url'] ;
                //imagen original en amazonciviris
                $success = Yii::app()->s3->upload( $_FILES['Wall']['tmp_name']['url']  , $name , 'sponzorme' );
                $this->url = 'https://s3.amazonaws.com/sponzorme/'.$name;
                $success = Yii::app()->s3->upload( $f->file_dst_pathname  , $f->file_dst_name  , 'sponzorme' );
                $url = 'https://s3.amazonaws.com/sponzorme/'.$f->file_dst_name ;
                unlink($f->file_dst_pathname );
                $f->clean();
                //detalles de la maricada
                $this->json = json_encode( array("w" => (string)$size[$ratio]["x"], "h"=> (string)$size[$ratio]["y"], "url"=> $url, "ratio"=>$ratio, "big" => (string)($big ? 1 :0 ) )  ) ;
            }else{
                return false;
            }
        }
        
        return parent::save($runValidation,$attributes) ;
    }
    public function getDetails(){
        $c = json_decode($this->json, true) ;
        if(!is_array($c)){
            $c = json_decode($c);
            if( isset($c->url) ){
                return $c;
            }
        }
        $c = new StdClass();
        $c->w = '';
        $c->h = '';
        $c->url = '';
        $c->ratio = '';
        $c->big = '';
        return $c;
    }
    public function getThumbImg(){
        if( preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$this->url ,$matches) === 1 ) { 
            return "<iframe width='480' height='360' src='http://www.youtube.com/embed/".$matches[1]."?rel=0' frameborder='0' allowfullscreen></iframe>";
        }
        return "<img src='".$this->details->url."' />";
    }
    public function getThumb(){
        return $this->details->url;
    }
    public function getW(){
        return $this->details->w;
    }
    public function getH(){
        return $this->details->h;
    }
    public function getRatio(){
        return $this->details->ratio;
    }
    public function getBig(){
        return $this->details->big;
    }

}
