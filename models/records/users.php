<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;

class Users extends Records\Record
{
    private $login;
    private $password;
    private $access;
    private $author_alias;
    private $added;
    private $data = array();


    /**
     * Undocumented function
     *
     * @return void
     */
    public function list()
    {
        //return $this;
    } // end function


    /**
     * saving new user data
     *
     * @return void
     */
    public function save()
    {
        $this->fluent->insertInto('users')->values($this->name, $this->password, $this->author_alias);
    } // end function

    /** SETTERS */

    /**
     * setter - user's email
     *
     * @param [string] $email
     * @return object
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    } // end function


    /**
     * setter - user's password
     *
     * @param [type] $password
     * @return object
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    } // end function


    /**
     * setter - user's alias (key) for 'authors'
     *
     * @param [integer] $alias
     * @return object
     */
    public function setAuthorAlias($alias)
    {
        $this->author_alias = $alias;
        return $this;
    } // end function

    /**
     * @param [string] $access
     * @return $this
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }
    
    /**
     * setter - date user added
     *
     * @return object
     */
    public function setAdded()
    {
        $this->added = date('Y-m-d');
        return $this;
    } // end function

    /** GETTERS */

    /**
     * getting user data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    } // end function

    public function getById($id)
    {

    } // end function

} // end class
