<?php

namespace Scientometrics\Models;

use Scientometrics\Models\Records;

class Charts extends Records\BaseModel
{
    /**
     * annual plans for scientific work
     * 
     */

    private $id;
    private $user;
    private $year;
    private $monographies = array();
    private $collective = array();
    private $meetings = array();
    private $sheets = array(); //аналитические записки, справочные материалы
    private $other = array();
    private $results = array();

    private $data;

    public function list()
    {

    }

    /**
     * Setter - monographies
     * 
     * @return this
     */
    public function setMonographies(array $monographies)
    {
        
        $this->monographies = $monographies;
        return $this;

    } // end function

    /**
     * Setter - collective
     * 
     * @return this
     */
    public function setCollective(array $collective)
    {

        $this->collective = $collective;
        return $this;

    } // end function


    /**
     * Setter - meetings
     * 
     * @return this
     */
    public function setMeetings(array $meetings)
    {

        $this->meetings = $meetings;
        return $this;

    } // end function

    /**
     * Setter - sheets
     * 
     * @return this
     */
    public function setSheet(array $sheets)
    {

        $this->sheets = $sheets;
        return $this;

    } // end function


    /**
     * Setter - other
     * 
     * @return this
     */
    public function setOther(array $other)
    {

        $this->other = $other;
        return $this;

    } // end function


    /**
     * Getting data
     * 
     * @return array
     */
    public function getData()
    {

        return $this->data;

    } // end function


    /**
     * Saving data to main table and dependent tables
     * 
     * TODO: complete method
     * @return void
     */
    public function save()
    {

        $this->fluent->insertInto('charts')->values();

        $id = $this->fluent->from()->select(null)->select('id')->where('name', $name);

        foreach ($this->monographies as $monography) {
            $this->fluent->insertInto()->values($monography, $id);
        }

        foreach ($this->collective as $collective) {
            $this->fluent->insertInto()->values($collective, $id);
        }

        foreach ($this->meetings as $meeting) {
            $this->fluent->insertInto()->values($meeting, $id);
        }

        foreach ($this->sheets as $sheet) {
            $this->fluent->insertInto()->values($sheet, $id);
        }

        foreach ($this->other as $other) {
            $this->fluent->insertInto()->values($other, $id);
        }

    } // end function

} // end class
