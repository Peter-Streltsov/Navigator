<?php

/*
* @ Prototype for controllers
*/

namespace Controls;

use \Traits\Utils as Utils;
use \Interfaces\Controller as Controller;
use \Models;

abstract class Control implements Controller {

    use Utils;

    public static $model;
    public static $classname;
    private $accesslevel;  //Определяет доступ к контроллеру в целом
    private $view;
    private $layout = 'page.html';
    private $template;

    public function getGlobals() {
        global $settings;
        global $exectime;
    }

    public function index() {
    }
}