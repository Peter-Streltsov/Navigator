<?php

namespace Scientometrics\Models;

/**
 * works with custom indexes for publications
 */
class Indexes extends BaseModel
{
    private $id;
    private $name;
    private $index;

    public function getIndexes()
    {
        $this->fluent->from('indexes')->select(null)->select('indexes.id', 'indexes.name', 'indexes.index');
        //return $this;
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

    // adding new category
    public function save()
    {
        $this->fluent->insert('indexes')->values($this->name, $this->index);
    } // end function

} // end class
