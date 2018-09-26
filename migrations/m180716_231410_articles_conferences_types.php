<?php

use yii\db\Migration;

/**
 * Class m180716_231410_articles_conferences_types
 */
class m180716_231410_articles_conferences_types extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_conferences_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->batchInsert('articles_conferences_types', ['type'], [
            ['статья в сборнике трудов конференции'],
            ['тезисы доклада конференции']
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('articles_conferences_types');

        return true;

    } // end function

} // end class
