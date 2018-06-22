<?php

use yii\db\Migration;

/**
 * Class m180402_234120_monographies_fk
 */
class m180402_234120_monographies_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        Yii::$app->db->createCommand()->addForeignKey(
            'fk_monographies_authors',
            'monographies_authors',
            'monography_key',
            'monographies',
            'id'
        );

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        Yii::$app->db->createCommand()->dropForeignKey('fk_monographies_authors', 'monographies_authors');

        return true;

    } // end function

}
