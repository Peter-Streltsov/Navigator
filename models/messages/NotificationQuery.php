<?php

namespace app\models\messages;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Notification]].
 *
 * @see Notifications
 */
class NotificationQuery extends ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Notifications[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Notifications|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
