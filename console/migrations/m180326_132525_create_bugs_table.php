<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bugs`.
 */
class m180326_132525_create_bugs_table extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%courses_lang}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'lang_id' => $this->integer(11),
            'lang' => $this->string(50),
            'name' => $this->string()->notNull()->defaultValue(''),
            'description' => $this->string()->notNull()->defaultValue(''),
            'text' => $this->string()->notNull()->defaultValue('')

        ], $tableOptions);


        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'main_img' => $this->string(255)->defaultValue(null),
            'small_img' => $this->string(255)->defaultValue(null),
            'visible' => $this->smallInteger(1)->notNull()->defaultValue('1'),
            'sort' => $this->integer(11)->defaultValue(null)
        ], $tableOptions);


        $this->createTable('{{%sliders}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'img' => $this->string(255)->defaultValue(null),
            'sort' => $this->integer(11)->defaultValue(null)
        ], $tableOptions);

        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'courses_id' => $this->integer(11)->defaultValue(null),
            'name' => $this->string(255)->notNull()->defaultValue(null),
            'mail' => $this->string(255)->notNull()->defaultValue(null),
            'phone'=> $this->integer(20),
            'message' => $this->string(),
            'new' => $this->boolean()->defaultValue(1),
            'answered' => $this->boolean()->defaultValue(0)
        ], $tableOptions);

        $this->createTable('{{%contacts_lang}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer(11),
            'lang_id' => $this->integer(11),
            'lang' => $this->string(50),
            'name' => $this->string()->notNull()->defaultValue(''),
            'address' => $this->string()->notNull()->defaultValue('')

        ], $tableOptions);


        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(null),
            'mail' => $this->string(255)->defaultValue(null),
            'phone_1' => $this->integer(11)->defaultValue(null),
            'phone_2' => $this->integer(11)->defaultValue(null),
            'sort' => $this->integer(11)->defaultValue(null)
        ], $tableOptions);



        $this->createIndex('FK_courses_lang', '{{%courses_lang}}', 'item_id');

        $this->createIndex('FK_contacts_lang', '{{%contacts_lang}}', 'item_id');

        $this->addForeignKey(
            'FK_courses_lang', '{{%courses_lang}}', 'item_id', '{{%courses}}', 'id', 'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'FK_contacts_lang', '{{%contacts_lang}}', 'item_id', '{{%contacts}}', 'id', 'CASCADE', 'CASCADE'
        );

    }


    public function safeDown()
    {

        $this->dropTable('{{%courses_lang}}');
        $this->dropTable('{{%courses}}');
        $this->dropTable('{{%sliders}}');
        $this->dropTable('{{%messages}}');
        $this->dropTable('{{%contacts_lang}}');
        $this->dropTable('{{%contacts}}');
    }
}
