<?php

use yii\db\Migration;

/**
 * Class m221115_112319_Proxy
 */
class m221115_112319_Proxy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("proxy", [
            "id"=>$this->primaryKey(),
            "proxy"=>$this->string(),
            "used"=>$this->timestamp()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("proxy");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221115_112319_Proxy cannot be reverted.\n";

        return false;
    }
    */
}
