<?php
class mysql{
/**
 * [report error]
 * @Author   Jia
 * @DateTime 2016-04-25T18:50:51+0800
 * @param    [type]                   $error [description]
 * @return   [type]                          [description]
 */
function err($error){
	die("sorry, your opearation has an error, the reason is:".$error);
}


/**
 * [connect description]
 * @Author   Jia
 * @DateTime 2016-04-25T18:57:29+0800
 * @param    [type]                   $config [$config array for confige array($dbhost,$dbuser,$dbpsw,$dbname,$dbcharset)]
 * @return   [type]                           [description]
 */
function connect($config){
	extract($config);
	if(!($con = mysql_connect($dbhost,$dbuser,$dbpsw))){
		$this->err(mysql_error());
	}

	if(!mysql_select_db($dbname,$con)){
		$this->err(mysql_error());
	}

	mysql_query("set_names ".$dbcharset);

}
/**
 * [query description]
 * @Author   Jia
 * @DateTime 2016-04-25T19:05:18+0800
 * @param    [type]                   $sql [description]
 * @return   [type]                        [description]
 */
function query($sql){
	if(!($query = mysql_query($sql))){
		$this->err($sql."<br/>"/mysql_error());
	}
	else{
		return $query;
	}
}

function create($table,$arr){
	$sql = "CREATE TABLE if not exists like".$table." (";

	foreach ($arr as $key => $value){
			$value = mysql_real_escape_string($value);
			$sql = $sql.$key." ".$value.",";
		}

	$sql = $sql.");";
	echo $sql;
	$this-> query($sql);
	return $this-> query($sql);

}

function checkTable($table){

	$sql = "SHOW TABLES LIKE ".$table;
	$this-> query($sql);
	return $this-> query($sql);
}
/**
 * [findAll description]
 * @Author   Jia
 * @DateTime 2016-04-25T19:09:22+0800
 * @param    [type]                   $query [description]
 * @return   [type]                          [description]
 */
function findAll($query){
	while($rs = mysql_fetch_array($query, MYSQL_ASSOC)){
		$list[]=$rs;
	}
	return isset($list)?$list:"";
}
/**
 * [findOne description]
 * @Author   Jia
 * @DateTime 2016-04-25T19:09:26+0800
 * @param    [type]                   $query [description]
 * @return   [type]                          [description]
 */
function findOne($query){
	$rs = mysql_fetch_array($query, MYSQL_ASSOC);	
	return $rs;
}
/**
 * [findResult description]
 * @Author   Jia
 * @DateTime 2016-04-25T19:11:43+0800
 * @param    [type]                   $query [description]		 
 * @param    integer                  $row   [description]
 * @param    integer                  $field [description]
 * @return   [type]                          [description]
 */
function findResult($query,$row = 0,$field = 0){
	$rs = mysql_result($query, $row, $field);
	return $rs;
}

function insert($table,$arr){
	foreach ($arr as $key => $value) {
		$value = mysql_real_escape_string($value);
		$keyArr[] = "".$key."";
		$valueArr[] = "'".$value."'";
	}

		$keys = implode(",", $keyArr);
		$values = implode(",", $valueArr);
		$sql = "insert into ".$table." (".$keys.") values (".$values.")";
		$this-> query($sql);
		return mysql_insert_id();
}

function update($table, $arr, $where){
	foreach ($arr as $key => $value) {
		$value = mysql_real_escape_string($value);
		$keyAndvalueArr[] = "'".$key."'='".$value."'";

		$keyAndvalues = implode(",",$keyAndvalueArr);
		$sql = "update".$table." set ".$keyAndvalues." where ".$where;
		return $this->query($sql);
		# code...
	}

}

function del($table, $where){
	$sql ="delete from ".$table." where ".$where;
	return $this->query($sql);
}
}

?>