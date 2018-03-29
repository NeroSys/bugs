<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

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
    public $langTitle1;
    public $langTitle1New;
    public $langText1;
    public $langText1New;

    public $langTitle2;
    public $langTitle2New;
    public $langText2;
    public $langText2New;

    public $langTitle3;
    public $langTitle3New;
    public $langText3;
    public $langText3New;

    public $langTitle4;
    public $langTitle4New;
    public $langText4;
    public $langText4New;

    public $langTitle5;
    public $langTitle5New;
    public $langText5;
    public $langText5New;

    public $langTitle6;
    public $langTitle6New;
    public $langText6;
    public $langText6New;

    public $langTitle7;
    public $langTitle7New;
    public $langText7;
    public $langText7New;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pages}}';
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
            [['visible', 'sort'], 'integer'],
            [[
                'langTitle1',
                'langTitle1New',
                'langText1',
                'langText1New',

                'langTitle2',
                'langTitle2New',
                'langText2',
                'langText2New',

                'langTitle3',
                'langTitle3New',
                'langText3',
                'langText3New',

                'langTitle4',
                'langTitle4New',
                'langText4',
                'langText4New',

                'langTitle5',
                'langTitle5New',
                'langText5',
                'langText5New',

                'langTitle6',
                'langTitle6New',
                'langText6',
                'langText6New',

                'langTitle7',
                'langTitle7New',
                'langText7',
                'langText7New',

            ], 'safe'],
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
            'name' => Yii::t('app', 'Название страницы'),
            'slug' => Yii::t('app', 'Slug страницы'),
            'url' => Yii::t('app', 'Url'),
            'main_img' => Yii::t('app', 'Основное изображение'),
            'small_img' => Yii::t('app', 'Дополнительное изображение'),
            'visible' => Yii::t('app', 'Отображение'),
            'sort' => Yii::t('app', 'Сортировка вывода'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagesLangs()
    {
        return $this->hasMany(PagesLang::className(), ['item_id' => 'id']);
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
        $data_lang = $this->getPagesLangs()->where(['lang'=>$language])->one();
        return $data_lang;
    }

    /*
     * Возвращает объект по его url
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

        if(!empty($this->langTitle1)){
            foreach ($this->langTitle1 as $lang => $item){

                $key_id = key($item);
                $lang = PagesLang::find()->where(['lang_id' => $lang])->andWhere(['id'=>$key_id])->one();

                if(!empty($lang)){
                    $lang->title_1 = array_pop($item);
                    $lang->text_1 = $this->langText1[$lang->lang_id][$key_id];

                    $lang->title_2 = $this->langTitle2[$lang->lang_id][$key_id];
                    $lang->text_2 = $this->langText2[$lang->lang_id][$key_id];

                    $lang->title_3 = $this->langTitle3[$lang->lang_id][$key_id];
                    $lang->text_3 = $this->langText3[$lang->lang_id][$key_id];

                    $lang->title_4 = $this->langTitle4[$lang->lang_id][$key_id];
                    $lang->text_4 = $this->langText4[$lang->lang_id][$key_id];

                    $lang->title_5 = $this->langTitle5[$lang->lang_id][$key_id];
                    $lang->text_5 = $this->langText5[$lang->lang_id][$key_id];

                    $lang->title_6 = $this->langTitle6[$lang->lang_id][$key_id];
                    $lang->text_6 = $this->langText6[$lang->lang_id][$key_id];

                    $lang->title_7 = $this->langTitle7[$lang->lang_id][$key_id];
                    $lang->text_7 = $this->langText7[$lang->lang_id][$key_id];


                    $lang->save();
                }
            }
        };

        if(!empty($this->langTitle1New)) {

            foreach ($this->langTitle1New as $lang_id => $data) {


                $lang = Lang::find()->where(['id' => $lang_id])->one()->local;


                $itemTitle1 = (is_array($data) ? array_pop($data) : '');
                $itemText1 = (is_array($this->langText1New) ? array_pop($this->langText1New[$lang_id]) : '');

                $itemTitle2 = (is_array($this->langTitle2New) ? array_pop($this->langTitle2New[$lang_id]) : '');
                $itemText2 = (is_array($this->langText2New) ? array_pop($this->langText2New[$lang_id]) : '');

                $itemTitle3 = (is_array($this->langTitle3New) ? array_pop($this->langTitle3New[$lang_id]) : '');
                $itemText3 = (is_array($this->langText3New) ? array_pop($this->langText3New[$lang_id]) : '');

                $itemTitle4 = (is_array($this->langTitle4New) ? array_pop($this->langTitle4New[$lang_id]) : '');
                $itemText4 = (is_array($this->langText4New) ? array_pop($this->langText4New[$lang_id]) : '');

                $itemTitle5 = (is_array($this->langTitle5New) ? array_pop($this->langTitle5New[$lang_id]) : '');
                $itemText5 = (is_array($this->langText5New) ? array_pop($this->langText5New[$lang_id]) : '');

                $itemTitle6 = (is_array($this->langTitle6New) ? array_pop($this->langTitle6New[$lang_id]) : '');
                $itemText6 = (is_array($this->langText6New) ? array_pop($this->langText6New[$lang_id]) : '');

                $itemTitle7 = (is_array($this->langTitle7New) ? array_pop($this->langTitle7New[$lang_id]) : '');
                $itemText7 = (is_array($this->langText7New) ? array_pop($this->langText7New[$lang_id]) : '');



                $item = new PagesLang();

                $item->item_id = $this->id;
                $item->lang_id = $lang_id;
                $item->lang = $lang;

                $item->title_1 = (!empty($itemTitle1) ? $itemTitle1 : '');
                $item->text_1 = (!empty($itemText1) ? $itemText1 : '');

                $item->title_2 = (!empty($itemTitle2) ? $itemTitle2 : '');
                $item->text_2 = (!empty($itemText2) ? $itemText2 : '');

                $item->title_3 = (!empty($itemTitle3) ? $itemTitle3 : '');
                $item->text_3 = (!empty($itemText3) ? $itemText3 : '');


                $item->title_4 = (!empty($itemTitle4) ? $itemTitle4 : '');
                $item->text_4 = (!empty($itemText4) ? $itemText4 : '');

                $item->title_5 = (!empty($itemTitle5) ? $itemTitle5 : '');
                $item->text_5 = (!empty($itemText5) ? $itemText5 : '');

                $item->title_6 = (!empty($itemTitle6) ? $itemTitle6 : '');
                $item->text_6 = (!empty($itemText6) ? $itemText6 : '');

                $item->title_7 = (!empty($itemTitle7) ? $itemTitle7 : '');
                $item->text_7 = (!empty($itemText7) ? $itemText7 : '');

                $item->save();
            }
        }

    }

    public static function getValue($id, $langId){

        return PagesLang::find()->where(['item_id' => $id])->andWhere(['lang_id' => $langId])->one();
    }


    public function getPage($id){

        return Pages::find()->where(['id' => $id])->one();
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



}
