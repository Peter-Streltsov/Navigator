<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Subrecords as Subrecords;

abstract class Record implements \Scientometrics\Interfaces\RecordInterface
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
