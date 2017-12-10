<?php

namespace Scientometrics\Models;

/**
 * class for collecting page data (menus, authorization status, etc..)
 * @since 0.3
 */

class Page
{
    private $auth;

    /**
     * contains complete pagedata
     * @var string
     */
    private $pagedata = array();

    public function __construct()
    {
        $this->getAuthStatus();
        $this->userMenu();
        return $this;
    }

    /**
     * @return string
     */
    private function getAuthStatus()
    {

    }

    /**
     * @return string
     */
    private function userMenu()
    {
        if (!isset($_SESSION['auth'])) {
            $this->pagedata['login'] = "
            <div class=\"dropdown\">
            <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\"
            style=\"color: #fff; background-color: #ccc; margin-right: 0.5pc; margin-top: 0.5pc;\">
              %UserName%
              <span class=\"caret\"></span>
            </button>
            <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
              <li><a href=\"/users/personal/id\">Личный кабинет</a></li>
              <li><a href=\"#\">Сообщение администратору</a></li>
              <li role=\"separator\" class=\"divider\"></li>
              <li><a href=\"#\">Выход</a></li>
            </ul>
          </div>
            ";
        }
        else {
            $this->pagedata['login'] = "<li><a href=\"/login\" style=\"font-size: 12 pt;\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
        }
    }

    public function getData()
    {
        return $this->pagedata;
    }
}
