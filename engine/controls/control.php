<?php

/*
* @ Prototype for controllers
*/

namespace Controls;

abstract class Control {

    private static $model;
    public static $classname;
    private $view;
    private $layout = 'page.html';
    private $template;

    public function getGlobals() {
        global $settings;
        global $exectime;
    }

    protected static function getStatus() {

    }

    protected function index() {
    }
}