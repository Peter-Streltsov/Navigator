<?php

namespace Scientometrics\Bin;

use \Scinetometrics\Models as Models;
use Scientometrics\Bin\Middleware as Middleware;

/**
 * custom slim 3 middleware
 */

// generating page data
$application->add(function($request, $response, $next) {
    return $next($request, $response);
});

// authentication
$application->add(function($request, $response, $next) use($container) {

    //unset($_SESSION['status']);

    $auth = new Middleware\Auth($container, $request, $response);
    $auth->checkPost() // checking POST parameters
        ->checkSession() // checking SESSION parameters
        ->resolve(); // getting user data from database

    return $next($request, $response);

});
