<?php
function apiCall($apiEndpoint, $reqHeaders, $reqBody,$method){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
if ($method=='post') {
   curl_setopt($ch, CURLOPT_POST,           1 );
}
curl_setopt($ch, CURLOPT_POSTFIELDS,$reqBody); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $reqHeaders); 

$result=curl_exec ($ch);
echo $result;
}

function encodeToBase64($string){
   return base64_encode( $string );
}




