<?php

namespace Scientometrics\Bin;

use Scientometrics\Models as Models;
use Scientometrics\Models\Service as Service;
use Scientometrics\Bin\Middleware\Auth;

/**
 * custom slim 3 middleware
 */



/**
 * generating basic page blocks
 *
 * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
 * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
 * @param  callable                                 $next     Next middleware
 *
 * @return \Psr\Http\Message\ResponseInterface
 */
$application->add(function($request, $response, $next) {
    new Service\Page(); // initialising menu after authentication
    switch ($_SESSION['access']) {
        case 'guest':
        Service\Page::message('warning', 'Пользователь не авторизован');
        break;
        default:
        Service\Page::message('warning', 'Вы авторизованы в системе, текущий статус - <b>'.$_SESSION['access'].'</b>');
        break;
    }
    return $next($request, $response);
});



/**
 * session data and authentication
 *
 * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
 * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
 * @param  callable                                 $next     Next middleware
 *
 * @return \Psr\Http\Message\ResponseInterface
 */
$application->add(function($request, $response, $next) use($container) {

    //unset($_SESSION['status']);

    $auth = new Auth($container, $request, $response);
    $auth->checkPost() // checking POST parameters
        ->checkSession() // checking SESSION parameters
        ->resolve(); // getting user data from database

    return $next($request, $response);

});
