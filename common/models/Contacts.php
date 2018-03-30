<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contacts}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $mail
 * @property int $phone_1
 * @property int $phone_2
 * @property int $sort
 *
 * @property ContactsLang[] $contactsLangs
 */
class Contacts extends \yii\db\ActiveRecord
{
    
    public $title;
    public $titleNew;
    public $address;
    public $addressNew;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [[
                'title',
                'titleNew',
                'address',
                'addressNew',
                ], 'safe'],
            [['name', 'slug', 'mail'], 'string', 'max' => 255],
            [['phone_1', 'phone_2'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'slug' => 'Slug',
            'mail' => 'Mail',
            'phone_1' => 'Тел 1',
            'phone_2' => 'Тел 2',
            'title' => 'Перевод названия',
            'titleNew' => 'Перевод названия',
            'address' => 'Адрес',
            'addressNew' => 'Адрес',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactsLangs()
    {
        return $this->hasMany(ContactsLang::className(), ['item_id' => 'id']);
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
        $data_lang = $this->getContactsLangs()->where(['lang'=>$language])->one();
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
                $lang = ContactsLang::find()->where(['lang_id' => $lang])->andWhere(['id'=>$key_id])->one();

                if(!empty($lang)){
                    $lang->name = array_pop($item);
                    $lang->address = $this->address[$lang->lang_id][$key_id];
                    $lang->save();
                }
            }
        };

        if(!empty($this->titleNew)) {

            foreach ($this->titleNew as $lang_id => $data) {


                $lang = Lang::find()->where(['id' => $lang_id])->one()->local;


                $itemName = (is_array($data) ? array_pop($data) : '');
                $itemDesc = (is_array($this->addressNew) ? array_pop($this->addressNew[$lang_id]) : '');

                $item = new ContactsLang();

                $item->item_id = $this->id;
                $item->lang_id = $lang_id;
                $item->lang = $lang;
                $item->name = (!empty($itemName) ? $itemName : '');
                $item->address = (!empty($itemDesc) ? $itemDesc: '');
                $item->save();
            }
        }

    }

    public static function getValue($id, $langId){

        return ContactsLang::find()->where(['item_id' => $id])->andWhere(['lang_id' => $langId])->one();
    }


}
