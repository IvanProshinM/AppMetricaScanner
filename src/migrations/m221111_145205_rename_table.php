<?php

use yii\db\Migration;

/**
 * Class m221111_145205_rename_table
 */
class m221111_145205_rename_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('top_category_table', 'top_category');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameTable('top_category', 'top_category_table');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221111_145205_rename_table cannot be reverted.\n";

        return false;
    }
    */
}
