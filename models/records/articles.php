<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

class Articles extends Records\BaseModel
{
    private $title;
    private $subtitle;
    private $year;
    private $publisher;
    private $author; // can be array

    private $data;

    // list of all articles
    public function list()
    {
        $result = $this->fluent->from('articles')
                                    ->select(null)
                                    ->select(array(
                                        'articles.id',
                                        'articles.title',
                                        'articles.subtitle',
                                        'articles.magazine',
                                        'articles.country',
                                        'articles.year'
                                    ));

        foreach ($result as $article) {
            $this->data[] = $article;
        }

        foreach ($this->data as $key => $article) {
            $authors = $this->fluent->from('articles_authors')->select(null)->select(array('name', 'lastname'))->where('articles_key', $article['id']);
            foreach ($authors as $author) {
                if (is_array($author)) {
                    $this->data[$key]['authors'][] = $author['name']." ".$author['lastname'];
                }
            }
        }

        return $this;
    } // end function

    public function getArticlesByUser($userid)
    {
    } // end function

    public function getById($id)
    {
        //$data = array();
        $result = $this->fluent->from('articles')
                                    ->select(null)
                                    ->select(array('articles.title', 'articles.magazine', 'articles.year'))
                                    ->where('articles.id', $id);
        foreach ($result as $article) {
            $this->data[] = $article;
        }
        return $this->data;
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
        return $this;
    } // end function

    public function setPublisher()
    {
        return $this;
    } // end function

    public function setAuthor()
    {
        return $this;
    } // end function

    /**
     * 
     */

    public function getData()
    {
        return $this->data;
    }

} // end class
