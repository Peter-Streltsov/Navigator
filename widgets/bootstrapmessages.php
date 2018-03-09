<?php

namespace Scientometrics\Widgets;

/**
 * static class - page messages
 * @since 0.3.xx
 */
class Bootstrapmessages
{


    /**
     * @param string $message
     * @return string
     */
    public static function info($message): string
    {

        return "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";

    } // end function


    /**
     * @param string $message
     * @return string
     */
    public static function warning($message): string
    {

        return "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";

    } // end function


    /**
     * @param string $message
     * @return string
     */
    public static function alert($message): string
    {

        return "<div class=\"alert alert-alert alert-dismissible fade in\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span></button>".$message."</div>";

    } // end function

} // end class
