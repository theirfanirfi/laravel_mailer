<?php

$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v3.0/2103768306321461/picture?type=large&redirect=false');

// set method
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// set headers



// set body
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

// send the request and save response to $response
$response = curl_exec($ch);

// stop if fails
if (!$response) {
  die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}

//echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
//echo 'Response Body: ' . $response . PHP_EOL;
$ld=json_decode($response,true);
$dd=$ld['data'];

//var_dump($dd["url"]);
// close curl resource to free up system resources
curl_close($ch);
//var_dump($dd["url"]);

//$image = 'https://graph.facebook.com/v3.0/2103768306321461/picture?type=large';
$imageData = base64_encode(file_get_contents($dd["url"]));
echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
?>
