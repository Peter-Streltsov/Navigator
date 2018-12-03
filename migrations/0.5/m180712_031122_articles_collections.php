<?php

use yii\db\Migration;

/**
 * Class m180712_031122_articles_collections
 */
class m180712_031122_articles_collections extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('articles_collections', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(), // заголовок
            'type' => $this->integer()->notNull(), // вид
            'class' => $this->integer()->notNull(),
            'year' => $this->integer()->notNull(), // год издания
            'collection' => $this->text()->notNull(), // название сборника
            'section' => $this->text(), // раздел сборника
            'section_number' => $this->integer(),
            'language' => $this->integer(), // язык публикации
            'index' => $this->text(), // полнотектовый индекс
            'annotation' => $this->text(), // аннотация
            'link' => $this->string(), // ссылка на ресурс
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'file' => $this->string() // имя файла
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('articles_collections');
        return true;
    } // end function

} // end class
