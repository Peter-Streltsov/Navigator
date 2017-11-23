<?php

namespace Scientometrics\Models;

class Users
{
    private $id;
    private $name;
    private $lastname;
    private $position;
    private $edu;

    private $fluent;
    
    public function __construct(\FluentPDO $fluent)
    {
        $this->fluent = $fluent;
    }

    public function userlist()
    {
        $userlist = $this->fluent->from('authors')->select('id', 'name', 'lastname')->orderBy('id');
        foreach ($userlist as $user) {
            $data[] = $user;
        }
        return $data;
    }
}
