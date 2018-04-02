<?php

use yii\db\Migration;

/**
 * Class m180322_184727_authors_fx
 */
class m180322_184727_authors_fx extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        Yii::$app->db->createCommand()->addForeignKey('fx_authors_articles', 'articles_authors', 'author_id', 'authors.php', 'id');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        Yii::$app->db->createCommand()->dropForeignKey('fx_authors_articles', 'authors.php');

        return true;

    } // end function

} // end class
