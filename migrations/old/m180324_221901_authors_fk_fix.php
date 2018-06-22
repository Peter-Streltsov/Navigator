<?php

use yii\db\Migration;

/**
 * Class m180324_221901_authors_fk_fix
 */
class m180324_221901_authors_fk_fix extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        Yii::$app->db->createCommand()->addForeignKey('fk_authors_articles', 'articles_authors', 'author_id', 'authors', 'id')->execute();

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        Yii::$app->db->createCommand()->dropForeignKey('fk_authors_articles', 'articles_authors')->execute();

        return true;

    } // end function

} // end class
