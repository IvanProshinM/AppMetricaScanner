<?php

use yii\db\Migration;

/**
 * Class m221111_135952_top_category_table
 */
class m221111_135952_top_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('top_category_table', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'category' => $this->integer(),
            'position' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('top_category_table');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221111_135952_top_category_table cannot be reverted.\n";

        return false;
    }
    */
}
