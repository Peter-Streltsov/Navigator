<?php

/*
* Router class
*/

namespace Classes;

use Controls;
use Models;
use Views;

class Navigator {

    private $settings;
    private $route;
    private $controller;
    private $action = null;

    public function __construct() {
        global $settings;
        $this->request();
    }

    private function request() {
        if (!isset($_SERVER['REQUEST_URI'])) {
            $this->controller = 'Main';
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
                        $this->controller = 'Main';
                        }
                if (count($parts) > 1) {
                    $this->action = $parts[1];
                    }
                    else {
                        $this->action = 'index';
                        }
                    }
                }
    }

    public function start() {
        if ($this->action === null) {
            $this->action = 'index';
        }
        $this->controller = '\Controls\\'.$this->controller;
        $page = new $this->controller;
        $action = $this->action;
        if (php_sapi_name() === 'cli') {
            \Classes\Settings::$log[] = 'Navigator-> you are running from CLI!';
            return;
        }
        else {
            if (method_exists($page, $action)) {
                return $page->$action();
            }
        }
    }
}