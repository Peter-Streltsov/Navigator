<?php

use yii\db\Migration;

/**
 * Class m180419_214449_monographies_update
 */
class m180419_214449_monographies_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('monographies', 'publisher', 'string');
        $this->addColumn('monographies', 'class', 'integer');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('monographies', 'publisher');
        $this->dropColumn('monographies', 'class');

        return true;

    } // end function

} // end class
