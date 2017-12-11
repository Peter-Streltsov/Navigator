<?php

namespace Scientometrics\Bin\Middleware;

class Authentication
{
    public function __construct()
    {

    }

    /**
     * @return this
     */
    public function checkStatus()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == true) {
            return;
        } else {
            header('Location');
            exit();
        }
    }
} // end class
