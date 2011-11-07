<?php

require 'config.php';

// get twitter info
$url = 'https://api.twitter.com/1/users/lookup.json?screen_name=marianorajoy,conRubalcaba';
$data = file_get_contents( $url );
$json = json_decode( $data );

$rajoy_followers = $json[1]->followers_count;
$rubalcaba_followers = $json[0]->followers_count;
$total = $rajoy_followers + $rubalcaba_followers;
$rajoy_percent = ( (int) ( ( $rajoy_followers * 100 ) / $total ) ) / 100;
$rubalcaba_percent = (100 - ($rajoy_percent * 100 )) / 100;


// followers
$ch = curl_init('https://push.ducksboard.com/values/12418/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rajoy_followers }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

$ch = curl_init('https://push.ducksboard.com/values/12420/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rubalcaba_followers }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


// gauges
$ch = curl_init('https://push.ducksboard.com/values/12435/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rajoy_percent }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


$ch = curl_init('https://push.ducksboard.com/values/12436/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rubalcaba_percent }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


// avatars
/*$img = 'http://miquelcamps.com/services/ducksboard/img/votar_rajoy.png';
$ch = curl_init('https://push.ducksboard.com/values/12434/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

$img = 'http://miquelcamps.com/services/ducksboard/img/votar_rubalcaba.png';
$ch = curl_init('https://push.ducksboard.com/values/12433/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);*/


// days left
if( strtotime('2011-11-21 00:00:00') > time() ){
	$days_left = 20 - date('j');
	$ch = curl_init('https://push.ducksboard.com/values/12443/');
	curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
	curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $days_left }");
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_exec ($ch);
}



curl_close ($ch);