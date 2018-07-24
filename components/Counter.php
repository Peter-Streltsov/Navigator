<?php

namespace app\components;

// project classes
use app\models\messages\Message;
// yii2 classes
use Yii;
use yii\base\Component;

/**
 * Class Messages
 *
 * draws badges with numbers of different types of messages
 *
 * @since 0.4.33
 * @package app\components
 */
class Counter extends Component
{

    /**
     * counting messages (from users to admins) with status 'null' (not read)
     *
     * @return string
     */
    public function messagesCount()
    {

        // counting messages with status null (not read)
        $count = Message::find()->where(['read' => null])->count();

        // if $count query returns null - set $count to 0
        if ($count < 1) {
            $count = 0;
        }

        // returning badge with style attributes
        return '<span style="background-color: red;" class="badge badge-light">'
        . (integer)$count
        . '</span>';

    } // end function



    /**
     * counts number of uploaded data models not revised by administrator
     *
     * @return string
     */
    public function uploadMessagesCount()
    {

        // counting upload data with status 0 (not revised)
        $count = Upload::find()->where(['accepted' => '0'])->count();

        // if $count query returns null - set $count to 0
        if ($count < 1) {
            $count = 0;
        }

        // returning badge with style attributes
        return '<span style="background-color: darkslategray;" class="badge badge-light">'
            . (integer)$count
            . '</span>';

    } // end function



    /**
     *
     */
    public function userMessagesCount()
    {

        // getting current user model
        $user = Yii::$app->user->getIdentity();

    } // end function

} // end class
