<?php

use yii\db\Migration;

/**
 * Class m180423_201943_dissertations
 */
class m180423_201943_dissertations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('dissertations', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'author' => $this->string()->notNull(),
            'author_id' => $this->integer(),
            'date' => $this->integer(),
            'code' => $this->string(),
            'organisation' => $this->string(),
            'speciality' => $this->string(),
            'type' => $this->string(),
            'opponents' => $this->text(),
            'annotation' => $this->text()
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('dissertations');

        return true;

    } // end function

} // end class
