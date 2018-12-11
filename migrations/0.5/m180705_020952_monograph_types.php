<?php

use yii\db\Migration;

/**
 * Class m180705_020952_book_types
 */
class m180705_020952_monograph_types extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('monograph_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()
        ]);

        $this->batchInsert('monograph_types', ['type'], [
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
        $this->dropTable('monograph_types');
        return true;
    } // end function

} // end class
