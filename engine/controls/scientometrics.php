<?php

namespace Controls;

use \Controls\Settings as Settings;
use \Traits\Utils as Utils;
use \Models\Scientometrics_model;
use \Database\Connection as Conection;

class Scientometrics extends Control {

    use Utils;

    public function index() {
        $connection = Conection::getInstance();
        $this->model = new \Models\Scientometrics_Model($connection::$connections['scientometrics']);
        $data['data'] = 'Электронная наукометрическая база данных сведений о результативности деятельности научных сотрудников ЦЕИ РАН';
        $this->generate('page.html', $data, 'main.tpl');
    }

    public function userlist() {
        $connection = Conection::getInstance();
        $this->model = new \Models\Scientometrics_Model($connection::$connections['scientometrics']);
        $data['data'] = $this->model->userlist();
        //print_r($data['data']);
        $this->generate('page.html', $data, 'users.tpl');
    }

    public function editUser() {
        $this->model = new \Models\Scientometics_model();

    }

    public function addArticle() {
        $this->model = new \Models\Scientometics_model();

    }

    public function addReport() {
        $this->model = new \Models\Scientometics_model();

    }

    public function addDissertation() {
        $this->model = new \Models\Scientometics_model();
        
    }

    public function statisctics() {
        $this->model = new \Models\Scientometics_model();

    }

    public function setValues() {
        $this->model = new \Models\Scientometics_model();

    }

    public function controlPanel() {
        $content['data'] = '';
        $this->generate('page.html', $content, 'controlpanel.tpl');
    }

    private function load() {
        
    }
}