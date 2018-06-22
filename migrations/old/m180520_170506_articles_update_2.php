<?php

use yii\db\Migration;

/**
 * Class m180520_170506_articles_update_2
 */
class m180520_170506_articles_update_2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->dropColumn('articles', 'file');
        $this->addColumn('articles', 'file', 'string');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('articles', 'file');

        return true;

    } // end function

} // end class
