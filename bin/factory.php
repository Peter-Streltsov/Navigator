<?php

namespace Scientometrics\Bin;

use Scientometrics\Models as Models;
use Scientometrics\Models\Service as Service;

/**
 * loading dependencies
 */

$container = $application->getContainer();

// Twig container
$container['views'] = function ($c) {
    $view = new \Slim\Views\Twig('public/views', [
        'cache' => false
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

$container['uploadarticles'] = function ($c) {
    return new \Upload\Storage\FileSystem('/public/storage/articles');
};

$container['uploadreports'] = function ($c) {
    return new \Upload\Storage\Filesystem('/public/storage/articles');
};

// Slim-PDO container
$container['slimpdo'] = function() {
    $dsn = 'mysql:host=localhost;dbname=scientometrics;charset=utf8';
    $user = 'root';
    $password = 'root';
    return new \Slim\PDO\Database($dsn, $user, $password);
};

// pdo object container
$container['pdo'] = function() {
    $dsn = 'mysql:host=localhost;dbname=scientometrics';
    return new \PDO($dsn, 'root', 'root', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
};

$container['fluent'] = function() use($container) {
    return new \FluentPDO($container['pdo']);
};

// model for page data
$container['pagedata'] = function() {
    return new Service\Page();
};
