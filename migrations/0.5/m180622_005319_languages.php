<?php

use yii\db\Migration;

/**
 * create model for Languages
 * app\models\common\Languages
 *
 * Class m180622_005319_languages
 */
class m180622_005319_languages extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('languages', [
            'id' => $this->primaryKey(),
            'language' => $this->string()->notNull(),
            'created_at' => $this->integer()
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('languages');
        return true;
    } // end function

} // end class
