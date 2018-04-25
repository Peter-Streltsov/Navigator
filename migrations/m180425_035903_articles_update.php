<?php

use yii\db\Migration;

/**
 * Class m180425_035903_articles_update
 */
class m180425_035903_articles_update extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('articles', 'annotation', 'text');
        $this->addColumn('articles', 'text', 'text');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('articles', 'annotation');
        $this->dropColumn('articles', 'text');

        return true;

    } // end function

} // end class
