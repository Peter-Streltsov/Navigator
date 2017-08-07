<?php

namespace Controls;

use \Traits\Utils as Utils;
use \Classes\Settings as Settings;

class Main extends Control {
    /*
    * Default page controller
    */

    use Utils;

    public function __construct() {
        global $settings;
        $this->getStatus();
        $this->model = 'Main';
        $this->view = 'Main';
    }

    public function index() {
        $tpl = 'main.tpl';
        include LAYOUTS.'userlist.html';
        Settings::$log[] = "Index page from class Main loaded!";
    }
}// end class