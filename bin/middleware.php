<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

/**
 * custom slim-php middleware
 */

// adding telegram bot
$application->add(function($request, $response, $next) use($application, $container) {
    $container['bot'] = new Api('token', true);
    $response = $next($request, $response);
    return $response;
});
