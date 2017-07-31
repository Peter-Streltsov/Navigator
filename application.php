<?php

$exectime = microtime(true);

//$_SERVER['REQUEST_URI'] = 'main/index';
$_SERVER['REQUEST_URI'] = 'scientometrics/index';

require_once 'roots.inc';
require_once AUTOLOAD;

new Autoload;

$settings = Settings::getInstance();

$settings->status = AccessControl::getStatus();

$page = new Classes\Navigator;

$page->start();

echo "Current user status: ", $settings->status.PHP_EOL;
print_r($settings->log);
print_r($settings->settings['userlist']);
//unset($_SERVER['REQUEST_URI']);
$exectime = round((microtime(true) - $exectime), 3);