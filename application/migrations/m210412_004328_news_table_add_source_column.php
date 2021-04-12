<?php

use yii\db\Migration;

/**
 * Class m210412_004328_news_table_add_source_column
 */
class m210412_004328_news_table_add_source_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'source', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210412_004328_news_table_add_source_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210412_004328_news_table_add_source_column cannot be reverted.\n";

        return false;
    }
    */
}
