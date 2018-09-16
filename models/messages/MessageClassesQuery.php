<?php

namespace app\models\messages;

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
     * @return MessageClasses[]|array
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
