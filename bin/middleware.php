<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

/**
 * custom slim-php middleware
 */

// adding Fluent container
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