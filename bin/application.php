<?php

namespace Scientometrics\Bin;

use Slim\App;
use Telegram\Bot\Api;
use Scientometrics\Models as Models;

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
    $users = new Models\Users($this->fluent);
    $data['users'] = $users->userlist();
    //var_dump($data['users']);
});

// exact user data/информация о конкретном пользователе
$application->get('user/{id}', function($request, $response, $id) {

});

//
$application->get('/edituser/{id}', function($request, $response, $id) {
    //var_dump($id);
    $response->getBody()->write("edit user - id:".$id['id']);
});

// adding user
$application->get('/adduser', function($request, $response) {
    $response->getBody()->write('adding user');
});

// telegram bot
$application->get('/bot', function($request, $response) {
    $response->getBody()->write('telegram bot');
});

// control panel - admin only access
$application->get('/controlpanel', function($request, $response) {
    echo "controlpanel mockup";
});


// run
$application->run();
