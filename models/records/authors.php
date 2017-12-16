<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

header("Content-Type: text/html; charset=utf-8");

class Authors extends Records\BaseModel
{
    private $id;
    private $name;
    private $lastname;
    private $position;
    private $edu;
    private $expirience;
    private $added;
    private $age;


    // getting full list of registered authors (not users!)
    public function userlist()
    {
        $this->data = $this->pdo->prepare('select authors.id, authors.name, authors.lastname, positions.position from authors left join positions on authors.position_key=positions.id');
        $this->data = $this->getArray($this->data);
        return $this;
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

    public function joinArticles()
    {
        foreach ($this->data as $user) {

        }
    }

    // adding new user
    public function save()
    {
        $this->added = date('Y-m-d');
        $query = "INSERT INTO authors (authors.name, authors.lastname, authors.position_key, authors.added, authors.age, authors.expirience) VALUES(:name, :lastname, :position_key, :added, :age, :expirience)";
        try {
            $result = $this->pdo->prepare($query);
            $result->execute(array(':name'=>$this->name,
                ':lastname'=>$this->lastname,
                ':position_key'=>$this->position,
                ':added'=>$this->added,
                ':age'=>$this->age,
                ':expirience'=>$this->expirience));
        } catch (\PDOException $e) {
            echo "PDO Error". $e;
        }
        echo $query.PHP_EOL;
    } // end function


    public function deleteUser($id)
    {
        $this->fluent->deleteFrom('users')->where('id', $id);
    } // end function


    public function findUser()
    {

    } // end function


    public function updateUser(array $parameters)
    {
        $this->fluent->update();
    }

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


    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    } // end function

    public function setAdded()
    {
        $this->added = date('Y-m-d');
        return $this;
    }

    public function setAge($date)
    {
        $this->age = $date;
        return $this;
    }

    public function setEdu($edu)
    {
        $this->edu = $edu;
        return $this;
    } // end function

    public function setExpirience($expirience)
    {
        $this->expirience = $expirience;
        return $this;
    } // end function

    public function setGrade($grade)
    {
        $this->grade = $grade;
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

     public function getData()
     {
         return $this->data;
     }

    }