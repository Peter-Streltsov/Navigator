<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

/**
 * custom slim-php middleware
 */

// database connection
$application->add(function($request, $response, $next) use($application, $container) {
    $dsn = 'mysql:host=localhost;dbname=scientometrics';
    try {
        $container['databaseconnection'] = new \PDO($dsn, 'root', '');
    }
    catch(Exception $e) {
        $e->getMessage();
    }
    finally {
        $container['databaseconnection'] = 'connection failed';
        $response = $next($request, $response);
        return $response;
    }
});

// adding Fluent container
$application->add(function($request, $response, $next) use($application, $container) {
    $container['fluent'] = new \FluentPDO($container['pdo']);
});


// adding telegram bot
$application->add(function($request, $response, $next) use($application, $container) {
    $container['bot'] = new Api('token', true);
    $response = $next($request, $response);
    return $response;
});
