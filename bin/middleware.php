<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

/**
 * custom slim-php middleware
 */

//
$application->add(function($request, $response, $next) {
    $_SESSION['status'] = 'session started';
    return $response = $next($request, $response);
});

// fluentpdo container
$application->add(function($request, $response, $next) use($application, $container) {
    $container['fluent'] = new \FluentPDO($container['pdo']);
    return $response = $next($request, $response);
});

// adding telegram bot
$application->add(function($request, $response, $next) use($application, $container) {
    $container['bot'] = new Api('token', true);
    $response = $next($request, $response);
    return $response;
});
