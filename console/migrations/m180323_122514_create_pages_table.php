<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m180323_122514_create_pages_table extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%pages_lang}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'lang_id' => $this->integer(11),
            'lang' => $this->string(50),
            'title_1' => $this->string()->notNull()->defaultValue(''),
            'text_1' => $this->string()->notNull()->defaultValue(''),
            'title_2' => $this->string()->notNull()->defaultValue(''),
            'text_2' => $this->string()->notNull()->defaultValue(''),
            'title_3' => $this->string()->notNull()->defaultValue(''),
            'text_3' => $this->string()->notNull()->defaultValue(''),
            'title_4' => $this->string()->notNull()->defaultValue(''),
            'text_4' => $this->string()->notNull()->defaultValue(''),
            'title_5' => $this->string()->notNull()->defaultValue(''),
            'text_5' => $this->string()->notNull()->defaultValue(''),
            'title_6' => $this->string()->notNull()->defaultValue(''),
            'text_6' => $this->string()->notNull()->defaultValue(''),
            'title_7' => $this->string()->notNull()->defaultValue(''),
            'text_7' => $this->string()->notNull()->defaultValue('')

        ], $tableOptions);


        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'url' => $this->string(255)->notNull()->defaultValue(null),
            'main_img' => $this->string(255)->defaultValue(null),
            'small_img' => $this->string(255)->defaultValue(null),
            'visible' => $this->smallInteger(1)->notNull()->defaultValue('1'),
            'sort' => $this->integer(11)->defaultValue(null)
        ], $tableOptions);



        //Создание индекса в таблице catalog_lang для ячейки 'catalog_list_id'
        $this->createIndex('FK_pages_lang', '{{%pages_lang}}', 'item_id');


        $this->addForeignKey(
            'FK_pages_lang', '{{%pages_lang}}', 'item_id', '{{%pages}}', 'id', 'CASCADE', 'CASCADE'
        );

    }


    public function safeDown()
    {

        $this->dropTable('{{%pages_lang}}');
        $this->dropTable('{{%pages}}');
    }
}
