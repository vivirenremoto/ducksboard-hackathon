<?php

require 'config.php';

// update image iphone
$img = 'http://miquelcamps.com/services/ducksboard/img/miquel.png';
$ch = curl_init('https://push.ducksboard.com/values/12592/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// update image langs
$img = 'https://chart.googleapis.com/chart?cht=p&chd=t:8,7&chs=300x150&chl=JavaScript|PHP';
$ch = curl_init('https://push.ducksboard.com/values/12600/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// update image google hire me
$img = 'http://miquelcamps.com/services/ducksboard/img/hireme.png';
$ch = curl_init('https://push.ducksboard.com/values/12604/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": {\"source\": \"$img\"} }");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// designer
$ch = curl_init('https://push.ducksboard.com/values/12594/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored");
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": 0.30}");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);

// developer
$ch = curl_init('https://push.ducksboard.com/values/12598/');
curl_setopt($ch, CURLOPT_USERPWD, API_KEY . ":ignored");
curl_setopt ($ch, CURLOPT_POSTFIELDS, "{\"value\": 0.70}");
curl_setopt ($ch, CURLOPT_POST, 1);
curl_exec ($ch);


curl_close ($ch);