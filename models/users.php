<?php

namespace Scientometrics\Models;

use Scientometrics\Models as Models;

class Users extends Models\BaseModel
{
    private $id;
    private $name;
    private $lastname;
    private $position;
    private $edu;

    public function userlist()
    {
        $userlist = $this->fluent->from('authors')->select('id', 'name', 'lastname')->orderBy('id');
        foreach ($userlist as $user) {
            $data[] = $user;
        }
        return $data;
    } // end function

    public function getUser($id)
    {
        $user['userdata'] = $this->fluent->from('authors')->select('id', 'name', 'lastname');
        return $user;
    }

    public function adduser()
    {
        $this->fluent->insertInto('authors')->values($this->name, $this->lastname);
    } // end function

    /**
     * setters
     */

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    } // end function

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    } // end function

    public function setPosition()
    {
        $this->position = $position;
        return $this;
    } // end function

    public function setEdu($edu)
    {
        $this->edu = $edu;
        return $this;
    } // end function

    /**
     * getters
     */

     public function getName()
     {
         return $this->name;
     } // end function

     public function getLastname()
     {
         return $this->lastname;
     } // end function

     public function getPosition()
     {
         return $this->position;
     } // end function

     public function getEdu()
     {
         return $this->edu;
     } // end function

} // end class
