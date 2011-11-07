<?php

require 'config.php';

/*

top - 22:53:07 up 103 days,  9:54,  1 user,  load average: 0.33, 0.42, 0.32
Tasks: 104 total,   1 running, 101 sleeping,   1 stopped,   1 zombie
Cpu(s):  5.2%us,  0.9%sy,  0.1%ni, 93.6%id,  0.3%wa,  0.0%hi,  0.0%si,  0.0%st
Mem:   2040724k total,  1096912k used,   943812k free,   235752k buffers
Swap:   525532k total,    48272k used,   477260k free,   470456k cached

*/

$data = file_get_contents('data/top.log');

// days
preg_match("/up (.*) days/",$data,$matches);
$days = $matches[1];
$ch = curl_init('https://push.ducksboard.com/values/12726/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $days }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// load average
preg_match("/load average: (.*), (.*), (.*)/",$data,$matches);
$load1 = $matches[1];
$load2 = $matches[2];
$load3 = $matches[3];

$ch = curl_init('https://push.ducksboard.com/values/12727/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $load1 }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

$ch = curl_init('https://push.ducksboard.com/values/12729/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $load2 }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

$ch = curl_init('https://push.ducksboard.com/values/12728/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $load3 }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// tasks
preg_match("/Tasks: (.*) total/",$data,$matches);
$tasks = $matches[1];
$ch = curl_init('https://push.ducksboard.com/values/12730/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $tasks }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// cpu
preg_match("/Cpu\(s\)\: (.*)\%/",$data,$matches);
$cpu = (int)$matches[1] / 100;
$ch = curl_init('https://push.ducksboard.com/values/12733/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $cpu }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// memory
preg_match("/Mem: (.*) total, (.*) used, (.*) free/",$data,$matches);
$total = (int)$matches[1];
$used = (int)$matches[2];
$free = (int)$matches[3];
$memory = ( (int) ( ( $used * 100 ) / $total ) ) / 100;
$ch = curl_init('https://push.ducksboard.com/values/12734/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $memory }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// error log
$log = file_get_contents('data/error.log');
$data = explode("\n",$log);
rsort( $data );

for( $i = 0; $i < 5; $i++ ){
	$value = str_replace(array('"',"'"),'',$data[$i]);
	$time = time();	
	$ch = curl_init('https://push.ducksboard.com/values/12735/');
	curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
	curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"timestamp\": $time, \"value\": {\"title\": \"error message\", \"image\": \"https://dashboard.ducksboard.com/static/img/timeline/red.gif\", \"content\": \"$value\"}}");
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_exec ($ch);
}

// access log
$log = file_get_contents('data/access.log');
$data = explode("\n",$log);
rsort( $data );

for( $i = 0; $i < 5; $i++ ){
	$value = str_replace(array('"',"'"),'',$data[$i]);
	$time = time();	
	$ch = curl_init('https://push.ducksboard.com/values/12748/');
	curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
	curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"timestamp\": $time, \"value\": {\"title\": \"access message\", \"image\": \"https://dashboard.ducksboard.com/static/img/timeline/green.gif\", \"content\": \"$value\"}}");
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_exec ($ch);
}


curl_close ($ch);