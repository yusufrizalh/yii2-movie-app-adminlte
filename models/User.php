<?php

namespace app\models;

// class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;

//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    public static function tableName() {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    
    // ubah menjadi active record 
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::find()->where([
            'id' => $id, 'status' => 1
        ])->one();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    
    // ubah menjadi active record 
    public static function findByUsername($username)
    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;
        
        return static::find()->where([
            'username' => $username, 'status' => 1
        ])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    
    // menyesuaikan property dengan nama field di table user 
    public function getAuthKey()
    {
        // return $this->authKey;
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    
    // menyesuaikan property dengan nama field di table user 
    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    
    // mengubah menjadi standar keamanan password Yii
    public function validatePassword($password)
    {
        // return $this->password === $password;
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
