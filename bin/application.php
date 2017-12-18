<?php

namespace Scientometrics\Bin;

use Slim\App;
use Telegram\Bot\Api;
use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;
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
    $data['page'] = (new Models\Page())->common()->getData();
    $this->views->render($response, 'index.twig.html', $data);
});

// testing url
$application->get('/test', function($request, $response) {
    $response->getBody()->write($_SESSION['status']);
});

// total userlist/таблица с данными всех пользователей
$application->get('/users', function($request, $response, $id) {
    $data['page'] = (new Models\Page())->common()->getData();
    $users = new Records\Authors($this->pdo);
    $data['users'] = $users->list()->getData();
    $this->views->render($response, 'userlist.twig.html', $data);
});

// exact user data/информация о конкретном пользователе
$application->get('/users/get/{id}', function($request, $response, $id) {
    $users = new Records\Authors($this->pdo, $this->fluent);
    $data['user'] = $users->getUser($id['id']);
    $this->views->render($response, 'userdata.twig.html', $data);
});

// edit user by id
$application->get('/users/edit/{id}', function($request, $response, $id) {
    $data['page'] = (new Models\Page())->common()->getData();
    $data['user'] = (new Records\Authors($this->pdo, $this->fluent))->getUser($id['id']);
    return $this->views->render($response, 'useredit.twig.html', $data);
});

// input page for adding new user
$application->get('/users/add', function($request, $response) {
    $data['page'] = (new Models\Page())->common()->getData();
    $data['positions'] = (new Records\Positions($this->pdo, $this->fluent))->getPositions();
    $data['grades'] = (new Records\Grades($this->pdo, $this->fluent))->getGrades();
    $this->views->render($response, 'adduser.twig.html', $data);
});

// personal user page
$application->get('/users/personal/{id}', function($request, $response, $id) {
    $data['page'] = (new Models\Page())->common()->getData();
    $this->views->render($response, 'personal.twig.html', $data);
});

// issue message
$application->get('/users/personal/message/{id}', function($request, $response, $id) {
    return $this->views->render($response, 'message.twig.html');
});

// logging out
$application->get('/users/logout', function($request, $response) {
});

// articles list
$application->get('/articles', function($request, $response){
    $articles = new Records\Articles($this->pdo, $this->fluent);
    $data['articles'] = $articles->articlesList();
    $this->views->render($response, 'articleslist.twig.html', $data);
});

// getting exact article by id
$application->get('/articles/get/{id}', function($request, $response, $id) {
    $article = new Records\Articles($this->pdo);
    $data['article'] = $article->getArticlesList();
    $this->views->render($response, 'articledata.twig.html', $data);
});

// adding article
$application->get('/articles/add', function($request, $response) {
    $this->views->render($response, 'addarticle.twig.html');
});

// monographies list
$application->get('/monographies', function($request, $response) {
    $monographies = new Records\Monographies($this->pdo, $this->fluent);
    $data['monographies'] = $monographies->monographiesList();
    var_dump($data['monographies']);
});

// monography by id
$application->get('/monographies/get/{id}', function($request, $response, $id) {
    $monographies = new Records\Monographies($this->pdo, $this->fluent);
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

// general statistics
$application->get('/stat', function($request, $response) {
    $data['page'] = (new Models\Page())->getData();
    $this->views->render($response, 'stat.twig.html', $data);
});

// control panel - admin only access
$application->get('/control', function($request, $response) {
    $data['page'] = (new Models\Page())->getData();
    $data['users'] = (new Records\Authors($this->pdo, $this->fluent))->list()->getData();
    $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
    var_dump($data['articles']);
    foreach ($data['users'] as $user) {
        $index = (new Records\Articles($this->pdo, $this->fluent))->getById($user['id']);
    }
    $this->views->render($response, 'controlpanel.twig.html', $data);
});



/**
 * POST contollers
 */

// adding user
$application->post('/users/add', function($request, $response) use($application) {
    header("Content-Type: text/html; charset=utf-8");
    $user = new Records\Authors($this->pdo, $this->fluent);
    $_POST['added'] = date('Y-m-d');
    $user->setName($_POST['name'])
        ->setSecondname($_POST['secondname'])
        ->setLastname($_POST['lastname'])
        ->setPosition($_POST['position'])
        ->setEdu($_POST['edu'])
        ->setExpirience($_POST['expirience'])
        ->setGrade($_POST['grade'])
        ->setAge($_POST['age'])
        ->setAdded()
        ->save();

    return $response->withRedirect('/controlpanel');
});

// adding article
$application->post('/articles/add', function($request, $response){
    $user = new Records\Authors($this->pdo); //???
    $article = new Records\Articles($this->fluent);
    $response->getBody()->write('adding another article');
});

// authorization
$application->post('/authorize', function($request, $response) {
    $response->getBody()->write('authorization mockup');
});


// run
$application->run();
