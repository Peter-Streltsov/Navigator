<?php

namespace Scientometrics\Models\Data;

use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;

/**
 * Class Statistics
 * provides methods for statistical data
 *
 * @since 0.3.56
 * @package Scientometrics\Models\Data
 */
class Statistics
{
    private $pdo;
    private $fluent;

    public function __construct($pdo, $fluent)
    {
        $this->pdo = $pdo;
        $this->fluent = $fluent;
    }

    /**
     *
     */
    public function getPublicStatistics()
    {
        $data['page'] = (new Service\Page($this->pdo, $this->fluent))->getData();
        $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        $data['countusers'] = count((new Records\Authors($this->pdo, $this->fluent))->list()->getData());
        $data['count'] = count($data['articles']);
        return $data;
    } // end function

    public function getControlStatistics()
    {

    } // end function

} // end class
