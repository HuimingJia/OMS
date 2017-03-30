<?php

class VIEW{

	Public static $view;

	public static function init($viewtype, $config){
		self::$view = new $viewtype;


		foreach ($config as $key => $value) {
			self::$view -> $key = $value;
			# code...
		}
	}

	public static function assign($data){	
		foreach ($data as $key => $value) { 
			self::$view-> assign($key, $value);
			# code...
		}

	}

	public static function display($template){
		//echo $template;
		//var_dump(is_readable(dirname(dirname(dirname(dirname(__FILE__)))).'/data/template_c'));
		self::$view-> display($template);
	}
}
?>