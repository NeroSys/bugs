<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

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
            [[
                'title_1',
                'title_2',
                'title_3',
                'title_4',
                'title_5',
                'title_6',
                'title_7'], 'string', 'max' => 255],
            [[
                'text_1',
                'text_2',
                'text_3',
                'text_4',
                'text_5',
                'text_6',
                'text_7'], 'string'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Страница',
            'lang_id' => 'ID языка',
            'lang' => 'Язык',
            'title_1' => 'Заголовок 1',
            'text_1' => 'Текстовый блок 1',
            'title_2' => 'Заголовок 2',
            'text_2' => 'Текстовый блок 2',
            'title_3' => 'Заголовок 3',
            'text_3' => 'Текстовый блок 3',
            'title_4' => 'Заголовок 4',
            'text_4' => 'Текстовый блок 4',
            'title_5' => 'Заголовок 5',
            'text_5' => 'Текстовый блок 5',
            'title_6' => 'Заголовок 6',
            'text_6' => 'Текстовый блок 6',
            'title_7' => 'Заголовок 7',
            'text_7' => 'Текстовый блок 7',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Pages::className(), ['id' => 'item_id']);
    }

    public function beforeSave($insert)
    {
        $ret = parent::beforeSave($insert);

        $lng = Lang::find()->where(['id' => $this->lang_id])->one();

        if($this->isNewRecord) {
            try {
                if (empty($lng)) throw new Exception('Неверный язык');
                $this->lang = $lng->local;
            } catch (Exception $e) {
                $ret = false;
            }
        }
        return $ret;
    }

    public function getLangList($item_id){

        return ArrayHelper::getColumn(self::find()->select('lang_id')->distinct('lang_id')->where(['item_id' => $item_id])->all(), 'lang_id');

    }

    public function getArray($item_id){


        return ArrayHelper::map(Lang::find()->where(['NOT IN', 'id', $this->getLangList($item_id)])->all(), 'id', 'name');
    }
}
