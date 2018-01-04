<?php

namespace Scientometrics\Models\Records;

class Articles extends Record
{
    private $title;
    private $subtitle;
    private $year;
    private $publisher;
    private $doi;
    private $author; // can be array

    private $data;

    /**
     * articles list
     *
     * @return this
     */
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


    /**
     * Undocumented function
     *
     * @param [integer] $userid
     * @return void
     */
    public function getArticlesByUser($userid)
    {

    } // end function


    /**
     * get article information by id
     * TODO: complete method - add fields in fluent selection
     * @param [int] $id
     * @return array
     */
    public function getById($id)
    {
        $result = $this->fluent->from('articles')
                                    ->select(null)
                                    ->select(array('articles.title', 'articles.magazine', 'articles.year'))
                                    ->where('articles.id', $id);
        foreach ($result as $article) {
            $this->data[] = $article;
        }
        return $this->data;
    } // end function


    /**
     * inserting article data in database
     * TODO: complete method; rename (save)
     * @return void
     */
    public function save()
    {
        $this->fluent->insertInto('articles')->values($this->title, $this->publisher, $this->year, $this->author);
    } // end function


    /** SETTERS */
    /** */

    /**
     * setter - article title
     *
     * @return this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    } // end function


    /**
     * setter - article subtitle
     *
     * @return this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    } // end function


    /**
     * setter - article year
     *
     * @param [string] $year
     * @return this
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    } // end function


    /**
     * setter - article author
     *
     * @param [string] $publisher
     * @return this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    } // end function


    /**
     * setter - article author
     *
     * @param [string] $author
     * @return this
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    } // end function

    
    /** GETTERS */

    /**
     * getter - complete data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    } // end function

} // end class
