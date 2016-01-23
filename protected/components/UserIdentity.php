<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    var
            $id;
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    
    private $_id;
    public function authenticate() {      
        
        $credentials = new CDbCriteria;
        $credentials->condition = 'login = "' . $this->username . '"';
                
        // A senha que virá do banco está ciptografada
        $user = Usuario::model()->find($credentials);
        
        //echo "senha: $this->password <br/>";
        
        
        if (!isset($user))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (md5($this->password) !== $user->senha)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->id = $user->idUsuario;
            $this->errorCode = self::ERROR_NONE;

            if ($user->isAdmin == 1)
                Yii::app()->user->setState('isAdmin', true);
        }
        //echo "this->_id: $this->_id <br/>";
        return !$this->errorCode;
        
    }
    
    public function authenticate2(){
        $users = array(
            // username => password
            'demo' => 'demo',
            'admin' => 'admin',
        );
        if (!isset($users[$this->username]))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($users[$this->username] !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;
    }
    
    public function getId(){
		return $this->id;
	}

}
