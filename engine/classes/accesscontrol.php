<?php

namespace Classes;

//Singleton
//Авторизация и определение уровня доступа пользователя

class AccessControl {

	private static $_instance;
	public static $accessdescriptor = 'administrator';
	
	private function __construct() {
		global $settings;
	}
	
	private function __clone() {
	
	}
	
	private function __wakeup() {
	
	}
	
	public static function getStatus() {
		return static::$accessdescriptor;
	}
	
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			return self::$_instance = new self();
		}
	}
}
