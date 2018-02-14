<?php

namespace Scientometrics\Models\Service;

class Messages
{

    /**
     * static class - contains page messages
     * 
     * @since 0.3.xx
     */

    public static $messages = array();


    public static function getData()
    {
        return static::$messages;
    }

    public static function setSuccess($message)
    {
        static::$messages[] = "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        return $this;
    } // end function

    public static function setWarning($message)
    {
        static::$messages[] = "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        return $this;
    } // end function

    public static function setAlert($message)
    {
        static::$messages[] = "<div class=\"alert alert-alert alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        return $this;
    } // end function

} // end class
