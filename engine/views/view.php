<?php

namespace Views;

use Controls;
use \Controls\Settings as Settings;

abstract class View {

    private $loader;
    private $twig;

    public static $layout;

    public function __construct() {
        /*Twig_Autoloader::register();
        $this->loader = new Twig_Loader_Filesystem(TEMPLATES);
        $this->twig = new Twig_Environment($loader, array('cache' => TWIG_CACHE));
        var_dump($this->twig);*/
    }

    private function generate() {
        
    }

    private function includeTemplate() {

    }

}