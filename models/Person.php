<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string $address
 * @property string $hobby
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'gender', 'address'], 'required'],
            [['address'], 'string'],
            [['username', 'password', 'gender'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'born' => 'Born',
            'birth_day' => 'Birthday',
            'gender' => 'Gender',
            'address' => 'Address',
            'hobby' => 'Hobby',
        ];
    }
}
