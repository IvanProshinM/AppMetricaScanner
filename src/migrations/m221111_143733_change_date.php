<?php

use yii\db\Migration;

/**
 * Class m221111_143733_change_date
 */
class m221111_143733_change_date extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('top_category_table', 'date', 'date');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->alterColumn('top_category_table', 'date',  'integer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221111_143733_change_date cannot be reverted.\n";

        return false;
    }
    */
}
