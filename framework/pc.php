<?php
$currentdir = dirname(__FILE__);
include_once($currentdir.'/include.list.php');

foreach ($paths as $path){
	//echo "<br/>".$currentdir.'/'.$path."<br/>";
	include_once($currentdir.'/'.$path);
}

class PC{
	public static $controller;
	public static $method;
	private static $config;

	private static function init_db(){
		DB::init('mysql', self::$config['dbconfig']);
	}

	private static function init_view(){
		VIEW::init('Smarty', self::$config['viewconfig']);
	}

	private static function init_controller(){
		//echo $_GET['controller'];
		self::$controller = isset($_GET['controller'])?daddslashes($_GET['controller']):'table';
	}

	private static function init_method(){
		//echo $_GET['method'];
		self::$method = isset($_GET['method'])?daddslashes($_GET['method']):'showTableList';
	}

	public static function run($config){
		self::$config = $config;
		self::init_db();
		self::init_view();
		self::init_controller();
		self::init_method();		
		C(self::$controller, self::$method);
	}
}
?>