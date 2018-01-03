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

    public function list()
    {

    }

    public function monographiesList()
    {
        $result = $this->fluent->from('monographies');
        foreach ($result as $book)
        {
            $data[] = $book;
        }
        return $data;
    }

    public function monographyById()
    {
        $this->fluent->from('monographies');
    }
    /**
     * setters
     */

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    } // end function

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    } // end function

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
