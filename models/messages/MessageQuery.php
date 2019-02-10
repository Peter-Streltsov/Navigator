<?php

namespace app\models\messages;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for app\models\messages\Messages;
 *
 * @see Messages
 */
class MessageQuery extends ActiveQuery
{

    /**
     * @return MessageQuery
     */
    public function active()
    {
        return $this->andWhere(['read' => 0]);
    } // end function

    /**
     * @inheritdoc
     * @return Message[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Message|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
