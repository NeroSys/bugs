<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contacts_lang}}".
 *
 * @property int $id
 * @property int $item_id
 * @property int $lang_id
 * @property string $lang
 * @property string $name
 * @property string $address
 *
 * @property Contacts $item
 */
class ContactsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contacts_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'lang_id'], 'integer'],
            [['lang'], 'string', 'max' => 50],
            [['name', 'address'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['item_id' => 'id']],
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
            'lang' => 'Lang',
            'name' => 'Name',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'item_id']);
    }
}
