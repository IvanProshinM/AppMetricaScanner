<?php

use yii\db\Migration;

/**
 * Class m221115_130453_proxy_history
 */
class m221115_130453_proxy_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('proxy_history',[
            "id"=>$this->primaryKey(),
            "proxy_id"=>$this->integer(),
            "used_at"=>$this->integer()
        ]);
        $this->addForeignKey('proxyId', 'proxy_history', 'proxy_id', 'proxy', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('proxy_history');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221115_130453_proxy_history cannot be reverted.\n";

        return false;
    }
    */
}
