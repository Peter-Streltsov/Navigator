<?php

namespace Scientometrics\Bin\Middleware;

use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;

class Authentication
{
    /**
     * authorization prototype
     * @since 0.3.42
     */

    private $request;
    private $response;
    private $next;
    private $container;
    private $user;
    private $login;
    private $password;
    private $userstatus;

    public function __construct($container, $request, $response, $next)
    {
        $this->user = new Records\Users($container->pdo, $container->fluent);
        $this->container = $container;
        $this->request = $request;
        $this->response = $response;
    }

    private function createUser($class)
    {
        switch ($class) {
            case 'guest':
            return new Users\Guest();
            break;
            case 'user':
            return new Users\User();
            break;
            case 'administrator':
            return new Users\Administrator();
            break;
            default:
            return new Users\Guest();
            break;
        }
    } // end function

    /**
     * checking session and post data
     *
     * @return Scientometrics\Bin\Middleware\Authentication
     */
    public function sessionCheck()
    {
        if (isset($_POST['login'])) {
            $_SESSION['login'] = $_POST['login'];
        }

        isset($_SESSION['login']) ? $this->login = $_SESSION['login'] : $this->login = 'guest';

        if ($_SESSION['status'] == 'check') {

        }
        return $this;

    } // end function

    public function verifyAuthorization()
    {
        $this->sessionCheck();

        isset($_POST['password']) ? $this->password = $_POST['password'] : $this->password = null;

        if ($_SESSION['status'] == 'check') {
            if ($_SESSION['login'] == 'user@somemail.ru') {
                $_SESSION['status'] == 'started';
                print_r($_SESSION);
                echo 'started';
                return $next($request, $response);
            }
        }

        if ($_SESSION['status'] == 'started') {
    
            //return $next($request, $response);
            return $auth->allowed();
    
        } else {
            $_SESSION['status'] = 'check';
    
            return $auth->notAllowed();
            //return $container->views->render($response, 'gate.twig.html');
    
        }
    } // end function

    /**
     * user logged
     * returns next middleware
     *
     */
    public function allowed()
    {
        return $next($this->request, $this->response);
    }

    /**
     * user not logged
     * loads login page
     *
     */
    public function notAllowed()
    {
        return $this->container->views->render($this->response, 'gate.twig.html');
    }

} // end class
