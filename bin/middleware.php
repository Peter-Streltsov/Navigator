<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use \Scinetometrics\Models as Models;
use Scientometrics\Bin\Middleware as Middleware;

/**
 * custom slim 3 middleware
 */

//


$application->add(function($request, $response, $next) use($container) {

    //unset($_SESSION['status']);

    $auth = new Middleware\Auth($container, $request, $response);
    $auth->checkPost() // checking POST parameters
        ->checkSession() // checking SESSION parameters
        ->getUser() // getting user data from database
        ->checkUser() // checking user
        ->verify();

    print_r($_SESSION);
    return $next($request, $response);

});
