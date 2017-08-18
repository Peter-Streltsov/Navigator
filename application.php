<?php

use \Classes\Navigator as Navigator;
use \Classes\Settings as Settings;
use \Database\Connection as Connection;

$exectime = microtime(true);

//$_SERVER['REQUEST_URI'] = 'main/index';
$_SERVER['REQUEST_URI'] = 'scientometrics';

require_once 'roots.inc';
require_once AUTOLOAD;
require_once COMPOSER_AUTOLOAD;

new Autoload;

Connection::getInstance();

require_once ROUTES;
require_once CONNECTIONS;

$settings = Settings::getInstance();

$page = new Navigator;

$page->start();

$exectime = round((microtime(true) - $exectime), 3);

Settings::$time = $exectime;