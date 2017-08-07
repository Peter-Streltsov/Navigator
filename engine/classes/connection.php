<?php

namespace Classes;
use \PDO;

class Connection {

    public static $connection;
    private $type;
    private $databaseuser;
    private static $_instance = null;

    private function __construct() {
        global $settings;
        $this->type = \Classes\Settings::$descriptor_databasetype;
        $this->databaseuser = \Classes\Settings::$descriptor_databaseuser;
        \Classes\Settings::$connection = $this->defineMethod($this->type);
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
    
    public function __clone() {

    }

    public function __wakeup() {

    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
} //end class