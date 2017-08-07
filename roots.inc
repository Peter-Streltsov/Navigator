<?php

/*
* filesystem constants
*/

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(realpath(__FILE__)));
define('DATA', ROOT.DS.'data'.DS);
define('XML', ROOT.DS.'XML'.DS);
define('VENDOR', ROOT.DS.'vendor'.DS);
define('TWIG', VENDOR.'twig'.DS);
define('ENGINE', ROOT.DS.'engine'.DS);
define('CONFIG', ENGINE.DS.'config'.DS);
define('CONFIG_XML', CONFIG.DS.'xml'.DS);
define('CONTROLS', ENGINE.'controls'.DS);
define('CLASSES', ENGINE.'classes'.DS);
define('INTERFACES', ENGINE.'interfaces'.DS);
define('TRAITS', ENGINE.'traits'.DS);
define('MODELS', ENGINE.'models'.DS);
define('VIEWS', ENGINE.'views'.DS);

/*
*
*/

define('HTML', ROOT.DS.'HTML'.DS);
define('LAYOUTS', HTML.'layouts'.DS);
define('TEMPLATES', HTML.'tpl'.DS);
define('BOOTSTRAP', HTML.'bootstrap'.DS);
define('CSS', HTML.'css'.DS);

/*
* autoloader files
*/

define('AUTOLOAD', ENGINE.'autoload.php');
define('COMPOSER_AUTOLOAD', VENDOR.'autoload.php');