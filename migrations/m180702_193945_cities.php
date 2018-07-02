<?php

use yii\db\Migration;

/**
 * Class m180702_193945_cities
 */
class m180702_193945_cities extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'city' => $this->string()->notNull()
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('cities');

        return true;

    } // end function

} // end class
