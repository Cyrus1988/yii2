<?php

use yii\db\Migration;

/**
 * Class m200520_161952_task
 */
class m200520_161952_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'create_date'=>$this->timestamp(),
            'type' => $this->string(),
            'status'=> $this->string(),
            'description' => $this->string(),
            'start_date'=>$this->dateTime(),
            'end_date'=>$this->dateTime(),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200520_161952_task cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200520_161952_task cannot be reverted.\n";

        return false;
    }
    */
}
