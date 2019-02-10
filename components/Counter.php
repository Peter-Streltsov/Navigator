<?php

namespace app\components;

// project classes
use app\models\messages\Message;
// yii2 classes
use Yii;
use yii\base\Component;

/**
 * Class Counter
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
        $count = Message::find()->where(['read' => 0])->count();

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
        $messages = Message::find()->where(['user_id' => $user->id])->count();
        return $messages;
    } // end function


    /**
     * Counts active (unread) user messages;
     *
     * @return integer
     */
    public function activeMessagesCount()
    {
        return Message::find()->active()->count();
    } // end function


    /**
     * returns color for displaying 'messages' icon in application navbar
     * basing on number of unread messages
     *
     * @return string
     */
    public function messageColor()
    {
        if ($this->activeMessagesCount() > 0) {
            return 'lightgreen';
        }
        return 'gray';
    } // end function


    /**
     * calculates number of unchecked notifications for current user
     * TODO: replace stub;
     *
     * @return int|null
     */
    public function notificationsCount()
    {
        $user = Yii::$app->user->getIdentity();
        return 0;
    } // end function


    /**
     * returns color for displaying 'notifications' icon in application navbar
     * basing on number of unchecked notifications
     *
     * @return string
     */
    public function notificationColor()
    {
        if ($this->notificationsCount() > 0) {
            return 'lightgreen';
        }
        return 'gray';
    } // end function

} // end class
