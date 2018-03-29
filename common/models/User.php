<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Url;

/**
 * User model
 *
 * @property int $id
 * @property string $username
 * @property string $firstName
 * @property string $lastName
 * @property string $img
 * @property string $address
 * @property string $phone_1
 * @property string $phone_2
 * @property int $isNew
 * @property int $moder
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const STATUS_ALLOW = 0;
    const STATUS_DISALLOW = 1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['phone_1', 'phone_2', 'username', 'firstName', 'lastName', 'img', 'address', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['isNew', 'moder'], 'string', 'max' => 1],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['hostImage'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'username' => Yii::t('admin', 'Пользователь'),
            'firstName' => Yii::t('admin', 'Имя'),
            'lastName' => Yii::t('admin', 'Фамилия'),
            'img' => Yii::t('admin', 'Аватар'),
            'address' => Yii::t('admin', 'Адрес'),
            'phone_1' => Yii::t('admin', 'Тел 1'),
            'phone_2' => Yii::t('admin', 'Тел 2'),
            'isNew' => Yii::t('admin', 'Новый'),
            'moder' => Yii::t('admin', 'Модерация'),
            'auth_key' => Yii::t('admin', 'Auth Key'),
            'password_hash' => Yii::t('admin', 'Password Hash'),
            'password_reset_token' => Yii::t('admin', 'Password Reset Token'),
            'email' => Yii::t('admin', 'Email'),
            'status' => Yii::t('admin', 'Статус'),
            'created_at' => Yii::t('admin', 'Добавлен'),
            'updated_at' => Yii::t('admin', 'Обновлен'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }


    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    // image block--
    public function getHostImage(){
        return Url::toRoute('/../upload/user/'.$this->img, true);
    }

    public function setHostImage($file){
        $this->img = $file;
    }

    public function beforeSave($insert)
    {
        if(!empty($this->img)){
            $tmp = explode('/', $this->img);
            $this->img = array_pop($tmp);
        }
        return parent::beforeSave($insert);
    }

    public function getImage(){


        return ($this->img) ?  '/frontend/web/upload/user/'. $this->img : '/frontend/web/no-image.jpg';
    }


// end of image block --

    public function isAllowed(){

        return $this->moder;
    }

    public function  allow(){

        $this->moder = self::STATUS_ALLOW;

        return $this->save(false);
    }

    public function  disallow(){

        $this->moder = self::STATUS_DISALLOW;

        return $this->save(false);
    }
}
