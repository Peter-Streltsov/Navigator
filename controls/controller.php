<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;
use Scientometrics\Models as Models;
use Scientometrics\Models\Service as Service;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Subrecords as Subrecords;

/**
 * Class Controller
 * @package Scientometrics\Controls
 */
abstract class Controller implements \Scientometrics\Interfaces\ControlInterface
{

    /**
     * @var mixed
     */
    protected $view;


    /**
     * @var mixed
     * @var fluent
     * @var slimpdo \Slim\SlimPDO
     */
    protected $pdo;
    protected $fluent;
    protected $slimpdo;


    /**
     * @var mixed
     */
    protected $pagedata;


    /**
     * @var array
     */
    protected $access = array();

    protected $data;

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
        $this->slimpdo = $container->slimpdo;

        $this->pageData();

        $this->init();

        $this->checkAccess($this->access);

    } // end function

    /**
     * Undocumented function
     *
     * @return void
     */
    final private function pageData()
    {

        $this->data['page'] = (new Service\Page())->getData();

    } // end function


    /**
     * Undocumented function
     *
     * @return void
     */
    protected function init()
    {

    }


    /**
     * checking access to current controller method
     *
     * @param array $access
     * @return void
     */
    final public function checkAccess(array $access): void
    {
        foreach ($access as $type) {
            if ($_SESSION['access'] == $type) {
                return;
            }
        }

        header('Location: /login');
        exit();
    } // end function

} // end class
