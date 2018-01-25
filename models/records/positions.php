<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

/**
 * 
 */

class Positions extends Record
{
    private $id;
    private $position;

    /**
     * setter for 'position'
     * @param position string
     * @return void
     */    
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }
    /**
     * recieves all values from positions ('id' & 'position')
     * @return array
     */
    public function getPositions()
    {
        $result = $this->fluent->from('positions')
        ->select(null)
        ->select(array('positions.id', 'positions.position'));
        foreach ($result as $position) {
            $data[] = $position;
        }
        return $data;
    } // end function

    public function getById($id)
    {

    }

    public function getData()
    {
        
    }

    public function save()
    {
        
    }

} // end class
