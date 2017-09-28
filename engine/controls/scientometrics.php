<?php

namespace Controls;

use \Controls\Settings as Settings;
use \Traits\Utils as Utils;
//use \Twig_Autoloader as Twig_Autoloader;

class Scientometrics extends Control {

    use Utils;

    public function __construct() {
        static::$model = new \Models\Scientometrics_Model;
        $this->view = new \Views\Scientometrics_View(static::$model);
        static::getStatus();
    }

    public function index() {
        $method = __FUNCTION__;
        $this->view->$method();
    }

    public function logStatus() {

    }

    public function userlist() {
        $method = __FUNCTION__;
        $this->view->$method();
    }

    public function editUser() {

    }

    public function addArticle() {

    }

    public function addReport() {

    }

    public function addDissertation() {
        
    }

    public function statisctics() {

    }

    public function setValues() {

    }

    public function controlPanel() {
        $method = __FUNCTION__;
        $this->view->$method();
    }

    private function load() {
        
    }
}