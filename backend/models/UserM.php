<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_m".
 *
 * @property integer $user_id
 * @property string $nama_user
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property string $last_login
 */
class UserM extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */

     public $password_baru;

    public static function tableName()
    {
        return 'user_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_user', 'username', 'password', 'authkey','last_login'], 'required'],
            [['nama_user', 'email', 'username', 'password', 'authkey','last_login'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'nama_user' => 'Nama User',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'last_login' => 'Last Login',
        ];
    }

    public function getFLastLogin()
    {
        return Yii::$app->formatter->asDatetime($this->last_login);
    }

    public function getAuthKey()
    {
      return $this->authkey;
    }

    public function getId()
    {
      return $this->user_id;
    }

    public function validateAuthKey($authkey)
    {
      return $this->authkey === $authkey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
      throw new \yii\base\NotSupportedExeption();

    }

    public static function findByUsername($username)
    {
      return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password)
    {
      return $this->password === md5($password);
    }
}
