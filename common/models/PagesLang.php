<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pages_lang}}".
 *
 * @property int $id
 * @property int $item_id
 * @property int $lang_id
 * @property string $lang
 * @property string $title_1
 * @property string $text_1
 * @property string $title_2
 * @property string $text_2
 * @property string $title_3
 * @property string $text_3
 * @property string $title_4
 * @property string $text_4
 * @property string $title_5
 * @property string $text_5
 * @property string $title_6
 * @property string $text_6
 * @property string $title_7
 * @property string $text_7
 *
 * @property Pages $item
 */
class PagesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pages_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'lang_id'], 'integer'],
            [['lang'], 'string', 'max' => 50],
            [['title_1', 'text_1', 'title_2', 'text_2', 'title_3', 'text_3', 'title_4', 'text_4', 'title_5', 'text_5', 'title_6', 'text_6', 'title_7', 'text_7'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'lang_id' => Yii::t('app', 'Lang ID'),
            'lang' => Yii::t('app', 'Lang'),
            'title_1' => Yii::t('app', 'Title 1'),
            'text_1' => Yii::t('app', 'Text 1'),
            'title_2' => Yii::t('app', 'Title 2'),
            'text_2' => Yii::t('app', 'Text 2'),
            'title_3' => Yii::t('app', 'Title 3'),
            'text_3' => Yii::t('app', 'Text 3'),
            'title_4' => Yii::t('app', 'Title 4'),
            'text_4' => Yii::t('app', 'Text 4'),
            'title_5' => Yii::t('app', 'Title 5'),
            'text_5' => Yii::t('app', 'Text 5'),
            'title_6' => Yii::t('app', 'Title 6'),
            'text_6' => Yii::t('app', 'Text 6'),
            'title_7' => Yii::t('app', 'Title 7'),
            'text_7' => Yii::t('app', 'Text 7'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Pages::className(), ['id' => 'item_id']);
    }
}
