<?php

/**
* core prototype
*/

use \Classes\Navigator as Navigator;
use \Classes\Settings as Settings;
use \Database\Connection as Connection;
use \Classes\Application as Application;

$exectime = microtime(true);

//$_SERVER['REQUEST_URI'] = 'main/index';
//$_SERVER['REQUEST_URI'] = 'scientometrics';

require_once 'roots.inc'; //here
require_once AUTOLOAD; //here
require_once COMPOSER_AUTOLOAD; //here

new Autoload; //core

$settings = Settings::getInstance(); //core or bootstrap

Connection::getInstance(); //bootstrap

require_once ROUTES; //core
require_once CONNECTIONS; //bootsrap

$page = new Navigator; //core

new Application(); //bootstrap or here

$page->start(); // core - start - rename to runtime and move to core(?)

$exectime = round((microtime(true) - $exectime), 3);

Settings::$time = $exectime; //here