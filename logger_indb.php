<?php

	$connect = mysql_connect('localhost','username','password');
	if( $connect === FALSE ) {  die('mysql connection error: '.mysql_error()); } 
	mysql_select_db( 'databasename', $connect );

	$r = array();
	$r['datetime'] = date('Y-m-d H:i:s');
	$r['ip'] = $_SERVER['REMOTE_ADDR'];
	$r['uri'] = $_SERVER['REQUEST_URI'];
	$r['agent'] = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";
	$r['referer'] = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
	$r['query'] = $_SERVER["QUERY_STRING"];
	$r['post'] = file_get_contents("php://input");
	$r['method'] = $_SERVER["REQUEST_METHOD"];
	$r['host'] = $_SERVER["HTTP_HOST"];

	$columns = implode(", ",array_keys($r));
	$escaped_values = array_map('mysql_real_escape_string', array_values($r));
	$values  = implode("', '", $escaped_values);
	
	$sql = "INSERT INTO `version`($columns) VALUES ('$values')";
	mysql_query( $sql, $connect );	

?>
