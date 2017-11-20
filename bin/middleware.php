<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

/**
 * custom slim-php middleware
 */


// database connection
$application->add(function($request, $response, $next) use($application) {
    $container = $application->getContainer();
    $dsn = 'mysql:host=localhost;dbname=scientometrics';

    try {
        $container['databaseconnection'] = new \PDO($dsn, 'root', '');
    }
    catch(Exception $e) {
        $e->getMessage();
    }
    finally {
        $response = $next($request, $response);
        return $response;
    }
});


// adding telegram bot
$application->add(function($request, $response, $next) use($application) {
    $container = $application->getContainer();
    $container['bot'] = new Api('token', true);
    $response = $next($request, $response);
    return $response;
});