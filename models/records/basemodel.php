<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Records as Records;

abstract class BaseModel implements \Scientometrics\Interfaces\RecordInterface
{
    protected $pdo;
    protected $fluent;
    
    final public function __construct(\PDO $pdo, $fluent = null)
    {
        $this->pdo = $pdo;
        $this->fluent = $fluent;
    }

    final protected function getArray($result)
    {
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}
