<?php

$exectime = microtime(true);

//$_SERVER['REQUEST_URI'] = 'main/index';

require_once 'roots.inc';
require_once AUTOLOAD;
require_once COMPOSER_AUTOLOAD;

new Autoload;

$settings = Classes\Settings::getInstance();

$page = new Classes\Navigator;

$page->start();

echo "Current user status: ", $settings->descriptor_userstatus.PHP_EOL;
var_dump(\Classes\Settings::$connection);
print_r($settings->log);
//print_r($settings->settings['userlist']);
$exectime = round((microtime(true) - $exectime), 3);