<?php

namespace Models;

use \Models;
use \Views;
use \PDO;
use \JamesMoss\Flywheel\Config as FlyConfig;
use \JamesMoss\Flywheel\Repository as FlyRepository;

class Scientometrics_Model extends Model {

    private $connection;

    public function __construct($connection = null)
    {
        $this->connection = $connection;
    }

    private function connect()
    {
        return $this->connection;
    }

    private function query($query)
    {

    }

    // общий список пользователей
    public function userlist()
    {
        $result = $this->connection->prepare('SELECT id, setting, name, lastname, position, education, degree FROM authors');
        $result->execute();
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function userData($id)
    {
        $result = $this->connection->prepare("SELECT id, setting, name, lastname, position, education, degree FROM authors WHERE id=$id");
        $result->execute();
        return $result = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addArticle()
    {

    }

    public function addReport()
    {

    }

    public function addDissertation()
    {

    }
}