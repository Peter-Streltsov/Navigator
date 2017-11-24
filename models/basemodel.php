<?php

namespace Scientometrics\Models;

abstract class BaseModel
{
    protected $fluent;
    protected $pdo;
    
    final public function __construct(\FluentPDO $fluent, \PDO $pdo)
    {
        $this->fluent = $fluent;
        $this->pdo = $pdo;
    }
}
