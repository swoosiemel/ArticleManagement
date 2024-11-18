<?php
use yii\db\Migration;

class article_init extends Migration
{
public function safeUp()
{
    $this->createTable('article', [
        'id' => $this->primaryKey(),
        'title' => $this->string(255)->notNull(),
        'slug' => $this->string(255)->notNull()->unique(),
        'content' => $this->text()->notNull(),
        'user_id' => $this->integer()->notNull(),
        'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
    ]);

    $this->addForeignKey(
        'fk-article-user_id',
        'article',
        'user_id',
        'user',
        'id',
        'CASCADE',
        'CASCADE'
    );
}

public function safeDown()
{

    $this->dropForeignKey('fk-article-user_id', 'article');
    $this->dropTable('article');
}
}