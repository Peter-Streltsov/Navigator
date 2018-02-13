<?php

namespace Scientometrics\Bin\Middleware;

use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;

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
        if (isset($_POST['login'])) {
            $_SESSION['login'] = $_POST['login'];
        }

        if (isset($_POST['password'])) {
            $_SESSION['password'] = $_POST['password'];
        }

        if (isset($_POST['save'])) {
            $this->save = true;
        }

        unset($_POST['login']);
        unset($_POST['password']);
        
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

        if (isset($_SESSION['login']) && $_SESSION['password'] != null) {
            $this->user['login'] = $_SESSION['login'];  
        } else {
            $this->user['login'] = 'guest';
        }

        return $this;

    } // end function



    /**
     * getting user data from database and checking
     *
     * @return Scientometrics\Middleware\Auth
     */
    public function checkUser() {

        // getting data for requested login
        $query = "SELECT users.password, users.access FROM users WHERE users.login='".$this->user['login']."'";
        //echo $query;
        $user = $this->container->pdo->prepare($query);
        $user->execute();
        $user = $user->fetchAll(\PDO::FETCH_ASSOC);

        //print_r($user);
        //print_r($_SESSION);

        // if user found and password correct
        if ($user[0]['password'] != null) {
            if ($user[0]['password'] == $_SESSION['password']) {
                // if password correct - setting session data
                echo 'password correct'.PHP_EOL;
                $_SESSION['auth'] = 'auth';
                $_SESSION['login'] = $this->user['login'];
                $_SESSION['password'] = $user[0]['password'];
                $_SESSION['access'] = $user[0]['access'];

            } else {
                // password incorrect
                $_SESSION['auth'] = 'not';
                $_SESSION['login'] = 'guest';
                $_SESSION['access'] = 'guest';
            }
        }

        print_r($_SESSION);

    } // end function

} // end class
