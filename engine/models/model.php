<?php

namespace Models;

use \Classes\Settings as Settings;

abstract class Model {

    public $data;
    private $connection;
    public static $classname = __CLASS__;

    public function __construct() {

    }

    protected function SQLquery($query) {
        return \Classes\Settings::$connection->query($query);
    }

    public function index() {
         return "Model is not specified - empty index method loaded";
    }
}