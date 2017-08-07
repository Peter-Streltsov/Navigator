<?php

/*
* @ Prototype for controllers
*/

namespace Controls;

use \Traits\Utils as Utils;

abstract class Control {

    use Utils;

    private static $model;
    public static $classname;
    //Определяет доступ к контроллеру в целом
    private $accesslevel;
    private $view;
    private $layout = 'page.html';
    private $template;

    public function getGlobals() {
        global $settings;
        global $exectime;
    }

    protected function index() {
    }
}