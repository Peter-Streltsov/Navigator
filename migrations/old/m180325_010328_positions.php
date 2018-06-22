<?php

use yii\db\Migration;

/**
 * Class m180325_010328_positions
 */
class m180325_010328_positions extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('positions', [
            'id' => $this->primaryKey(),
            'position' => $this->string(255)->notNull()
        ]);

        $this->batchInsert('positions', ['position'], [
           ['младший научный сотрудник'],
           ['научный сотрудник'],
           ['старший научный сотрудник'],
           ['ведущий научный сотрудник']
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        //$this->dropTable('positions');
        Yii::$app->db->createCommand()->dropTable('positions');

        return true;

    } // end function

} // end class
