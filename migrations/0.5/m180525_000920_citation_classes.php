<?php

use yii\db\Migration;

/**
 * Class m180525_000920_citation_classes
 */
class m180525_000920_citation_classes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('citation_classes', [
            'id' => $this->primaryKey(),
            'class' => $this->string()->notNull(),
            'value' => $this->integer()->notNull()
        ]);

        $this->batchInsert('citation_classes', [
            'class',
            'value'
        ],
            [
                ['РИНЦ', 1],
                ['Scopus', 2],
                ['Web of Science', 3],
                ['Google Scholar', 4]
            ]
        );
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('citation_classes');
        return true;
    } // end function

} // end class
