<?php

use yii\db\Migration;

/**
 * creates datastructure for dissertations
 * linked models:
 *      * DissertationTypes [type] // special
 *      * Habilitations [habilitation] // common
 *      * Languages [language] // common
 *      * Authors [author] // common
 *      * Specialities [speciality] // common ??? (if necessary)
 *
 * Class m180621_232939_dissertations
 */
class m180621_232939_dissertations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('dissertations', [
            'id' => $this->primaryKey(),
            'type' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'year' => $this->integer()->notNull(),
            'city' => $this->string()->notNull(),
            'habilitation' => $this->integer()->notNull(),
            'organisation' => $this->string(),
            'speciality' => $this->string()->notNull(),
            'pages_number' => $this->integer(),
            'language' => $this->string(),
            'state_registration' => $this->string(),
            'author' => $this->integer()->notNull(),
            'annotation' => $this->text(),
            'link' => $this->string(),
            'index' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'file' => $this->string()
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
