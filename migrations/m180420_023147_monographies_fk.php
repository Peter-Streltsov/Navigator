<?php

use yii\db\Migration;

/**
 * Class m180420_023147_monographies_fk
 */
class m180420_023147_monographies_fk extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        Yii::$app->db
            ->createCommand()
            ->addForeignKey(
                'fk_monographies_id',
                'monographies_authors',
                'monography_id',
                'monographies',
                'id')
            ->execute();

        Yii::$app->db
            ->createCommand()
            ->addForeignKey(
                'fk_author_id',
                'monographies_authors',
                'author_id',
                'authors',
                'id'
            )
            ->execute();

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_monographies_id', 'monographies_authors');

        $this->dropForeignKey('fk_author_id', 'monographies_authors');

        return true;

    } // end function

} // end class
