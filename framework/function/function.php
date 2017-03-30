<?php

	function C($name, $method){
		require_once(dirname(dirname(dirname(__FILE__))).'/libs/Controller/'.$name.'Controller.class.php');
		//include_once('/libs/Controller/'.$name.'Controller.class.php');
		eval('$obj = new '.$name.'Controller();$obj->'.$method.'();');
	}

	function M($name){
		require_once(dirname(dirname(dirname(__FILE__))).'/libs/Model/'.$name.'Model.class.php');
		//$testModel = new testModel();
		eval('$obj = new '.$name.'Model();');
		return $obj;
	}

	function V($name){
		echo "V";
		require_once('/libs/View/'.$name.'View.class.php');
		//$testView = new testView();
		eval('$obj = new '.$name.'View();');
		return $obj;
	}

	function ORG($path, $name, $params=array()){
			echo "ORG";
		require_once('libs/ORG/'.$path.$name.'.class.php');
		//eval('$obj = new '.$name.'();');
		$obj = new $name();
		if(!empty($params)){
		foreach($params as $key=>$value){
				//eval('$obj->'.$key.' = \''.$value.'\';');
				$obj->$key = $value;
			}
		}
		return $obj;
	}

	function daddslashes($str){

		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}
?>