<?php

namespace Views;

use Controls;
use \Controls\Settings as Settings;
use \Traits\HTMLTrait as HTMLTrait;

abstract class View {

    use HTMLTrait;

    private $loader;
    private $twig;
    private $layout;
    private $content;
    private $page;
    private $model;

    public function __construct($model = null) {
        $this->model = $model;
        $this->layout = new \Twig_Loader_Filesystem(LAYOUTS); // "Статическая" часть страницы
        $this->template = new \Twig_Loader_Filesystem(TEMPLATES); // "Динамическая" часть страницы
        $this->twig_layout = new \Twig_Environment($this->layout);
        //, array('cache' => TWIG_CACHE));
        $this->twig_template = new \Twig_Environment($this->template);
        //, array('cache' => TWIG_CACHE));
    }

    public function generate($model, $template) {
        /*echo "<table>";
        foreach ($content as $name => $row) {
            echo "<tr>"."</tr>";
        }
        echo "</table>";*/
    }

    private function includeTemplate() {

    }

    public function __call($method, $parameters) {

    }

}