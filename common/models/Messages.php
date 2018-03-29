<?php

namespace common\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%messages}}".
 *
 * @property int $id
 * @property int $courses_id
 * @property string $name
 * @property string $mail
 * @property int $phone
 * @property string $message
 * @property int $new
 * @property int $answered
 * @property int $date
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%messages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['courses_id', 'phone', 'new', 'answered'], 'integer'],
            [['date'], 'safe'],
            [['date'], 'date', 'format' => 'php:Y-m-d  H:i:s'],
            [['name', 'mail', 'message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courses_id' => 'Курс',
            'name' => 'Имя',
            'mail' => 'Эл.адрес',
            'phone' => 'Тел',
            'message' => 'Сообщение',
            'new' => 'Новое',
            'answered' => 'Ответ',
            'date' => 'Дата'
        ];
    }


    public function getCourses()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courses_id']);
    }

    public static function  getAll($pageSize = 3){

        $query = Messages::find();

        $count = $query->count();

        $pagination =new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

        $messages = $query->orderBy('isNew DESC')->offset($pagination->offset)->limit($pagination->limit)->all();


        $data['messages'] = $messages;
        $data['pagination'] = $pagination;

        return $data;

    }
}
