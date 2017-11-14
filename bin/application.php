<?php

namespace Scientometrics\Bin;

use Slim\App;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$application = new \Slim\App($configuration);

$container = $application->getContainer();

$container['views'] = function ($c) {
    $view = new \Slim\Views\Twig('public/views', [
        'cache' => false
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

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
