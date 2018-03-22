<?php

namespace app\modules\Control\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $password_hash
 * @property string $name
 * @property string $lastname
 * @property string $access_token
 * @property string $auth_key
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['username', 'password', 'name', 'lastname'], 'required'],
            [['username', 'password_hash', 'name', 'lastname', 'access_token'], 'string', 'max' => 255],
            [['password', 'auth_key'], 'string', 'max' => 100],
        ];

    } // end function


    /**
     * @return array
     */
    public function behaviors()
    {

        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false
            ]
        ];

    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'password_hash' => 'Хэш пароля',
            'name' => 'Имя',
            'lastname' => 'Фамилия',
            'created_at' => 'Создан',
            'auth_key' => 'Ключ авторизации',
            'access_token' => 'Токен',
        ];

    } // end function



    /**
     * @inheritdoc
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new UsersQuery(get_called_class());

    } // end function


    /**
     * finds an identity by given ID
     *
     * @param $id
     * @return IdentityInterface|static
     */
    public static function findIdentity($id)
    {

        return static::findOne($id);

    } // end function



    public static function findIdentityByAccessToken($token, $type = null)
    {

        return static::findOne(['access_token' => $token]);

    } // end function


    /**
     * @return mixed|string
     */
    public function getAuthKey()
    {

        return $this->auth_key;

    } // end function


    /**
     * @param string $authkey
     * @return bool
     */
    public function validateAuthKey($authkey)
    {

        return $this->getAuthKey() === $authkey;

    } // end function



    /**
     * @return int|string current user ID
     */
    public function getId()
    {

        return $this->id;

    } // end function



    /**
     * @param bool $insert
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert)
    {

        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->password) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }

        if ($this->isNewRecord) {
            $this->auth_key = Yii::$app->security->generateRandomString();
        }

        return true;

    } // end function




    /**
     * @param $password
     * @return bool
     * @throws \yii\base\Exception
     */
    public function validatePassword($password)
    {

        $hash = Yii::$app->security->generatePasswordHash($password);

        if (Yii::$app->security->validatePassword($password, $hash)) {
            return true;
        } else {
            return false;
        }

    } // end function


    /**
     * @param $username
     * @return null|static
     */
    public static function findByUsername($username)
    {

        return static::findOne(['username' => $username]);

    } // end function


} // end class
