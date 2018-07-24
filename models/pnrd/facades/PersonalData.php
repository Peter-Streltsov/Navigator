<?php

namespace app\models\pnrd\facades;

// yii2 classes
use app\models\units\dissertations\Dissertations;
use app\modules\Control\models\Personnel;
// yii2 classes
use Yii;

/**
 * Class PersonalData
 * @package app\models\pnrd
 */
class PersonalData
{

    public $user;
    public $employee;
    public $author;
    public $sum_index;

    public function __construct()
    {

        $this->user = Yii::$app->user->getIdentity();
        $this->employee = Personnel::find()->where(['user_id' => $this->user->id])->one();

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
