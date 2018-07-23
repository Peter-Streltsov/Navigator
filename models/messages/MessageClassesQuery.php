<?php

namespace app\modules\Control\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[MessagesClasses]].
 *
 * @see MessageClasses
 */
class MessageClassesQuery extends ActiveQuery
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

    } // end function



    /**
     * @inheritdoc
     * @return MessageClasses|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
