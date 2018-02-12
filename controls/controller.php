<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;
use Scientometrics\Models as Models;
use Scientometrics\Models\Service as Service;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Subrecords as Subrecords;

abstract class Controller implements \Scientometrics\Interfaces\ControlInterface
{

    /**
     * basic controller class
     */

    protected $view;
    protected $pdo;
    protected $fluent;
    protected $pagedata;
    protected $access = array();

    /**
     * basic final constructor
     *
     * @param \Slim\Container $container
     */
    final public function __construct(\Slim\Container $container)
    {
        $this->view = $container->views;
        $this->pdo = $container->pdo;
        $this->fluent = $container->fluent;
        $this->pagedata = $container->pagedata;

    } // end function


    final public function checkAccess($access)
    {
        if ($access != $_SESSION['access']) {
            header('Location: /login');
            exit();
        }
    } // end function

} // end class
