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
class m180319_021020_articles_journals extends Migration
{

    /**
     * @return bool|void
     * @throws \yii\base\NotSupportedException
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {

        $this->createTable('articles_journals', [
            'id' => $this->primaryKey(),
            'type' =>$this->integer()->notNull(),
            'class' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'magazine' => $this->string(255),
            'number' => $this->integer()->notNull(),
            'direct_number' => $this->integer(),
            'year' => $this->integer()->notNull(),
            'language' => $this->string()->notNull(),
            'doi' => $this->string(255),
            'created_at' => $this->integer(),
            'annotation' => $this->text(),
            'index' => $this->text(),
            'accepted' => $this->integer()->defaultValue(1),
            'link' => $this->string(),
            'file' => $this->binary(),
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('articles_journals');

        return true;

    } // end function

} // end class
