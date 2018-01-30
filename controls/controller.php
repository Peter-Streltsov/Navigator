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

    /**
     * Undocumented function
     *
     * @param \Slim\Container $container
     */
    final public function __construct(\Slim\Container $container)
    {
        $this->view = $container->views;
    } // end function

} // end class
