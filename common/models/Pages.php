<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $url
 * @property string $main_img
 * @property string $small_img
 * @property int $visible
 * @property int $sort
 *
 * @property PagesLang[] $pagesLangs
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visible', 'sort'], 'integer'],
            [['name', 'slug', 'url', 'main_img', 'small_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'url' => Yii::t('app', 'Url'),
            'main_img' => Yii::t('app', 'Main Img'),
            'small_img' => Yii::t('app', 'Small Img'),
            'visible' => Yii::t('app', 'Visible'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagesLangs()
    {
        return $this->hasMany(PagesLang::className(), ['item_id' => 'id']);
    }
}
