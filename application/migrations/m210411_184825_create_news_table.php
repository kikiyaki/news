<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m210411_184825_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'img_url' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
