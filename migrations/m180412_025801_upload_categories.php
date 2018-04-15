<?php

use yii\db\Migration;

/**
 * Class m180412_025801_upload_categories
 */
class m180412_025801_upload_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('upload_categories', [
            'id' => $this->primaryKey(),
            'class' => $this->text()->notNull()
        ]);

        $this->batchInsert('upload_categories', ['class'], [
            ['Статья'],
            ['Монография']
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('upload_categories');

        return true;

    } // end function

} // end class
