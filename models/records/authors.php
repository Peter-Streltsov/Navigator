<?php

namespace Scientometrics\Models\Records;

class Authors extends Record
{
    private $id;
    private $name;
    private $secondname;
    private $lastname;
    private $position;
    private $edu;
    private $expirience;
    private $added;
    private $age;


    /**
     * getting full list of registered authors (not users!)
     *
     * @return this
     */
    public function list()
    {
        $this->data = $this->pdo->prepare('select authors.id, authors.name, authors.secondname, authors.lastname, authors.age, positions.position, grades.grade from authors left join positions on authors.position_key=positions.id left join grades on authors.grade_key=grades.id');
        $this->data = $this->getArray($this->data);
        return $this;
    } // end function



    /*public function joinArticles()
    {
        foreach ($this->data as $user) {

        }
    }*/
    

    /**
     * saving author data
     *
     * @return void
     */
    public function save()
    {
        $this->added = date('Y-m-d');
        $query = "INSERT INTO authors (authors.name, authors.secondname, authors.lastname, authors.position_key, authors.added, authors.age, authors.expirience) VALUES(:name, :secondname, :lastname, :position_key, :added, :age, :expirience)";
        try {
            $result = $this->pdo->prepare($query);
            $result->execute(array(':name'=>$this->name, ':secondname'=>$this->secondname, ':lastname'=>$this->lastname, ':position_key'=>$this->position, ':added'=>$this->added, ':age'=>$this->age, ':expirience'=>$this->expirience));
        } catch (\PDOException $e) {
            echo "PDO Error". $e;
        }
    } // end function


    /**
     * deleting exact user
     *
     * @param [integer] $id
     * @return void
     */
    public function deleteUser($id)
    {
        $this->fluent->deleteFrom('users')->where('id', $id);
    } // end function


    /**
     * updating author's information
     *
     * TODO: complete method
     * @param array $parameters
     * @return void
     */
    public function updateUser(array $parameters)
    {
        $this->fluent->update();
    }

    /** SETTERS */

    /**
     * setter - author's name
     *
     * @param [string] $name
     * @return this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    } // end function


    /**
     * setter - author's secondname
     *
     * @param [string] $secondname
     * @return this
     */
    public function setSecondname($secondname)
    {
        $this->secondname = $secondname;
        return $this;
    } // end function


    /**
     * setter - author's lastname
     *
     * @param [string] $lastname
     * @return this
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    } // end function


    /**
     * setter - author's current position 
     *
     * @param [string] $position
     * @return this
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    } // end function


    /**
     * setter - setting date
     *
     * @return this
     */
    public function setAdded()
    {
        $this->added = date('Y-m-d');
        return $this;
    }


    /**
     * setter -author's age
     *
     * @param [string] $date
     * @return this
     */
    public function setAge($date)
    {
        $this->age = $date;
        return $this;
    } // end function


    /**
     * setter - author's education
     *
     * @param [string] $edu
     * @return this
     */
    public function setEdu($edu)
    {
        $this->edu = $edu;
        return $this;
    } // end function


    /**
     * setter - author's expirience
     *
     * @param [string] $expirience
     * @return this
     */
    public function setExpirience($expirience)
    {
        $this->expirience = $expirience;
        return $this;
    } // end function


    /**
     * setter - author's grade
     *
     * @param [string] $grade
     * @return this
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
        return $this;
    } // end function

    /** GETTERS */

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
     

    /**
     * getting exact author by author's id
     *
     * @param [integer] $id
     * @return array
     */
    public function getUser($id)
    {
        $result = $this->fluent->from('authors')
                                    ->select(null)
                                    ->select(array('authors.name', 'authors.secondname', 'authors.lastname', 'authors.position_key'))
                                    ->where('authors.id', $id)
                                    ->leftJoin('positions ON authors.position_key=positions.id')
                                    ->select('positions.position');

        foreach ($result as $user) {
            $data[] = $user;
        }
        return $data;
    } // end function

    }