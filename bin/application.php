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
// test
$application->add(function($request, $response, $next) {
    $response->getBody()->write('before app middleware');
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
    echo "index page";
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
