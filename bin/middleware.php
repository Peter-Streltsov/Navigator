<?php

namespace Scientometrics\Bin;

use Scientometrics\Models as Models;
use Scientometrics\Models\Service as Service;
use Scientometrics\Bin\Middleware as Middleware;

/**
 * custom slim 3 middleware
 */

// generating page data
$application->add(function($request, $response, $next) {
    $page = new Service\Page();
    $page::setUserMenu();
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
