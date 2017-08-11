<?php

use \Classes\Settings as Settings;

//require_once TRAITS.'xml.php';

class Autoload {

    private $filesystem = array(CLASSES, CONTROLS, MODELS, VIEWS);

    public function __construct() {
        spl_autoload_extensions('.php');
        static::register();
    }

    public static function loadtraits($trait) {
        $filename = TRAITS.$trait.'.php';
        if (is_file($filename)) {
            require_once $filename;
        }
    }

    public static function loadInterfaces($interface) {
        $files = glob(INTERFACES.'*.php');
        foreach ($files as $file) {
            require_once $file;
        }
    }

    public static function loadclass($class) {
        $autoload[] = $class;
        $class = strtolower($class);
        $filesystem = array(CLASSES, CONTROLS, MODELS, VIEWS);
        $class = explode("\\", $class);
        if (count($class) > 1) {
            $class = array_diff($class, array());
        }
        $class = end($class);
        foreach ($filesystem as $directory) {
            $filename = $directory.$class.'.php';
            $settings->log[] = "Trying ".$filename;
            if (is_file($directory.$class.'.php')) {
                $settings->log[] = "Success!";
                include $filename;
                break;
            }
        }
        Settings::$autoload[] = $autoload;
    }

    private static function loadmodels($modelclass) {
        spl_autoload($modelclass);
    }

    private static function register() {
        spl_autoload_register(__NAMESPACE__.'\Autoload::loadclass');
        spl_autoload_register(__NAMESPACE__.'\Autoload::loadtraits');
        spl_autoload_register(__NAMESPACE__.'\Autoload::loadmodels');
        spl_autoload_register(__NAMESPACE__.'\Autoload::loadInterfaces');
    }
}