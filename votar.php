<?php

require 'config.php';

// get info
$rajoy = file_get_contents( 'data/rajoy' );
$rubalcaba = file_get_contents( 'data/rubalcaba' );
$value = isset( $_GET['value'] ) ? $_GET['value'] : false;

// sum value
if( $value == 'rajoy' ){
	$rajoy++;
	
	$fp = fopen('data/rajoy', 'w');
	fwrite($fp, $rajoy);
	fclose($fp);

}else if( $value == 'rubalcaba' ){
	$rubalcaba++;
	
	$fp = fopen('data/rubalcaba', 'w');
	fwrite($fp, $rubalcaba);
	fclose($fp);
	
}

// calc percentage
$total = $rajoy + $rubalcaba;
$rajoy_percent = $rajoy ? (( (int) ( ( $rajoy * 100 ) / $total ) ) / 100 ) : 0;
$rubalcaba_percent = $rubalcaba ? (( (int) ( ( $rubalcaba * 100 ) / $total ) ) / 100 ) : 0;


// gauges
$ch = curl_init('https://push.ducksboard.com/values/12452/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rajoy_percent }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec ($ch);

$ch = curl_init('https://push.ducksboard.com/values/12453/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rubalcaba_percent }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec ($ch);

// numbers
$ch = curl_init('https://push.ducksboard.com/values/12454/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rajoy }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec ($ch);

$ch = curl_init('https://push.ducksboard.com/values/12455/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": $rubalcaba }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec ($ch);

curl_close ($ch);


echo '<h1>Gracias por votar</h1>';