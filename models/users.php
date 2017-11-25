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
    } // end function


    // adding new user
    public function addUser()
    {
        $this->pdo->insertInto('authors')->values($this->name, $this->lastname, $this->position, $this->edu);
    } // end function

    public function deleteUser()
    {

    }

    public function findUser()
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

<<<<<<< HEAD
    }


    /**
     * setters
     */

    public function setId($id)
    {
        $this->id = $id;
    } // end function

    public function setName($name)
    {
        $this->name = $name;
    } // end function

    public function setLastname()
    {
        $this->lastname = $lastname;
    } // end function

    public function setPosition($position)
    {
        $this->position = $position;
    } // end function

    public function setEdu($edu)
    {
        $this->edu = $edu;
    }  // end function

    /**
     * getters
     */

    public function getId()
    {
        return $this->id;
    } // end function

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

=======
>>>>>>> master
} // end class