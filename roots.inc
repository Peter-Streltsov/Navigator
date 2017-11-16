<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__).DS);
define('VENDOR', ROOT.'vendor'.DS);
define('BIN', ROOT.'bin'.DS);
define('CUSTOM_MIDDLEWARE', BIN.'middleware.php');
define('CONTAINERS', BIN.'containers.php');
define('VENDOR_AUTOLOAD', VENDOR.'autoload.php');
define('AUTOLOAD', BIN.'autoload.php');
define('CONFIG', ROOT.'config'.DS);
define('PUBLIC', ROOT.'public'.DS);
