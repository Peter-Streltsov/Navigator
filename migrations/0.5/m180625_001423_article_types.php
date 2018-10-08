<?php

use yii\db\Migration;

/**
 * Class m180625_001423_article_types
 */
class m180625_001423_article_types extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_journals_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->createTable('articles_conferences_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->createTable('articles_collections_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->batchInsert('articles_journals_types', ['type'], [
            ['Научная статья'],
            ['Обзорная статья'],
            ['Краткое сообщение'],
            ['Материалы конференции'],
            ['Переписка'],
            ['Рецензия'],
            ['Аннотация'],
            ['Редакторская заметка'],
            ['Персоналия'],
            ['Разное']
        ]);

        $this->batchInsert('articles_conferences_types', ['type'], [
            ['Статья в сборнике трудов конференции'],
            ['Тезисы доклада на конференции'],
        ]);

        $this->batchInsert('articles_collections_types', ['type'], [
            ['Статья в сборнике статей'],
            ['Глава в книге'],
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('articles_journals_types');
        $this->dropTable('articles_conferences_types');
        $this->dropTable('articles_collections_types');

        return true;

    } // end function

} // end class
