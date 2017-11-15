<?php

namespace Scientometrics\Bin;

use Slim\App;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$application = new \Slim\App($configuration);

// Middleware

//databaseconnection
$application->add(function($request, $response, $next) use($application) {
    $container = $application->getContainer();
    $dsn = 'mysql:host=localhost;dbname=scientometrics';
    $container['databaseconnection'] = new \PDO($dsn, 'root', '');
    $response = $next($request, $response);
    return $response;
});

// Containers
$container = $application->getContainer();

/**
 * Routes
 */

// index page
$application->get('/', function($request, $response) {
    var_dump($this->databaseconnection);
    $response->getBody()->write('index page');
});

$application->get('/test', function($request, $response) {
    $response->getBody()->write('test');
});

// total userlist or userinfo on single user
$application->get('/users/(:id)', function($request, $response, $id) {
    if (!isset($id)) {
        echo "exact user information";
    } else {
        echo "users list";
    }
});

$application->get('/controlpanel', function($request, $response) {
    echo "controlpanel mockup";
});

$application->run();
