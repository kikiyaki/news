<?php

use yii\db\Migration;

/**
 * Class m210411_215016_news_id_column_to_string
 */
class m210411_215016_news_id_column_to_string extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('news', 'news_id', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210411_215016_news_id_column_to_string cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210411_215016_news_id_column_to_string cannot be reverted.\n";

        return false;
    }
    */
}
