<?php

namespace Scientometrics\Models;

class Users
{
    private $id;
    private $name;
    private $lastname;
    private $position;
    private $edu;

    private $pdo;
    private $fluent;
    
    public function __construct(\PDO $pdo)
    {
        if($pdo) {
            $this->pdo = $pdo;
        }

        $this->fluent = new FluentPDO($this->pdo);
    }
}
