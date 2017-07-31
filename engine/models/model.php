<?php

namespace Models;

abstract class Model {

    public $data;
    public static $classname = __CLASS__;

    public function __construct() {
        global $settings;
        $this->quasiconstructor();
        //$settings->log['model'] = static::$classname;
    }

    protected function quasiconstructor() {
    }

    public function index() {
         return "Model is not specified - index function loaded";
    }
}