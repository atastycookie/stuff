<?php
	$logFile = "path/to/file.txt";
	
	$r = array();
	$r['datetime'] = date('Y-m-d H:i:s');
	$r['ip'] = $_SERVER['REMOTE_ADDR'];
	$r['https'] = $_SERVER["HTTPS"];
	$r['uri'] = $_SERVER['REQUEST_URI'];
	$r['agent'] = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";
	$r['referer'] = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
	$r['query'] = $_SERVER["QUERY_STRING"];
	$r['post'] = file_get_contents("php://input");
	$r['method'] = $_SERVER["REQUEST_METHOD"];
	$r['host'] = $_SERVER["HTTP_HOST"];
	
  if(isset($_GET['logdebug'])) 
  {
  	echo "<pre>";
  	print_r($r);
  	echo "</pre>";
  }
	
	$log = "";
	$log .= "Time : " . $r['datetime'] . "\n";
	$log .= "IP : " . $r['ip'] . "\n";
	$log .= "HTTPS : " . $r['https'] . "\n";
	$log .= "URI : " . $r['uri'] . "\n";
	$log .= "Agent : " . $r['agent'] . "\n";
	$log .= "Referer : " . $r['referer'] . "\n";
	$log .= "Query GET: " . $r['query'] . "\n";
	$log .= "Query POST : " . $r['post'] . "\n";
	$log .= "Method : " . $r['method'] . "\n";
	$log .= "Host : " . $r['host'] . "\n";
	$log .= "--------------------\n";
	
	file_put_contents($logFile, $log, FILE_APPEND);
		
?>
