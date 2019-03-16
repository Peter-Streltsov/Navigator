<?php

use yii\db\Migration;

/**
 * Class m180401_014757_monographs
 */
class m180401_014757_monograph extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('monographs', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'publisher' => $this->string(),
            'type' => $this->integer(),
            'class' => $this->integer(),
            'year' => $this->integer()->notNull(),
            'isbn' => $this->string()->defaultValue(null),
            'city' => $this->string(255),
            'language' => $this->string(),
            'volume_name' => $this->string(),
            'volume_number' => $this->integer(),
            'series_name' => $this->string(),
            'series_number' => $this->string(),
            'pages_number' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'annotation' => $this->text(),
            'index' => $this->text(),
            'file' => $this->string()
        ]);
    } // end function


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('monographs');
        return true;
    } // end function

} // end class
