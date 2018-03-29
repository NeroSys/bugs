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
            [['phone_1', 'phone_2', 'sort'], 'integer'],
            [['name', 'slug', 'mail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'mail' => 'Mail',
            'phone_1' => 'Phone 1',
            'phone_2' => 'Phone 2',
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
}
