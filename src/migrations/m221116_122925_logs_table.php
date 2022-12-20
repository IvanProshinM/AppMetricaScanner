<?php

use yii\db\Migration;

/**
 * Class m221116_122925_logs_table
 */
class m221116_122925_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('logs',
            [
                'id'=>$this->primaryKey(),
                'request'=>$this->text(),
                'response'=>$this->text(),
                'url'=>$this->text()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('logs');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221116_122925_logs_table cannot be reverted.\n";

        return false;
    }
    */
}
