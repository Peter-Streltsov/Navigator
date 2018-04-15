<?php

namespace app\components;

use yii\base\Component;

/**
 * Class Access
 * @package app\components
 */
class Access extends Component
{

    public static $user;


    public function __construct()
    {

        static::$user = (\Yii::$app->user->getIdentity())->access_token;;

    } // end construct



    public function isSupervisor()
    {

        return static::$user == 'supervisor';

    } // end function



    public function isAdmin()
    {

        return static::$user == 'administrator';

    } // end function



    public function isUser()
    {

        return static::$user == 'user';

    } // end function

} // end class
