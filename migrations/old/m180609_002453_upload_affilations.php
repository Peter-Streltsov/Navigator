<?php

use yii\db\Migration;

/**
 * Class m180609_002453_upload_affilations
 */
class m180609_002453_upload_affilations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('upload', 'affilation', 'string');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('upload', 'affilation');

        return true;

    } // end function

} // end class
