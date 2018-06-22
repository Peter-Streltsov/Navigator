<?php

use yii\db\Migration;

/**
 * Class m180320_161345_articles_fx
 */
class m180320_161345_articles_fx extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        //$this->addForeignKey('fx_articles_authors', 'articles', 'id', 'articles_authors', 'article_id');
        Yii::$app->db->createCommand()->addForeignKey('fx_articles_authors', 'articles_authors', ['article_id'], 'articles', ['id'])->execute();

    } // end function

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fx_articles_authors', 'articles');

        return true;

    } // end function

} // end class
