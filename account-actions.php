<?php
include 'functions.php';


if(array_key_exists('reserve-account', $_POST)) { 
            reserveAccount(); 
        } 
        else if(array_key_exists('login', $_POST)) { 
        	$string = $_POST['email'].$_POST['password'];
            login($string); 
        } else{
        	echo "no action specified";
        }


//reserve account
function reserveAccount(){
$method='post';
// $apiKey='';
$reqHeaders=array(
"Content-Type"=>"application/json",
"Authorization"=>"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
 );
$reqBody  = array(
  "accountReference"=>"abc123",
    "accountName"=> "Test Reserved Account",
    "currencyCode"=>"NGN"
);
$apiEndpoint='https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts';
$method="post";
	apiCall($apiEndpoint, $reqHeaders, $reqBody, $method);
}


//login to get authentication token
function login($string){
$authData=encodeToBase64($string);	
 $apiEndpoint="https://sandbox.monnify.com/api/v1/auth/login";
 $reqHeaders=array("Authorization: Basic ".$authData);
 apiCall($apiEndpoint,$reqHeaders,$reqBody='',$method='post');
}