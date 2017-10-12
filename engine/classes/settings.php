<?php

namespace Classes;

use \Database\Connection as Connection;
use \Classes\AccessControl as AccessControl;
use \Traits\XML as XML;

class Settings {

    /*
    * Singletone class for application settings and user parameters
    */

    //use XML;

    private $configuration;
    public static $settings = array();  //Various parameters and general settings
    public static $parameters = array();  // User parameters
    public static $time;
    public static $connection;  // Databases connections ???
    public static $log = array();  //Log - loading classes and methods
    public static $autoload = array(); // Logs autoloader function
    public static $model;
    public static $view;
    public static $descriptor_databaseuser;
    public static $descriptor_databasepassword = null;
    public static $descriptor_databasetype;  //Тип подключаемой базы данных
    public static $descriptor_userstatus;  // Current user status
    private static $_instance = null;

    private function __construct() {
        //$this->getConfig();
        //static::getUsersList();
        static::$descriptor_databasetype = 'mysql';
        static::$descriptor_databaseuser = 'root';
        static::$descriptor_userstatus = AccessControl::$accessdescriptor;
        $this->configuration = $this->getConfig();
        //print_r($this->configuration);
    }


    //Загрузка конфигурационного файла
    private function getConfig() {
        return parse_ini_file(CONFIG.'config.ini');
    }

    private static function getUsersList() {
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
} // end class