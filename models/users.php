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

    public function adduser(array $parameters)
    {

    }
} // end class
