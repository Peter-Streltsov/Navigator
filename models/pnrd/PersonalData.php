<?php

namespace app\models\pnrd;

/**
 * Class PersonalData
 * @package app\models\pnrd
 */
class PersonalData
{

    public function __construct()
    {

        $user = \Yii::$app->user->getIdentity();

    } // end construct

} // end class
