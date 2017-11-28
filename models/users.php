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

    // getting full list of registered authors (not users!)
    public function userlist()
    {
        $data = $this->pdo->prepare('select authors.id, authors.name, authors.lastname, positions.position from authors left join positions on authors.position_key=positions.id');
        return $this->getArray($data);
    } // end function

    // getting exact author by author's id
    public function getUser($id)
    {
        $result = $this->fluent->from('authors')
                                    ->select(null)
                                    ->select(array('authors.name', 'authors.lastname'))
                                    ->where('authors.id', $id)
                                    ->leftJoin('positions ON authors.position_key=positions.id')
                                    ->select('positions.position');

        foreach ($result as $user) {
            $data[] = $user;
        }
        return $data;
    } // end function


    // adding new user
    public function saveUser()
    {
        $name = $this->name;
        $lastname = $this->lastname;
        $position = $this->fluent->from('positions')->select(null)->select('id')->where('position', $this->position);
        $edu = $this->edu;
        $grade = $this->grade;
        $values = [$name, $lastname, $position, $edu, $grade];
        $this->fluent->insertInto('authors')->values($values);
    } // end function

    public function deleteUser()
    {

    }

    public function findUser()
    {

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

    }