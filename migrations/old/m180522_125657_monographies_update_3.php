<?php

use yii\db\Migration;

/**
 * Class m180522_125657_monographies_update_3
 */
class m180522_125657_monographies_update_3 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->dropColumn('monographies', 'file');
        $this->addColumn('monographies', 'file', 'string');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('monograpnies', 'file');
        $this->addColumn('monographies', 'file', 'blob');

        return true;

    } // end function

} // end class
