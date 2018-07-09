<?php

use yii\db\Migration;

/**
 * Class m180705_020952_book_types
 */
class m180705_020952_book_types extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('booktypes', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->batchInsert('booktypes', ['type'], [
            ['монография'],
            ['сборник статей'],
            ['учебное пособие'],
            ['словарь или справочник'],
            ['брошюра'],
            ['методические указания'],
            ['комментарии к закону']
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('booktypes');

        return true;

    } // end function

} // end class
