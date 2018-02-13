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
     * constructor
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


    /**
     * checking access to current controller method
     *
     * @param array $access
     * @return void
     */
    final public function checkAccess(array $access): void
    {
        /*if ($access != $_SESSION['access']) {
            header('Location: /login');
            exit();
        }*/

        foreach ($access as $type) {
            if ($_SESSION['access'] == $type) {
                return;
            }
        }

        header('Location: /login');
        exit();
    } // end function

} // end class
