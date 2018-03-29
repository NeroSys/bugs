<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%courses_lang}}".
 *
 * @property int $id
 * @property int $item_id
 * @property int $lang_id
 * @property string $lang
 * @property string $name
 * @property string $description
 * @property string $text
 *
 * @property Courses $item
 */
class CoursesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%courses_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'lang_id'], 'integer'],
            [['lang'], 'string', 'max' => 50],
            [['name', 'description', 'text'], 'string'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'lang_id' => 'Lang ID',
            'lang' => 'Язык',
            'name' => 'Название',
            'description' => 'Описание',
            'text' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Courses::className(), ['id' => 'item_id']);
    }
}
