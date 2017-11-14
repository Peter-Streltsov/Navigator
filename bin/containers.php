<?php

namespace Scientometrics\Bin;


// Twig container
$container['views'] = function ($c) {
    $view = new \Slim\Views\Twig('public/views', [
        'cache' => false
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};
