<?php

namespace Scientometrics\Models;

abstract class BaseModel
{
    protected $pdo;
    
    final public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}
