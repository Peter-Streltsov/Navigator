<?php

namespace Classes;

class Settings {

    /*
    * Singletone class for application settings and user parameters
    */

    //use xml;

    public $settings = array();  //Various parameters and general settings
    public $parameters = array();  // User parameters
    public static $connection;  // Databases connections ???
    public $log = array();  //Log - loading classes and methods
    public $exec;  //Время выполнения скрипта
    public $model;
    public $view;
    public static $descriptor_databaseuser;
    public static $descriptor_databasepassword = null;
    public static $descriptor_databasetype;  //Тип подключаемой базы данных
    public $descriptor_userstatus;  // Current user status
    private static $_instance = null;

    private function __construct() {
        global $exectime;
        //$this->getConfig();
        $this->getUsersList();
        static::$descriptor_databasetype = 'mysql';
        static::$descriptor_databaseuser = 'root';
        static::$connection = \Classes\Connection::getInstance();
        $this->descriptor_userstatus = \Classes\AccessControl::$accessdescriptor;
        $this->exec = $exectime;
    }


    //Загрузка конфигурационного файла
    private function getConfig() {
        $configfile = XML::getXML(CONFIG.'config.xml');
        $configfile = XML::XMLtoArray($configfile);
        $this->settings['config'] = $configfile; 
    }

    private function getUsersList() {
        //$this->settings['userlist'] = XML::XMLtoArray(XML::getXML(CONFIG.'userlist.xml'));
    }

    private function getCurrentUser() {

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