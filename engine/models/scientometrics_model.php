<?php

namespace Models;

use \Models;
use \Views;
use \PDO;
use \JamesMoss\Flywheel\Config as FlyConfig;
use \JamesMoss\Flywheel\Repository as FlyRepository;

class Scientometrics_Model extends Model {

    private $connection;

    public function __construct($connection = null) {
        $this->connection = $connection;
    }

    private function connect() {
        return $this->connection;
    }

    public function userlist() {
         $result = $this->connection->prepare('SELECT setting, name, surname FROM authors');
         $result->execute();
         $result = $result->fetchAll(PDO::FETCH_ASSOC);
         return $result;
    }

    public function editUser() {

    }

    public function addArticle() {

    }

    public function addReport() {

    }

    public function addDissertation() {

    }
}