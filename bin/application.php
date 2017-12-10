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
    $data['page'] = (new Models\Page())->getData();
    $this->views->render($response, 'index.twig.html', $data);
});

// testing url
$application->get('/test', function($request, $response) {
    $response->getBody()->write('test');
});

// total userlist/таблица с данными всех пользователей
$application->get('/users', function($request, $response, $id) {
    $users = new Models\Users($this->pdo);
    $data['users'] = $users->userlist();
    //var_dump($data['users']);
    $this->views->render($response, 'userlist.twig.html', $data);
});

// exact user data/информация о конкретном пользователе
$application->get('/users/get/{id}', function($request, $response, $id) {
    $users = new Models\Users($this->pdo, $this->fluent);
    $data['user'] = $users->getUser($id['id']);
    $this->views->render($response, 'userdata.twig.html', $data);
});

//
$application->get('/users/edit/{id}', function($request, $response, $id) {
    $response->getBody()->write("edit user - id:".$id['id']);
});

// articles list
$application->get('/articles', function($request, $response){
    $articles = new Models\Articles($this->pdo, $this->fluent);
    $data['articles'] = $articles->articlesList();
    //var_dump($data['articles']);
    $this->views->render($response, 'articleslist.twig.html', $data);
});

// getting exact article by id
$application->get('/articles/get/{id}', function($request, $response, $id) {
    $article = new Models\Articles($this->pdo);
    $data['article'] = $article->getArticlesList();
    $this->views->render($response, 'articledata.twig.html', $data);
});

// adding article
$application->get('/articles/add', function($request, $response) {
    $this->views->render($response, 'addarticle.twig.html');
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
    $response->getBody()->write('telegram bot mockup');
});

// creating tables
$application->get('/createdatabaselayout', function($request, $response) {
    $database = new Models\Layout($this->pdo);
    $database->createLayout();
});

$application->get('/stat', function($request, $response) {
    $this->views->render($response, 'stat.twig.html');
});

// control panel - admin only access
$application->get('/controlpanel', function($request, $response) {
    //$response->getBody()->write("controlpanel mockup");
    $this->views->render($response, 'controlpanel.twig.html');
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

// authorization
$application->post('/authorize', function($request, $response) {
    $response->getBody()->write('authorization mockup');
});


// run
$application->run();
