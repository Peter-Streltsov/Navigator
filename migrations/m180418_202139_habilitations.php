<?php

use yii\db\Migration;

/**
 * Class m180418_202139_habilitations
 */
class m180418_202139_habilitations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('habilitations', [
            'id' => $this->primaryKey(),
            'habilitation' => $this->string()
        ]);

        $this->batchInsert('habilitations', ['habilitation'], [
            ['нет'],
            ['кандидат наук'],
            ['доктор наук']
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('habilitations');

        return true;

    } // end function

} // end class
