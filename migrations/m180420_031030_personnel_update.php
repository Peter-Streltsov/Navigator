<?php

use yii\db\Migration;

/**
 * Class m180420_031030_personnel_update
 */
class m180420_031030_personnel_update extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('personnel', 'habilitation', 'string');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('personnel', 'habilitation');

        return true;

    } // end function

} // end class
