<?php

use yii\db\Migration;

/**
 * Class m180608_204610_monograph_affilations
 */
class m180608_204610_monograph_affilations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('monograph_affilations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'monograph_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('monograph_affilations');

        return true;

    } // end function

} // end class
