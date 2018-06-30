<?php

use yii\db\Migration;

/**
 * Class m180630_204508_habilitations
 */
class m180630_204508_habilitations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('habilitations', [
            'id' => $this->primaryKey(),
            'habilitation' => $this->string()->notNull()
        ]);

        $this->batchInsert('habilitations', ['habilitation'], [
            ['Нет'],
            ['Кандидат наук'],
            ['Доктор наук']
        ]);

    } // end function

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('habilitations');

        return true;

    } // end function

} // end class
