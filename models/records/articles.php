<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models as Models;

class Articles extends Models\BaseModel
{
    private $title;
    private $subtitle;
    private $year;
    private $publisher;
    private $author; // can be array

    // list of all articles
    public function articlesList()
    {
        $result = $this->fluent->from('articles')
                                    ->select(null)
                                    ->select(array(
                                        'articles.title',
                                        'articles.magazine',
                                        'articles.year'
                                    ));

        foreach ($result as $article) {
            $data[] = $article;
        }

        return $data;
    } // end function

    public function getArticlesByUser($userid)
    {
    } // end function

    public function getArticleById($id)
    {
        $result = $this->fluent->from('articles')
                                    ->select(null)
                                    ->select(array(
                                        'articles.title',
                                        'articles.magazine',
                                        'articles.year'
                                    ))
                                    ->where('id', $id);
    } // end function

    public function addArticle()
    {
        $this->fluent->insertInto('articles')->values($this->title, $this->publisher, $this->year, $this->author);
    } // end function

    /**
     * setters
     */

    public function setTitle()
    {

    } // end function

    public function setSubtitle()
    {

    } // end function

    public function setYear()
    {

    } // end function

    public function setPublisher()
    {

    } // end function

    public function setAuthor()
    {

    } // end function

} // end class
