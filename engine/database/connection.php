<?php

/*
* returns connection to database; does not contains any methotds to work with data
*/

namespace Database;

use \Classes\Settings as Settings;
use \PDO;

class Connection {

    public static $connection;
    public static $connections = array();
    private static $_instance = null;

    private function __construct() {

    } //end construct

    private function defineMethod($type) {
        if (preg_match("/sql/", $this->type)) {
            switch ($this->type) {
                case 'mysql':
                return static::connectSQL($this->databaseuser, null);
                break;
                default:
                return static::connectSQL($this->databaseuser, null);
                break;
            }
        }
        else {
            exit('non SQL database!');
        }
    }

    private function generateDsn() {

    }

    public static function connectSQL($user, $password = null) {
        try {
            static::$connection = new PDO("mysql:host=localhost;dbname=generic", $user, $password);
        } catch (PDOException $exception) {
            throw new DatabaseException($exception->getMessage(), $exception->getCode());
        }
        static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        static::$connection->exec("set names utf8");
        return static::$connection;
    }

    private static function generateDns($type, $host, $databasename) {
        return $type.':host='.$host.';dbname='.$databasename;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __clone() {

    }

    public function __wakeup() {

    }

    public static function define($type, $host, $databasename, $user, $password = null) {
        $dsn = static::generateDns($type, $host, $databasename);
        static::$connections[$databasename] = new \PDO($dsn, $user, $password);
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        //var_dump(self::$_instance);
        return self::$_instance;
    }
} //end class