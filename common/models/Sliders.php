<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%sliders}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $img
 * @property int $sort
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sliders}}';
    }

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name',
                'out_attribute' => 'slug',
                'translit' => true
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['hostImage'], 'safe'],
            [['name', 'slug', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'slug' => 'Slug',
            'img' => 'Изображение',
            'sort' => 'Сортировка вывода',
        ];
    }

    // image block--
    public function getHostImage(){
        return Url::toRoute('/../upload/sliders/'.$this->img, true);
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


        return ($this->img) ?  '/frontend/web/upload/sliders/'. $this->img : '/frontend/web/no-image.jpg';
    }


// end of image block --
}
