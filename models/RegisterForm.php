<?php
namespace app\models;
class RegisterForm extends \yii\base\Model {
    public $username;
    public $password;
    public $password_repeat;
    public $email;
    
    public function rules() {
        return [
            [['username', 'email', 'password', 'password_repeat'], 'required'], 
            ['password', 'compare'], 
        ];
    }
}
?>