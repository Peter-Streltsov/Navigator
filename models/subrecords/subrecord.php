<?php

namespace Scientometrics\Models\Subrecords;

use Scientometrics\Models\Records as Records;

abstract class Subrecords implements \Scientometrics\Interfaces\SubrecordInterface
{
    /**
     * subrecord prototype
     */

    private $pdo;
    private $fluent;

    final public function __construct(\PDO $pdo, $fluent = null)
    {
        $this->pdo = $pdo;
        $this->fluent = $fluent;
    }
}
