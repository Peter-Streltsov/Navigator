<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

/**
 * works with custom indexes for publications
 */
class Indexes extends Records\BaseModel
{
    private $id;
    private $name;
    private $index;

    private $data;

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

    // adding new category
    public function save()
    {
        $this->fluent->insertInto('indexes')->values($this->name, $this->index);
    } // end function

} // end class
