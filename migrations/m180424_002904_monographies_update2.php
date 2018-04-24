<?php

use yii\db\Migration;

/**
 * Class m180424_002904_monographies_update
 */
class m180424_002904_monographies_update2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('monographies', 'volume', 'float');
        $this->renameColumn('monographies', 'doi', 'isbn');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('monographies', 'volume');
        $this->renameColumn('monographies', 'isbn', 'doi');

        return true;

    } // end function

} // end class
