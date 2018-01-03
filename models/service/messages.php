<?php

namespace Scientometrics\Models\Service;

class Messages
{
    public static $messages = array();

    private static $instance;

    public function __construct()
    {

    } // end function

    public function setSuccess($message)
    {
        static::$messages[] = "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        return $this;
    } // end function

    public function getData()
    {
        return static::$messages;
    }

    public function setWarning($message)
    {
        static::$messages[] = "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        return $this;
    } // end function

    public function setAlert($message)
    {
        $this->messages[] = "<div class=\"alert alert-alert alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";
        return $this;
    } // end function

    public static function instance()
    {
        if (is_null(static::$instance))
        {
            return static::$instance = new self();
        } else {
            return static::$instance;
        }
    }

} // end class
