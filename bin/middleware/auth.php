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
     * $_SESSION['status'] - auth status ('started' or 'check')
     * 
     */

    /**
     *
     * @var request [type]
     * @var response [type]
     * @var next [type]
     * @var container [type]
     * @var save [boolean]
     * @var user [array]
     * @var auth [string]
     * 
     */
    private $request;
    private $response;
    private $container;
    private $login;
    private $save;
    private $user;
    private $auth;


    public function __construct($container, $request, $response)
    {

        $this->container = $container;
        $this->request = $request;
        $this->response = $response;

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
        
        return $this;

    } // end function



    /**
     * checking session data
     * 
     * @return Scientometrics\Middleware\Auth
     */
    public function checkSession()
    {
        if ($_SESSION['status'] != 'started') {
            $_SESSION['status'] = 'check';
        }

        if (isset($_SESSION['login']) && $_SESSION['password'] != null) {
            $this->user['login'] = $_SESSION['login'];  
        } else {
            $this->user['login'] = 'guest';
            $this->user['password'] = null;
        }

        return $this;

    } // end function



    /**
     * getting user data from database
     *
     * @return Scientometrics\Middleware\Auth
     */
    public function getUser() {
        $userdata = $this->container->fluent
            ->from('users')
            ->select(null)
            ->select('password', 'access')
            ->where('login', $this->user['login']);
        //print_r($userdata);

        return $this;

    } // end function
    
    

    public function checkUser() {

        if ($this->user['login'] == '') {

        }

        return $this;

    } // end function


    public function verify()
    {
        if ($this->login != $_SESSION['login']) {

        }
        $this->auth = 'notlogged';

    } // end function

} // end class
