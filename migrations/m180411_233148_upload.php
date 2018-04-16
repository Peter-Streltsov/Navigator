<?php

use yii\db\Migration;

/**
 * Class m180411_233148_uploaded_articles
 */
class m180411_233148_upload extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('upload', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'description' => $this->text()->null(),
            'uploadedfile' => $this->string()->notNull(),
            'accepted' => $this->boolean()->defaultValue(false)
        ]);

    } // end function

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('uploaded_articles');

        return true;

    } // end function

} // end class
