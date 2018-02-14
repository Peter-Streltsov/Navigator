<?php

namespace Scientometrics\Models\Service;

/**
 * class, generating and collecting page data (menu options, authorization status, etc..)
 * @since 0.3.xx
 */

class Page
{
    private $auth; // user authorization status
    public static $data = array(); // page data

    /**
     * contains complete pagedata
     * 
     * @var string
     */
    private $pagedata = array();

    public function __construct()
    {
        static::$data['user'] = $_SESSION['login'];
        static::$data['access'] = $_SESSION['access'];
        $this->getAuthStatus();
        $this->setUserMenu();
        
    }

    /**
     * getting current authorization status
     * 
     * @return string
     */
    private function getAuthStatus()
    {
        //$this->pagedata['auth'] = 'administrator';
        isset($_SESSION['status']['userstatus']) ? static::$data['auth'] = $_SESSION['status']['userstatus'] : static::$data['auth'] = 'not logged in';
    }

    /**
     * forming usermenu
     * 
     * @return string
     */
    public function setUserMenu()
    {

        switch (static::$data['access']) {
            //
            case 'user':
            static::$data['login'] = "
            <div class=\"dropdown\">
            <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\"
            style=\"max-width: 20pc; font-size: 10pt; color: #fff; background-color: #8fabd1; margin-right: 0.5pc; margin-top: 0.5pc;\">".
            static::$data['user']
              ."<span class=\"caret\"></span>
            </button>
            <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
              <li><a href=\"/users/personal/1\"><span class=\"glyphicon glyphicon-user\"> Личный кабинет</span></a></li>
              <li><a href=\"#\"><span class=\"glyphicon glyphicon-comment\">  Сообщение администратору</span>
              </a></li>
              <li role=\"separator\" class=\"divider\"></li>
              <li><a href=\"/users/logout\"><span class=\"glyphicon glyphicon-log-out\">  Выход</span></a></li>
            </ul>
            </div>";
            break;

            //
            case 'administrator':
            static::$data['login'] = "
            <div class=\"dropdown\">
            <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\"
            style=\"max-width: 20pc; font-size: 10pt; color: #fff; background-color: #8fabd1; margin-right: 0.5pc; margin-top: 0.5pc;\">".
            static::$data['user']
              ."<span class=\"caret\"></span>
            </button>
            <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
              <li><a href=\"/users/personal/1\"><span class=\"glyphicon glyphicon-user\"> Личный кабинет</span></a></li>
              <li><a href=\"#\"><span class=\"glyphicon glyphicon-comment\">  Сообщение администратору</span>
              </a></li>
              <li role=\"separator\" class=\"divider\"></li>
              <li><a href=\"/users/logout\"><span class=\"glyphicon glyphicon-log-out\">  Выход</span></a></li>
            </ul>
            </div>";
            break;

            //
            case 'supervisor':
            static::$data['login'] = "
            <div class=\"dropdown\">
            <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\"
            style=\"max-width: 20pc; font-size: 10pt; color: #fff; background-color: #8fabd1; margin-right: 0.5pc; margin-top: 0.5pc;\">".
            static::$data['user']
              ."<span class=\"caret\"></span>
            </button>
            <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
              <li><a href=\"/users/personal/1\"><span class=\"glyphicon glyphicon-user\"> Личный кабинет</span></a></li>
              <li><a href=\"#\"><span class=\"glyphicon glyphicon-comment\">  Сообщение администратору</span>
              </a></li>
              <li role=\"separator\" class=\"divider\"></li>
              <li><a href=\"/users/logout\"><span class=\"glyphicon glyphicon-log-out\">  Выход</span></a></li>
            </ul>
            </div>";
            break;

            //
            default:
            break;
            
        }
        if (!isset($_SESSION['auth'])) {
            
        }
        else {
            static::$data['login'] = "<li><a href=\"/login\" style=\"font-size: 12 pt;\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
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
