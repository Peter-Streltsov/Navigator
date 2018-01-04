<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

class Monographies extends Records\BaseModel
{
    private $title;
    private $subtitle;
    private $publisher;
    private $year;
    private $author;


    /**
     * list of monographies and complete data
     *
     * @return array
     */
    public function list()
    {
        $result = $this->fluent->from('monographies');
        foreach ($result as $book)
        {
            $data[] = $book;
        }
        return $data;
    }


    /**
     * getter - monography by id
     *
     * @param [integer] $id
     * @return array
     */
    public function getById($id)
    {
        return $this->fluent->from('monographies')->where('id', $id);
    }



    /** SETTERS */

    /**
     * setter - monography title
     *
     * @param [string] $title
     * @return object
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    } // end function


    /**
     * setter - monography subtitle
     *
     * @param [string] $subtitle
     * @return object
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    } // end function


    /**
     * Undocumented function
     *
     * @param [type] $year
     * @return object
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    } // end function

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    } // end function

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    } // end function

    public function save()
    {
        
    }

    /**
     * getters
     */

    public function getTitle()
    {
        return $this->title;
    } // end function

    public function getSubtitle()
    {
        return $this->subtitle;
    } // end function

    public function getYear()
    {
        return $this->year;
    } // end function

    public function getPublisher()
    {
        return $this->publisher;
    } // end function

    public function getAuthor()
    {
        return $this->author;
    }

} // end class
