<?php

namespace Scientometrics\Bin;

function __autoload($class) {
        echo $class.PHP_EOL;
        $class = strtolower($class);
        $class = explode('/', $class);
        $classfile = $class[1].DS.$class[2];
        require_once ROOT.$classfile;
}
