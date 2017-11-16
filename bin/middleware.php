<?php

namespace Scientometrics\Bin;

/**
 * custom slim-php middleware
 */


// database connection
$application->add(function($request, $response, $next) use($application) {
    $container = $application->getContainer();
    $dsn = 'mysql:host=localhost;dbname=scientometrics';
    $container['databaseconnection'] = new \PDO($dsn, 'root', '');
    $response = $next($request, $response);
    return $response;
});