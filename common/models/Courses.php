<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%courses}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string $main_img
 * @property string $small_img
 * @property int $visible
 * @property int $sort
 *
 * @property CoursesLang[] $coursesLangs
 */
class Courses extends \yii\db\ActiveRecord
{
     public $title;
     public $titleNew;
     public $description;
     public $descriptionNew;
     public $text;
     public $textNew;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%courses}}';
    }

    public function behaviors()
    {
        return [
            'slugStr' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name', // Свойтво в модели на базе которого будет создавться slug
                'out_attribute' => 'slug', // Свойтво в модели выступающее как slug
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
            [['visible', 'sort', 'type'], 'integer'],
            [[
                'title',
                'titleNew',
                'description',
                'descriptionNew',
                'text',
                'textNew',
                'hostImage', 'mainImage'], 'safe'],
            [['name', 'slug', 'main_img', 'small_img'], 'string', 'max' => 255],
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
            'type' => 'Детский',
            'main_img' => 'Основное изображение',
            'small_img' => 'Превью',
            'visible' => 'Отображение',
            'sort' => 'Сортировка вывода',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursesLangs()
    {
        return $this->hasMany(CoursesLang::className(), ['item_id' => 'id']);
    }

    /*
* Возвращает массив объектов модели
*/
    public function getItems(){
        return $this->find()->all();
    }
    /*
     * Возвращает данные для указанного языка
     */
    public function getDataItems(){
        $language = Yii::$app->language;
        $data_lang = $this->getCoursesLangs()->where(['lang'=>$language])->one();
        return $data_lang;
    }

    /*
     * Возвращает объект поста по его url
     */
    public function getLang($url){
        return $this->find()->where(['url' => $url])->one();
    }

    /*
    * Сохранение значений переводов в сопутствующую таблицу
    */

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if(!empty($this->title)){
            foreach ($this->title as $lang => $item){

                $key_id = key($item);
                $lang = CoursesLang::find()->where(['lang_id' => $lang])->andWhere(['id'=>$key_id])->one();

                if(!empty($lang)){
                    $lang->name = array_pop($item);
                    $lang->description = $this->description[$lang->lang_id][$key_id];
                    $lang->text = $this->text[$lang->lang_id][$key_id];

                    $lang->save();
                }
            }
        };

        if(!empty($this->titleNew)) {

            foreach ($this->titleNew as $lang_id => $data) {


                $lang = Lang::find()->where(['id' => $lang_id])->one()->local;


                $itemName = (is_array($data) ? array_pop($data) : '');
                $itemDesc = (is_array($this->descriptionNew) ? array_pop($this->descriptionNew[$lang_id]) : '');
                $itemText = (is_array($this->textNew) ? array_pop($this->textNew[$lang_id]) : '');

                $item = new CoursesLang();

                $item->item_id = $this->id;
                $item->lang_id = $lang_id;
                $item->lang = $lang;
                $item->name = (!empty($itemName) ? $itemName : '');
                $item->description = (!empty($itemDesc) ? $itemDesc: '');
                $item->text = (!empty($itemText) ? $itemText: '');
                $item->save();
            }
        }

    }

    public static function getValue($id, $langId){

        return CoursesLang::find()->where(['item_id' => $id])->andWhere(['lang_id' => $langId])->one();
    }

    //    Open graph

    public function getOpenGraph(){

        return $this->hasOne(Opengraf::className(), ['itemId' => 'id'])->andWhere(['modelName' => $this::className()]);
    }

    public function getOGItem($id){

        return Opengraf::find()->where(['modelName' => $this::className()])->andWhere(['itemId' => $id])->one();
    }

    public function getSEO($id){

        return Opengraf::find()->where(['modelName' => $this::className()])->andWhere(['itemId' => $id])->one();
    }
// End Open Graph

    // image block--
    public function getMainImage(){
        return Url::toRoute('/../upload/courses/'.$this->main_img, true);
    }

    public function getHostImage(){
        return Url::toRoute('/../upload/courses/'.$this->small_img, true);
    }

    public function setHostImage($file){
        $this->small_img = $file;
    }

    public function setMainImage($file){
        $this->main_img = $file;
    }

    public function beforeSave($insert)
    {
        if(!empty($this->small_img)){
            $tmp = explode('/', $this->small_img);
            $this->small_img = array_pop($tmp);
        }

        if(!empty($this->main_img)){
            $tmp = explode('/', $this->main_img);
            $this->main_img = array_pop($tmp);
        }

        return parent::beforeSave($insert);
    }

    public function getPreviewImg(){


        return ($this->small_img) ?  '/frontend/web/upload/courses/'. $this->small_img : '/frontend/web/no-image.jpg';
    }

    public function getMainImg(){


        return ($this->main_img) ?  '/frontend/web/upload/courses/'. $this->main_img : '/frontend/web/no-image.jpg';
    }

// end of image block --

}
