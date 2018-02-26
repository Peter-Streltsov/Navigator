<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Subrecords as Subrecords;

abstract class Record implements \Scientometrics\Interfaces\RecordInterface
{
    protected $pdo;
    protected $fluent;
    protected $slimpdo;
    
    final public function __construct(\PDO $pdo, $fluent = null, $slimpdo = null)
    {
        $this->pdo = $pdo;
        $this->fluent = $fluent;
        $this->slimpdo = $slimpdo;
    }

    final protected function getArray($result)
    {
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    /*public function getById()
    {
        
    }

    public function getData()
    {

    }

    public function save()
    {

    }*/
}
