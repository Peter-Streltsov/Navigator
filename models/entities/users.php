<?php

namespace Scientometrics\Models\Entities;

use Scientometrics\Models\Records as Records;

/**
 * 
 */

class Users
{
    /**
     * entity properties
     */
    private $id;
    private $name;
    private $lastname;
    private $age;
    private $expirience;
    private $publications;

    /**
     * records
     */
    private $authors;
    private $articles;

    public $entity;

    /**
     * creating record objects
     */

    public function __construct()
    {
        $this->authors = new Records\Authors();
        $this->articles = new Records\Articles();
    }

    public function getAll()
    {
        $data = array();
        $list = $this->authors->userlist();
        foreach ($list as $user) {
            $data[$user['id']] = $user;
            $index = $this->articles->getIndexById($user['id']);
            $data[$user['id']] = array_push($data[$user['id']], $index);
        }
        return $data;
    }

    public function add()
    {
        $this->authors
            ->setName($this->name)
            ->setLastname($this->lastname)
            ->setAge($this->age)
            ->setExpirience($this->expirience)
            ->save();
    }

    public function update()
    {
        $this->authors
        ->setName($this->name)
        ->setLastname($this->lastname)
        ->setAge($this->age)
        ->setExpirience($this->expirience)
        ->update();
    }

    public function delete()
    {

    }
}
