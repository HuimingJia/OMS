<?php
$config = array(
	'viewconfig' => array(
		'left_delimiter' => '{',
		'right_delimiter' => '}',
		'template_dir' => 'tpl',
		'compile_dir' => dirname(__FILE__).'/data/template_c'),
	'dbconfig' => array(
		'dbhost' => 'localhost',
		'dbuser' => 'root',
		'dbpsw' => '123456',
		'dbname' => 'OMS',
		'dbcharset' => 'utf8')
	);
?>