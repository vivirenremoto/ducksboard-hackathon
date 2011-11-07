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

// new york
$img = 'http://207.251.86.248/cctv20.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12556/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('new york'));
$ch = curl_init('https://push.ducksboard.com/values/12948/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


// madrid
$img = 'http://www.meteosurfcanarias.com/1-webcams/med/plaza-espana-madrid.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12557/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('madrid'));
$ch = curl_init('https://push.ducksboard.com/values/12949/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// paris
$img = 'http://www.meteosurfcanarias.com/1-webcams/webcam-eiffel-tour.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12558/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('paris'));
$ch = curl_init('https://push.ducksboard.com/values/12950/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// tokyo
$img = 'http://221.255.120.171/axis-cgi/jpg/image.cgi?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12559/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('tokyo'));
$ch = curl_init('https://push.ducksboard.com/values/12951/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


// london
$img = 'http://www.meteosurfcanarias.com/1-webcams/london-oxford-street.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12945/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('london'));
$ch = curl_init('https://push.ducksboard.com/values/12952/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// monaco
$img = 'http://www.montecarloresort.com/images/common/fullsize_montecarlo.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12944/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('monaco'));
$ch = curl_init('https://push.ducksboard.com/values/12953/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// cancun
$img = 'http://www.meteosurfcanarias.com/1-webcams/webcam-cancun-caribbean.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12946/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('cancun'));
$ch = curl_init('https://push.ducksboard.com/values/12955/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// bangkok
$img = 'http://www.bkkok.com/webcam/ccam.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12947/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

extract(getWeather('bangkok'));
$ch = curl_init('https://push.ducksboard.com/values/12958/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\", \"caption\": \"$caption\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


// close
curl_close ($ch);