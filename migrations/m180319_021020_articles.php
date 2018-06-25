<?php

use yii\db\Migration;

/**
 * creates data structure for articles
 * referenced tables/Models:
 *      * Languages [language] // common
 *      * Magazines [magazine] // common
 *      * ArticlePages [pages] // special
 *      * ArticleTypes [type] // special
 *
 *
 * Class m180319_021020_articles
 */
class m180319_021020_articles extends Migration
{
    /**
     * {@inheritdoc}
     * @return void
     */
    public function safeUp()
    {

        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'type' =>$this->integer()->notNull(),
            'class' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'magazine' => $this->string(255),
            'number' => $this->integer()->notNull(),
            'direct_number' => $this->integer(),
            'pages' => $this->integer(),
            'year' => $this->integer()->notNull(),
            'language' => $this->string()->notNull(),
            'doi' => $this->string(255),
            'created_at' => $this->integer(),
            'annotaion' => $this->text(),
            'index' => $this->text(),
            'link' => $this->string(),
            'file' => $this->binary(),
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('articles');

        return true;

    } // end function

} // end class
