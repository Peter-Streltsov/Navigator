<?php

use yii\db\Migration;

/**
 * Class m180608_115442_articles_affilations
 */
class m180608_115442_articles_affilations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_affilations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('articles_affilations');

        return true;

    } // end function

} // end class
