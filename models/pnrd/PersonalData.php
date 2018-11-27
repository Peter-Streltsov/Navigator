<?php

namespace app\models\pnrd;

// project classes
use app\models\identity\Users;
use app\models\units\articles\collections\ArticleCollection;
use app\models\units\articles\conferences\ArticleConference;
use app\models\units\articles\journals\ArticleJournal;
use app\models\units\dissertations\Dissertations;
// yii classes
use Yii;

/**
 * Class PersonalData
 * Provides PNRD data for current user or requested user (if is set $id parameter in constructor)
 *
 * @package app\models\pnrd
 */
class PersonalData
{

    public $user; // user data
    public $employee; // staff data for employee of current authorized user
    public $author; // author's data for author of current authorized user
    private $units;

    public function __construct(Users $user)
    {
        $this->user = $user;
        if ($this->user != null) {
            $this->employee = $this->user->getStaff();
            $this->author = $this->user->getAuthor();
        } else {
            $this->employee = null;
            $this->author = null;
        }
        $this->units = new Units();
    } // end construct


    /**
     * GETTERS
     */

    /**
     * collects articles of all types where user_id = $this->>user->id and returns them as array of ActiveRecords
     *
     * @return array
     */
    public function getArticles()
    {
        // TODO: implement method;
        $articles_journals = ArticleJournal::find()->all();
        $articles_collections = ArticleCollection::find()->all();
        $articles_conferencies = ArticleConference::find()->all();

        return array_merge($articles_journals, $articles_collections, $articles_conferencies);
    } // end function


    /**
     * finds dissertations linked with current user model
     *
     * @return array
     */
    public function getDissertations()
    {
        return Dissertations::find()->where(['author' => $this->author->id])->all();
    } // end function


    /**
     * calculates total index for current user model
     *
     * @return int
     */
    public function getIndex()
    {
        if ($this->user == null && $this->author == null) {
            return 0;
        }
        return 0;
        // TODO: implement method;
    } // end function

    /**
     * ENDGETTERS
     */

    public function countArticles()
    {

    } // end function

    public function countMonographs()
    {

    } // end function

    public function countDissertations()
    {

    } // end function

} // end class
