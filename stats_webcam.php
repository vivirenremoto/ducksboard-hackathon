<?php

require 'config.php';

function getWeather($location){
	$xml = utf8_encode( file_get_contents('http://www.google.com/ig/api?weather=' . urlencode( $location ) ) );
	$xml = simplexml_load_string( $xml );
	
	return array(
		'img' => 'http://google.com' . $xml->weather->current_conditions->icon->attributes()->data,
		'caption' => addslashes(
					  $xml->weather->current_conditions->temp_c->attributes()->data . ' ºC' . ", " . 
					  $xml->weather->current_conditions->humidity->attributes()->data . ", " . 
					  $xml->weather->current_conditions->wind_condition->attributes()->data
				  )
	);
}



$cities = array();
$cities[] = array( 'name' => 'new york', 'id_pic' => 12556, 'id_info' => 12948, 'image' => 'http://207.251.86.248/cctv20.jpg' );
$cities[] = array( 'name' => 'madrid', 'id_pic' => 12557, 'id_info' => 12949, 'image' => 'http://www.meteosurfcanarias.com/1-webcams/med/plaza-espana-madrid.jpg' );
$cities[] = array( 'name' => 'paris', 'id_pic' => 12558, 'id_info' => 12950, 'image' => 'http://www.meteosurfcanarias.com/1-webcams/webcam-eiffel-tour.jpg' );
$cities[] = array( 'name' => 'tokyo', 'id_pic' => 12559, 'id_info' => 12951, 'image' => 'http://221.255.120.171/axis-cgi/jpg/image.cgi' );
$cities[] = array( 'name' => 'london', 'id_pic' => 12945, 'id_info' => 12952, 'image' => 'http://www.meteosurfcanarias.com/1-webcams/london-oxford-street.jpg' );
$cities[] = array( 'name' => 'monaco', 'id_pic' => 12944, 'id_info' => 12953, 'image' => 'http://www.montecarloresort.com/images/common/fullsize_montecarlo.jpg' );
$cities[] = array( 'name' => 'cancun', 'id_pic' => 12946, 'id_info' => 12955, 'image' => 'http://www.meteosurfcanarias.com/1-webcams/webcam-cancun-caribbean.jpg' );
$cities[] = array( 'name' => 'bangkok', 'id_pic' => 12947, 'id_info' => 12958, 'image' => 'http://www.bkkok.com/webcam/ccam.jpg' );



foreach( $cities as $city ){
	$img = $city['image'] . '?v=' . time();
	$ch = curl_init('https://push.ducksboard.com/values/' . $city['id_pic'] . '/');
	curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
	curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_exec ($ch);
	
	extract(getWeather($city['name']));
	$ch = curl_init('https://push.ducksboard.com/values/' . $city['id_info'] . '/');
	curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
	curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_exec ($ch);
}


// close
curl_close ($ch);