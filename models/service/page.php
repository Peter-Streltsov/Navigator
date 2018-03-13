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

    /**
     * static array
     * contains generated page blocks
     * 
     * defined keys:
     * ['user']
     * ['access']
     * ['messages']
     * 
     * @static
     * @var array
     */
    public static $data = array(); // page data

    public function __construct()
    {
        static::$data['user'] = $_SESSION['login'];
        static::$data['access'] = $_SESSION['access'];
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
     * setting Bootstrap message
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function message($type = 'info', $message = null): void
    {
        switch ($type) {
            case 'alert':
                static::$data['messages'][] = Bootstrapmessages::alert($message);
            break;
            case 'info':
                static::$data['messages'][] = Bootstrapmessages::info($message);
            break;
            default:
                static::$data['messages'][] = Bootstrapmessages::warning($message);
            break;
        }
    }



    /**
     * Undocumented function
     *
     * @return array
     */
    public static function getPage(): array
    {

        return static::$data;

    } // end function

}
