<?php

use yii\db\Migration;

/**
 * Class m180622_022611_organisation
 */
class m180622_022611_organisation extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('organisation', [
            'id' => $this->primaryKey(),
            'organisation' => $this->string(),
            'weblink' => $this->string()
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('organisation');
        return true;
    } // end function

} // end class
