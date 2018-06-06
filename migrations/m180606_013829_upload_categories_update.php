<?php

use yii\db\Migration;
use app\modules\Control\models\UploadCategories;

/**
 * Class m180606_013829_upload_categories_update
 */
class m180606_013829_upload_categories_update extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->batchInsert('upload_categories', ['class'], [
            ['Диссертация'],
            ['Доклад'],
            ['Редактирование']
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $dissertation = UploadCategories::find()
            ->where(['class' => 'Диссертация'])
            ->one();

        $report = UploadCategories::find()
            ->where(['class' => 'Доклад'])
            ->one();

        $edition = UploadCategories::find()
            ->where(['class' => 'Редактирование'])
            ->one();

        if ($dissertation->delete() && $report->delete() && $edition->delete()) {
            return true;
        } else {
            echo "m180606_013829_upload_categories_update cannot be reverted.\n";
        }

        return false;

    } // end function

} // end class
