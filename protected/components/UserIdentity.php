<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the fullname and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {

        $users=array(
            // fullname => password
            'demo'=>'demo',
            'admin'=>'admin',
        );  
        $usrc=Usr::model()->count(array(
            'select'=>'*',
            'condition'=>'email=:fullname',
            'params'=>array(':fullname'=> $_POST['LoginForm']['email']),
        ));
        $usr=Usr::model()->find(array(
            'select'=>'*',
            'condition'=>'email=:fullname',
            'params'=>array(':fullname'=> $_POST['LoginForm']['email']),
        ));

        if($usrc < 1 ){
            $this->errorCode=self::ERROR_fullname_INVALID;
        }
        elseif( $usr->password !==  md5($_POST['LoginForm']['password'])){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else{
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}
