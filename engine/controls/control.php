<?php

/*
* @ Prototype for controllers
*/

namespace Controls;

use \Traits\Utils as Utils;
use \Interfaces\ControllerInterface as ControllerInterface;
use \Models;

abstract class Control implements ControllerInterface {

    use Utils;

    public $model;
    private static $accesslevel;  //Определяет доступ к контроллеру в целом или к методу контроллера
    private $view;
    private $layout;
    private $template;
    private $twig_layout; //"статическая" часть страницы
    private $twig_template;//"шаблон" tpl

    final public function __construct() {
        $this->layout = new \Twig_Loader_Filesystem(LAYOUTS); // "Статическая" часть страницы
        $this->template = new \Twig_Loader_Filesystem(TEMPLATES); // "Динамическая" часть страницы
        $this->twig_layout = new \Twig_Environment($this->layout);//, array('cache' => TWIG_CACHE));
        $this->twig_template = new \Twig_Environment($this->template);//, array('cache' => TWIG_CACHE));
    } // end construct

    public function index() {
    
    } // end function


    public function generate($page, $modeldata = array(), $tpl = null) {
        if (is_null($tpl)) {
            echo $this->twig_layout->render($page, $modeldata);
        }
        else {
            $content['data'] = $this->twig_template->render($tpl, $modeldata);
            echo $this->twig_layout->render($page, $content);
        }
    } // end function

    public function __call($method, $argument = null) {
        $this->view->$method($argument);
    }
} // end class