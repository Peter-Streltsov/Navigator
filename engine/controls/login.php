<?php

namespace Controls;

use \Controls\Control as Control;

class Login extends Control {

    /*
    * authorization and login
    */

    public function index() {
        if (isset($_COOKIE['password'])) {
            header(Location, '/');
        } else {
            $this->generate('gate.html');
        }
    }

    public function auth() {
        if (isset($_POST['login'])) {
            $_SESSION['login'] = $_POST['login'];
        }
        if (isset($_POST['password'])) {
            $SESSION['password'] = $_POST['password'];
        }
    }
}