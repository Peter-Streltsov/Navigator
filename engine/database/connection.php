<?php

/*
* returns connection to database; does not contains any methotds to work with data
*/

namespace Database;

use \Classes\Settings as Settings;
use \PDO;

class Connection
    {
        /**
        * static singletone class - provides parameters and
        * connections for databases defined in /config/connections.php
        */
        public static $connection;
        public static $connections = array();
        private static $_instance = null;
        
        /*
        * empty private constructor
        */
        private function __construct() {

        } //end construct
        
        private static function generateDns($type, $host, $databasename) {
            return $type.':host='.$host.';dbname='.$databasename;
        }
        
        public function __set($name, $value) {
            $this->$name = $value;
        }
        
        public static function define($type, $host, $databasename, $user, $password = null) {
            static::$connections[$databasename] = new \PDO(static::generateDns($type, $host, $databasename), $user, $password);
        }
        
        public static function getInstance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
    } //end class