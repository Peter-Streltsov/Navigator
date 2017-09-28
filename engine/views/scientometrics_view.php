<?php

namespace Views;

class Scientometrics_View extends View {

    /**
    * Scientometrics web application view class
    */

    /*public function __construct($model = null) {
        $this->model = $model;
        $this->layout = new \Twig_Loader_Filesystem(LAYOUTS); // "Статическая" часть страницы
        $this->template = new \Twig_Loader_Filesystem(TEMPLATES); // "Динамическая" часть страницы
        $this->twig_layout = new \Twig_Environment($this->layout, array('cache' => TWIG_CACHE));
        $this->twig_template = new \Twig_Environment($this->template, array('cache' => TWIG_CACHE));
    } // end construct
    */

    public function index() {
        $layout = 'page.html';
        $template = 'main.tpl';
        $content['data'] = 'Электронная наукометрическая база данных сведений о результативности деятельности научных сотрудников ЦЕИ РАН';
        $templatecontent['data'] = $this->twig_template->render($template, $content);
        //var_dump($templatecontent);
        $page = $this->twig_layout->render($layout, $templatecontent);
        echo $page;
    }

    public function userlist() {
        $layout = 'page.html';
        $template = 'list.tpl';
        $this->content = $this->twig_template->render($template, array());
        $array2['data'] = $this->content;
        $this->page = $this->twig_layout->render($layout, $array2);
        echo $this->page;
    }

    public function controlPanel() {
        $layout = 'page.html';
        $template = 'controlpanel.tpl';
        $content['data'] = '';
        $templatecontent['data'] = $this->twig_template->render($template, $content);
        $page = $this->twig_layout->render($layout, $templatecontent);
        echo $page;
    }
} // end class