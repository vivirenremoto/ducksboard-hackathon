<?php

require 'config.php';

// update image iphone
$img = 'http://farm5.static.flickr.com/4125/cameras/72157624172742253_model_large_f77ca1bae2.jpg';
$ch = curl_init('https://push.ducksboard.com/values/12450/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

curl_close ($ch);