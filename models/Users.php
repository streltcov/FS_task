<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $passwordHash
 * @property int $created_at
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['created_at'], 'integer'],
            [['username', 'password', 'passwordHash', 'authKey', 'accessToken'], 'string', 'max' => 255],
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
            'passwordHash' => 'Password Hash',
            'created_at' => 'Created At',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }



    public static function findByUsername($username)
    {

        return static::findOne(['username' => $username]);

    } // end function



    // Identity Interface


    /**
     * returns an identity by given id
     *
     * @param int $id
     * @return Users|null|IdentityInterface
     */
    public static function findIdentity($id)
    {

        return static::findOne($id);

    } // end function



    /**
     * return an identity by given token
     *
     * @param mixed $token
     * @param null $type
     * @return Users|null|IdentityInterface
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        return static::findOne(['accessToken' => $token]);

    } // end function



    /**
     * returns current user id
     *
     * @return int|string
     */
    public function getId()
    {

        return $this->id;

    } // end function



    /**
     * @return string
     */
    public function getAuthKey()
    {

        return $this->authKey;

    } // end function


    /**
     * returns TRUE if authKey is valid for current user
     *
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {

        return $this->getAuthKey() === $authKey;

    } // end function


    // end Identity Interface



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



    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->password) {
                $this->passwordHash = Yii::$app->security->generatePasswordHash($this->password);
            }

            if ($this->isNewRecord) {
                $this->authKey = Yii::$app->security->generateRandomString();
            }

            return true;
        }

        return false;

    } // end function


    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
