<?php

/*
* filesystem constants
*/

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(realpath(__FILE__)).DS);
define('DATA', ROOT.'data'.DS);
define('XML', ROOT.'XML'.DS);
define('VENDOR', ROOT.'vendor'.DS);
define('TWIG', VENDOR.'twig'.DS);
define('ENGINE', ROOT.'engine'.DS);
define('CONFIG', ROOT.'config'.DS);
define('CONTROLS', ENGINE.'controls'.DS);
define('CLASSES', ENGINE.'classes'.DS);
define('DATABASE', ENGINE.'database'.DS);
define('INTERFACES', ENGINE.'interfaces'.DS);
define('TRAITS', ENGINE.'traits'.DS);
define('MODELS', ENGINE.'models'.DS);
define('VIEWS', ENGINE.'views'.DS);

/*
*
*/

define('HTML', ROOT.'assets'.DS);
define('LAYOUTS', HTML.'layouts'.DS);
define('TEMPLATES', HTML.'tpl'.DS);
define('BOOTSTRAP', HTML.'bootstrap'.DS);
define('CSS', HTML.'css'.DS);

/*
* autoloader files
*/

define('AUTOLOAD', ENGINE.'autoload.php');
define('COMPOSER_AUTOLOAD', VENDOR.'autoload.php');