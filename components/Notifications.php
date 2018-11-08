<?php

namespace app\components;

use yii\base\Component;

/**
 * Class Notifications
 *
 * @package app\components
 */
class Notifications extends Component
{

    private $user;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->user = \Yii::$app->user->getIdentity();

    } // end construct


    /**
     * counts notifications for current user
     *
     * @return int
     */
    public function countNotifications()
    {
        return 0;
    } // end function

} // end class
