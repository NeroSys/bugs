<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 3/31/18
 * Time: 7:09 PM
 */

namespace frontend\models;


use yii\base\Model;
use common\models\Messages;

class MessageForm extends Model
{
    public $name;
    public $mail;
    public $phone;
    public $message;
    public $courses_id;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['message'], 'required'],
            ['message', 'string', 'max' => 255],
            // email has to be a valid email address
            ['name', 'trim'],
            ['name', 'required'],

            ['mail', 'trim'],
            ['mail', 'required'],
            ['mail', 'email'],
            ['mail', 'string', 'max' => 50],

            ['phone', 'required'],
            ['phone', 'string', 'min' => 5],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
            
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function message()
    {
      
        $message = new Messages();
        $message->name = $this->name;
        $message->mail = $this->mail;
        $message->phone = $this->phone;
        $message->message = $this->message;
        $message->courses_id = $this->courses_id;

        return $message->save() ? $message : null;
    }
    

}