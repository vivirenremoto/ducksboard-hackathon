<?php

require 'config.php';

// new york
$img = 'http://207.251.86.248/cctv20.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12556/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// madrid
$img = 'http://www.meteosurfcanarias.com/1-webcams/med/plaza-espana-madrid.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12557/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// paris
$img = 'http://www.meteosurfcanarias.com/1-webcams/webcam-eiffel-tour.jpg?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12558/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// tokyo
$img = 'http://221.255.120.171/axis-cgi/jpg/image.cgi?v=' . time();
$ch = curl_init('https://push.ducksboard.com/values/12559/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


// close
curl_close ($ch);