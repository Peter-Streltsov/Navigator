<?php

namespace Scientometrics\Bin;

spl_autoload_register( function($classname) {
        //echo $classname.PHP_EOL;
        $classname = strtolower($classname);
        $classname = explode('/', $classname);
        $classfilename = array_pop($classname);
        $filesystem = [MODELS, BIN, CONFIG];
        foreach ($filesystem as $catalog) {
                if(is_file($catalog.$classfilename)) {
                        require_once $catalog.$classfilename;
                }
        }
});
