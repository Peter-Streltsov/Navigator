<?php

use yii\db\Migration;

/**
 * Class m180522_165814_uploads_update
 */
class m180522_165814_uploads_update extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('upload', 'title', 'string');
        $this->addColumn('upload', 'subtitle', 'string');
        $this->addColumn('upload', 'publisher', 'string');
        $this->addColumn('upload', 'file', 'string');
        $this->addColumn('upload', 'year', 'string');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('upload', 'title');
        $this->dropColumn('upload', 'subtitle');
        $this->dropColumn('upload', 'publisher');
        $this->dropColumn('upload', 'file');
        $this->dropColumn('upload', 'year');

        return true;

    } // end function

} // end class
