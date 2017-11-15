<?php

use Scientometrics\Bin;
use Scientometrics\Config as Config;


require_once 'roots.inc'; // filesystem constants
require_once VENDOR_AUTOLOAD; // composer autoloader
require_once AUTOLOAD; // custom autoloader

require_once 'bin/application.php'; // application

function __autoload($class) {
    echo $class.PHP_EOL;
    $class = strtolower($class);
    $class = explode('/', $class);
    $classfile = $class[1].DS.$class[2];
    var_dump($classfile);
    require_once ROOT.$classfile;
}

//new Config\Conf();
