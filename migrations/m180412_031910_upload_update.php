<?php

use yii\db\Migration;

/**
 * Class m180412_031910_upload_update
 */
class m180412_031910_upload_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('upload', 'class', 'string');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_upload_classes', 'classes');

        return true;

    } // end function

} // end class
