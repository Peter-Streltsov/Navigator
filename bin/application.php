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
$application->get('/user/{id}', function($request, $response, $id) {
    $users = new Models\Users($this->pdo, $this->fluent);
    $data['user'] = $users->getUser($id['id']);
    var_dump($data['user']);
    //$response->getBody()->write($id['id']);
});

//
$application->get('/edituser/{id}', function($request, $response, $id) {
    //var_dump($id);
    $response->getBody()->write("edit user - id:".$id['id']);
});

// getting exact article by id
$application->get('/article/{id}', function($request, $response, $id) {
    $article = new Models\Articles($this->pdo);
});

// telegram bot
$application->get('/bot', function($request, $response) {
    $response->getBody()->write('telegram bot');
});

// control panel - admin only access
$application->get('/controlpanel', function($request, $response) {
    echo "controlpanel mockup";
});

/**
 * POST contollers
 */

// adding user
$application->post('/adduser', function($request, $response) {
    $user = new Models\Users($this->pdo);
    $response->getBody()->write('adding user');
});

// adding article
$application->post('/addarticle', function($request, $response){
    $user = new Models\Users($this->pdo); //???
    $article = new Models\Articles($this->fluent);
    $response->getBody()->write('adding another article');
});


// run
$application->run();
