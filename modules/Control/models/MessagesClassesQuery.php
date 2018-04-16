<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[MessagesClasses]].
 *
 * @see MessagesClasses
 */
class MessagesClassesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MessagesClasses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MessagesClasses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
