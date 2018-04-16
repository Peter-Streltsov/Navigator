<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[UploadCategories]].
 *
 * @see UploadCategories
 */
class UploadCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UploadCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UploadCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
