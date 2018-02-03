<?php

namespace Scientometrics\Bin;

use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use \Scinetometrics\Models as Models;

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


$application->add(function($request, $response, $next) {
    /**
     * mockup
     */
    $_SESSION['userstatus'] = 'administrator'; // get from schema.users
    $_SESSION['login'] = '%username%@somemail.ru'; // get drom schema.users

    /**
     * 
     */

    isset($_SESSION['login']) ? 
        \Scientometrics\Models\Page::$data['username'] = $_SESSION['login'] : \Scientometrics\Models\Page::$data['username'] = 'Login';
    
    isset($_SESSION['userstatus']) ?
        \Scientometrics\Models\Page::$data['userstatus'] = $_SESSION['userstatus'] : \Scientometrics\Models\Page::$data['userstatus'] = 'guest';
    

    return $next($request, $response);
});


$application->add(function($request, $response, $next) use($container) {
    //unset($_SESSION['status']);
    //$_SESSION['status'] = 'started';
    if ($_SESSION['status'] == 'started') {
        $_SESSION['check'] = 'ok';
        return $next($request, $response);
    } else {
        $_SESSION['status'] = 'started';
        return $container->views->render($response, 'gate.twig.html');
        //return $response->withRedirect($this->router->pathFor('login'));
    }
});
