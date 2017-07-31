<?php

class Settings {

    /*
    * Singletone class for application settings and user parameters
    */

    use xml;

    //Various parameters and general settings
    public $settings = array();
    // User parameters
    public $parameters = array();
    // Current user status
    public $status;
    // Parameter is used to transmit user data between classes
    public $transmit;
    // Databases connections
    public $connections = array();
    //Log - loading classes and methods
    public $log = array();
    //Время выполнения скрипта 
    public $exec;
    //Права доступа пользователя
    public $model;
    public $view;
    private $access;
    private static $_instance = null;

    private function __construct() {
        global $exectime;
        $this->getConfig();
        $this->getUsersList();
        $this->settings['autoload'] = array(CLASSES, CONTROLS);
        $this->access = AccessControl::getInstance();
        $this->status = AccessControl::$accessdescriptor;
        echo AccessControl::$accessdescriptor.PHP_EOL;
        $this->exec = $exectime;
    }


    //Загрузка конфигурационного файла
    private function getConfig() {
        $configfile = XML::getXML(CONFIG.'config.xml');
        $configfile = XML::XMLtoArray($configfile);
        $this->settings['config'] = $configfile; 
    }

    private function getUsersList() {
        $this->settings['userlist'] = XML::XMLtoArray(XML::getXML(CONFIG.'userlist.xml'));
    }

    public function __wakeup() {

    }

    public function __clone() {

    }

    public function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}