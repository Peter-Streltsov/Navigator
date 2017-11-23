<?php

namespace Scientometrics\Models;

abstract class BaseModel
{
    protected $fluent;
    
    final public function __construct(\FluentPDO $fluent)
    {
        $this->fluent = $fluent;
    }
}
