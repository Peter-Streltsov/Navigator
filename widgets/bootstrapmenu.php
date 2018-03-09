<?php

namespace Scientometrics\Widgets;

/**
 * 
 * static class
 * contains static methods for generation user menu on Twitter Bootstrap
 * 
 * @since 0.3.64
 * 
 */
class Bootstrapmenu
{

    /**
     * 
     * returns 'user menu' block for unauthorized users
     * 
     * @return string
     */
    public static function guestMenu()
    {

        return "<li><a href=\"/login\" style=\"font-size: 12 pt;\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";

    } // end function



    /**
     * 
     * returns 'user menu' block for 'user' access status
     *
     * @param [string] $username
     * @return string
     */
    public static function userMenu($username)
    {

        return "<div class=\"dropdown\">
            <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" 
            data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\" style=\"max-width: 20pc; 
            font-size: 10pt; color: #fff; background-color: #8fabd1; margin-right: 0.5pc; margin-top: 0.5pc;\">".
            $username
            ."<span class=\"caret\"></span>
            </button>
            <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
              <li><a href=\"/users/personal/1\"><span class=\"glyphicon glyphicon-user\"> Личный кабинет</span></a></li>
              <li><a href=\"#\"><span class=\"glyphicon glyphicon-comment\">  Сообщение администратору</span></a></li>
              <li role=\"separator\" class=\"divider\"></li>
              <li><a href=\"/logout\"><span class=\"glyphicon glyphicon-log-out\">  Выход</span></a></li>
            </ul>
            </div>";

    } // end function

    public static function administratorMenu($username)
    {

        return "<div class=\"dropdown\">
        <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" 
        data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\" style=\"max-width: 20pc; 
        font-size: 10pt; color: #fff; background-color: #8fabd1; margin-right: 0.5pc; margin-top: 0.5pc;\">".
        $username
        ."<span class=\"caret\"></span>
        </button>
        <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
          <li><a href=\"/users/personal/1\"><span class=\"glyphicon glyphicon-user\"> Личный кабинет</span></a></li>
          <li><a href=\"/control\"><span class=\"glyphicon glyphicon-cog\">  Панель управления</span></a></li>
          <li role=\"separator\" class=\"divider\"></li>
          <li><a href=\"/logout\"><span class=\"glyphicon glyphicon-log-out\">  Выход</span></a></li>
        </ul>
        </div>";

    } // end function

    public static function supervisorMenu($username)
    {
        return "<div class=\"dropdown\">
            <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" 
            data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\" style=\"max-width: 20pc; 
            font-size: 10pt; color: #fff; background-color: #8fabd1; margin-right: 0.5pc; margin-top: 0.5pc;\">".
            $username
            ."<span class=\"caret\"></span>
            </button>
            <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
              <li><a href=\"/users/personal/1\"><span class=\"glyphicon glyphicon-user\"> Личный кабинет</span></a></li>
              <li><a href=\"/control\"><span class=\"glyphicon glyphicon-cog\">  Панель управления</span></a></li>
              <li role=\"separator\" class=\"divider\"></li>
              <li><a href=\"/logout\"><span class=\"glyphicon glyphicon-log-out\">  Выход</span></a></li>
            </ul>
            </div>";
    }

} // end class