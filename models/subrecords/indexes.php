<?php

namespace Scientometrics\Models\Subrecords;

use Scientometrics\Models\Records as Records;

class Indexes extends Subrecord
{
    /**
     * table parameters
     * 
     * @var [integer] $id
     * @var [string] $name
     * @var [float] $index
     */
    private $id;
    private $name;
    private $index;

    /**
     * class data
     *
     * @var [array] $data
     */
    private $data;

    public function list()
    {

    }
    
    public function getIndexes()
    {
        $this->fluent->from('indexes_publications')->select(null)->select('indexes.id', 'indexes.name', 'indexes.value');
        return $this;
    } // end function

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    } // end function

    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    } // end function

    // updating value
    public function updateIndex()
    {
        $this->fluent->update('indexes');
    }

    
    /**
     * saving data
     *
     * @return void
     */
    public function save()
    {
        $this->fluent->insertInto('indexes')->values($this->name, $this->index);
    } // end function


    /**
     * get record data
     *
     * @return array
     */
    public function getData()
    {

    }

} // end class
