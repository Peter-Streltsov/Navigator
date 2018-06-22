<?php

use yii\db\Migration;

/**
 * Class m180411_154344_application_update
 */
class m180411_154344_application_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->renameTable('application', 'organisation');

        $this->addColumn('organisation', 'weblink', 'string');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('organisation', 'weblink');

        $this->renameTable('organisation', 'application');

        return true;

    } // end function

} // end class
