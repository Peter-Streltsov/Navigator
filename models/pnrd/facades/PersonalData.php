<?php

namespace app\models\pnrd\facades;

// project classes
use app\models\units\dissertations\Dissertations;
// yii2 classes
use Yii;

/**
 * Class PersonalData
 * @package app\models\pnrd
 */
class PersonalData
{

    public $user; // user data
    public $employee; // staff data for employee of current authorized user
    public $author; // author's data for author of current authorized user
    public $sum_index; // summary index for current user/employee
    public $dissertation; // dissertation/dissertations for current user
    public $monograph; // list - all monographs for author of current authorized user


    public function __construct()
    {

        $this->user = Yii::$app->user->getIdentity();
        $this->employee = $this->user->getStaff();
        $this->author = $this->user->getAuthor();

    } // end construct


    /**
     * GETTERS
     */

    /**
     *
     */
    public function getArticles()
    {

        // TODO: implement method;

    }



    /**
     *
     */
    public function getDissertations()
    {

        return Dissertations::find()->where(['author' => $this->author->id])->all();

    } // end function



    /**
     *
     */
    public function getIndex()
    {

        // TODO: implement method;

    }

    /**
     * ENDGETTERS
     */

} // end class
