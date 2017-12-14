<?php

namespace Scientometrics\Models;

use Scinetometrics\Models\Records as Records;

/**
 * 
 */

abstract class Models
{
    protected $authors;
    protected $articles;
    protected $conferencies;
    protected $monographies;
    protected $positions;

    final public function __construct()
    {
        $this->authors = new Records\Authors();

    }
}
