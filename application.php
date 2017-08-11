<?php

use \Classes\Navigator as Navigator;
use \Classes\Settings as Settings;

$exectime = microtime(true);

//$_SERVER['REQUEST_URI'] = 'main/index';
$_SERVER['REQUEST_URI'] = 'scientometrics';

require_once 'roots.inc';
require_once AUTOLOAD;
require_once COMPOSER_AUTOLOAD;

new Autoload;

$settings = Settings::getInstance();

$page = new Navigator;

$page->start();

if (php_sapi_name() === 'cli') {
    echo "Current user status: ", $settings->descriptor_userstatus.PHP_EOL;
    //print_r(Settings::$autoload);
    print_r(Settings::$log);
    }

$exectime = round((microtime(true) - $exectime), 3);

Settings::$time = $exectime;