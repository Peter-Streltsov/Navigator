<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

/**
 * custom slim-php middleware
 */

//

// adding telegram bot ??? (delete or relocate)
$application->add(function($request, $response, $next) use($application, $container) {
    $container['bot'] = new Api('token', true);
    $response = $next($request, $response);
    return $response;
});


$application->add(function($request, $response, $next) use($container) {
    unset($_SESSION['status']);
    $_SESSION['status'] = 'started';
    if ($_SESSION['status'] == 'started') {
        //echo "/";
        return $next($request, $response);
    } else {
        //echo $_SESSION['status'];
        //echo "not logined";
        return $container->views->render($response, 'gate.twig.html');
        exit();
    }
});
