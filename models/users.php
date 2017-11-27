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
        $userlist = $this->fluent->from('authors')->leftJoin('positions ON authors.position_key = positions.id')->select('authors.id', 'authors.name', 'authors.lastname', 'positions.position')->orderBy('id');
        foreach ($userlist as $user) {
            $data[] = $user;
        }
        return $data;
    } // end function

    // getting exact author by author's id
    public function getUser($id)
    {
        $user['userdata'] = $this->fluent->from('authors')->leftJoin()->select('name', 'lastname')->where();
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

    public function setUser()
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->position = $position;
        $this->edu = $edu;
        $this->grade = $grade;
        return $this;
    }

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