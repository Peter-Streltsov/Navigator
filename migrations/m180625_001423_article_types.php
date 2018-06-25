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

        $this->createTable('article_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->batchInsert('article_types', ['type'], [
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

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('article_types');

        return true;

    } // end function

} // end class
