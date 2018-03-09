<?php

namespace Scientometrics\Models\Service;

use Scientometrics\Widgets\Bootstrapmessages;
use Scientometrics\Widgets\Bootstrapmenu;

/**
 * class, generating and collecting page data
 * @since 0.3.xx
 */

class Page
{
    public static $data = array(); // page data

    /**
     * contains complete pagedata
     * 
     * @var string
     * @deprecated version 0.3.63
     */
    private $pagedata = array();

    public function __construct()
    {
        static::$data['user'] = $_SESSION['login'];
        static::$data['access'] = $_SESSION['access'];
        //$this->setUserMenu();
        static::userMenu();
        
    }

    /**
     * forming usermenu
     * 
     * @return string
     */
    public static function userMenu()
    {

        switch (static::$data['access']) {
            //
            case 'user':
            static::$data['login'] = Bootstrapmenu::userMenu(static::$data['user']);
            break;

            //
            case 'administrator':
            static::$data['login'] = Bootstrapmenu::administratorMenu(static::$data['user']);
            break;

            //
            case 'supervisor':
            static::$data['login'] = Bootstrapmenu::supervisorMenu(static::$data['user']);
            break;

            //
            default:
            static::$data['login'] = Bootstrapmenu::guestMenu();
            break;

        }

    }

    /**
     * common page data
     * 
     * @return object
     */
    public function common()
    {
        $this->getAuthStatus();
        $this->setUserMenu();
        return $this;
    }


    /**
     * Undocumented function
     *
     * @return object
     */
    public function extended()
    {
        $this->getAuthStatus();
        $this->userMenu();
        return $this;
    }

    public function getData()
    {
        return static::$data;
    }
}
