<?php

namespace Scientometrics\Widgets;

class BootstrapMessages
{

    /**
     * static class - page messages
     * 
     * @since 0.3.xx
     */

    public static $messages = array();


    /**
     * @return array
     */
    public static function getMessages()
    {
        return static::$messages;
    }


    /**
     * @param $message
     */
    public static function success($message)
    {
        static::$messages[] = "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        //return $this;
    } // end function


    /**
     * @param $message
     */
    public static function warning($message)
    {
        static::$messages[] = "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        //return $this;
    } // end function


    /**
     * @param $message
     */
    public static function alert($message)
    {
        static::$messages[] = "<div class=\"alert alert-alert alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        //return $this;
    } // end function

} // end class
