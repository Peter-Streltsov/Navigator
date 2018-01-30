<?php

namespace Scientometrics\Controls;

use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Subrecords;

abstract class Controller implements \Scientometrics\Interfaces\ControlInterface
{
    /**
     * basic controller class
     */

    protected $view;
    protected $pdo;
    protected $fluent;

    /**
     * Undocumented function
     *
     * @param \Slim\Container $container
     */
    final public function __construct(\Slim\Container $container)
    {
        $this->view = $container->views;
        $this->pdo = $container->pdo;
        $this->fluent = $container->fluent;
    } // end function

} // end class
