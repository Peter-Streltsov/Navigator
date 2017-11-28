<?php

namespace Scientometrics\Bin;

use Slim\App;
use Telegram\Bot\Api;
use Scientometrics\Models as Models;
use Scientometrics\Config as Config;
use Scientometrics\Bot as Bot;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$application = new \Slim\App($configuration);

require_once CONTAINERS;

require_once CUSTOM_MIDDLEWARE; 

/**
 * Routes
 */

 /**
  * GET contollers
  */

// index page
$application->get('/', function($request, $response) {
    //var_dump($this->databaseconnection);
    $response->getBody()->write('index page');
});

// testing url
$application->get('/test', function($request, $response) {
    $response->getBody()->write('test');
});

// total userlist/таблица с данными всех пользователей
$application->get('/users', function($request, $response, $id) {
    $users = new Models\Users($this->pdo);
    $data['users'] = $users->userlist();
    var_dump($data['users']);
    //var_dump($data['users2']);
});

// exact user data/информация о конкретном пользователе
$application->get('/users/get/{id}', function($request, $response, $id) {
    $users = new Models\Users($this->pdo, $this->fluent);
    $data['user'] = $users->getUser($id['id']);
    var_dump($data['user']);
    //$response->getBody()->write($id['id']);
});

//
$application->get('/users/edit/{id}', function($request, $response, $id) {
    //var_dump($id);
    $response->getBody()->write("edit user - id:".$id['id']);
});

// articles list
$application->get('/articles', function($request, $response){
    $articles = new Models\Articles($this->pdo, $this->fluent);
    $data['articles'] = $articles->articlesList();
    var_dump($data['articles']);
});

// getting exact article by id
$application->get('/articles/get/{id}', function($request, $response, $id) {
    $article = new Models\Articles($this->pdo);
});

// monographies list
$application->get('/monographies', function($request, $response) {
    $monographies = new Models\Monographies($this->pdo, $this->fluent);
    $data['monographies'] = $monographies->monographiesList();
    var_dump($data['monographies']);
});

// monography by id
$application->get('/monographies/get/{id}', function($request, $response, $id) {
    $monographies = new Models\Monographies($this->pdo, $this->fluent);
    $data['monographies'] = $monographies->monographyById($id['id']);
});

// telegram bot
$application->get('/bot', function($request, $response) {
    $response->getBody()->write('telegram bot');
});

// creating tables
$application->get('/createdatabaselayout', function($request, $response) {
    $database = new Models\Layout($this->pdo);
    $database->createLayout();
});

// control panel - admin only access
$application->get('/controlpanel', function($request, $response) {
    echo "controlpanel mockup";
});

/**
 * POST contollers
 */

// adding user
$application->post('/users/add', function($request, $response) {
    $user = new Models\Users($this->pdo);

    $user->setName($_POST['name'])
                                ->setLastname($_POST['lastname'])
                                ->setPosition($_POST['position'])
                                ->setEdu($_POST['edu'])
                                ->setGrade($_POST['grade'])
                                ->saveUser();

    $response->getBody()->write('adding user');
});

// adding article
$application->post('/articles/add', function($request, $response){
    $user = new Models\Users($this->pdo); //???
    $article = new Models\Articles($this->fluent);
    $response->getBody()->write('adding another article');
});


// run
$application->run();
