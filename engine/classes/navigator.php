<?php

/**
* Router class
*/

namespace Classes;

use \Controls;
use \Models;
use \Views;
use \Controls\Settings as Setings;

class Navigator
{

    private $settings;
    private $route;
    private $controller;
    private $action = null;
    private $indexcontroller = null;
    private $handlers = array();

    public static $index = null;
    public static $routes = array();

    public function __construct()
    {
        print_r(static::$routes);
        $this->request();
        $this->directRequest();
        //static::Route();
    } // end function

    public function get($route, $handler)
    {
        $this->append($route, $handler);
    } // end function

    public function post()
    {

    }

    public static function Index($string)
    {
        static::$index = $string;
    } // end function

    public static function Route($string = null)
    {
        static::$routes[] = $string;
    } // end function

    private function append($route, $handler)
    {
        $this->handlers[] = [$route, $handler];
    } // end function

    private function request()
    {

    } // end function

    private function setIndex()
    {
        if (static::$index == null) {
            if ($_SERVER['REQUEST_URI'] == '/') {
                //$this->indexcontroller = 'main';
                $this->indexcontroller = 'scintometrics';
            }
        }
    } // end function

    private function directRequest()
    {
        if (!isset($_SERVER['REQUEST_URI'])) {
            //$this->controller = 'Main';
            $this->controller = 'Scientometrics';
            $this->action = 'index';
        }
        else {
            $parts = explode('/', $_SERVER['REQUEST_URI']);
            $parts[3] = '';
            if (is_array($parts)) {
                $parts = array_diff($parts, array(null));
                $parts = array_values($parts);
                if (isset($parts[0])) {
                    $this->controller = $parts[0];
                    }
                    else {
                        $this->controller = 'Scientometrics';
                        }
                if (count($parts) > 1) {
                    $this->action = $parts[1];
                    }
                    else {
                        $this->action = 'index';
                        }
                    }
                }
    } // end function

    public function start() {
        if ($this->action === null) {
            $this->action = 'index';
        }
        $this->controller = '\Controls\\'.$this->controller;
        $page = new $this->controller;
        $action = $this->action;
        if (php_sapi_name() === 'cli') {
            echo "Page will not be loaded. You are running from CLI!".PHP_EOL;
            echo "Current user status: ", Settings::$descriptor_userstatus.PHP_EOL;
            print_r(Settings::$log);
            return;
        }
        else {
            if (method_exists($page, $action)) {
                //echo "Method found".PHP_EOL;
                //echo $action.PHP_EOL;
                $page->$action();
            }
        }
        //$page->$action();
    } // end function

    private function errorPage404() {
        Settings::$log['current_controller'] = 'requested controller does not exist';
    } // end function

} // end class
