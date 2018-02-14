<?php

namespace Scientometrics\Bin\Middleware;

use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;

class Auth
{
    /**
     * "auth" class
     * authorization prototype
     * @since 0.3.42
     */

    /**
     * 
     * incoming POST prameters:
     * $_POST['login'] - user login
     * $_POST['password'] - user password
     * $_POST['save'] - saving data to cookies (true or false)
     *  
     * session parameters:
     * $_SESSION['login'] - user login
     * $_SESSION['password'] - user password
     * $_SESSION['access'] - user access status
     * $_SESSION['auth'] - auth status
     * 
     */

    /**
     *
     * @var next [type]
     * @var container [type]
     * @var save [boolean]
     * @var user [array]
     * @var auth [string]
     * 
     */
    private $container;
    private $login;
    private $save;
    private $user;
    private $auth;


    public function __construct($container)
    {

        $this->container = $container;

    } // end constructor


    /**
     * checking POST parameters
     *
     * @return Scientometrics\Middleware\Auth
     */
    public function checkPost()
    {

        if (isset($_POST['login'])) $_SESSION['login'] = $_POST['login'];

        if (isset($_POST['password'])) $_SESSION['password'] = $_POST['password'];

        if (isset($_POST['save'])) $this->save = true;

        //print_r($_SESSION);
        
        return $this;

    } // end function


    /**
     * checking cookies and - if success - retrieving session parameters from cookies
     *
     * @return void
     */
    public function checkCookies()
    {
        //print_r($_COOKIE);

        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            $_SESSION['login'] = $_COOKIE['login'];
            $_SESSION['password'] = $_COOKIE['password'];
        }

        return $this;

    } // end function



    /**
     * checking session data
     * 
     * @return Scientometrics\Middleware\Auth
     */
    public function checkSession()
    {
        if ($_SESSION['access'] == null) $_SESSION['access'] = 'guest';

        if (isset($_SESSION['login'])) {
            $this->user['login'] = $_SESSION['login'];  
        } else {
            $this->user['login'] = 'guest';
        }
        if (isset($_SESSION['password'])) {
            $this->user['password'] = $_SESSION['password'];
        }

        //print_r($_SESSION);

        return $this;

    } // end function



    /**
     * getting user data from database and checking
     *
     * @return Scientometrics\Middleware\Auth
     */
    public function resolve() {

        if ($_SESSION['auth'] == 'auth' && isset($_SESSION['access'])) {
            //echo 'return'.PHP_EOL;
            return;
        }

        // getting data for requested login
        $query = "SELECT users.password, users.access FROM users WHERE users.login='".$this->user['login']."'";
        $user = $this->container->pdo->prepare($query);
        $user->execute();
        $user = $user->fetchAll(\PDO::FETCH_ASSOC);

        //print_r($user);
        //print_r($_SESSION);

        // if user found and password correct
        if ($user[0]['password'] != null) {
            if ($user[0]['password'] == $this->user['password']) {

                // if password correct - setting session data
                $_SESSION['auth'] = 'auth';
                $_SESSION['login'] = $this->user['login'];
                $_SESSION['password'] = $user[0]['password'];
                $_SESSION['access'] = $user[0]['access'];

            } else {

                // password incorrect
                Service\Messages::setAlert('Неправильный логин или пароль');
                $_SESSION['auth'] = 'not';
                $_SESSION['login'] = 'guest';
                $_SESSION['access'] = 'guest';
            }
        }

        //print_r($_SESSION);

    } // end function

} // end class
