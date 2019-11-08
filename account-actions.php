<?php
include 'functions.php';

//check which button the user clicked and
if(array_key_exists('reserve-account', $_POST)) { 
            reserveAccount(); 
        } 
        else if(array_key_exists('login', $_POST)) { 
        	$string = $_POST['email'].":".$_POST['password'];
            login($string); 
        } else{
        	echo "no action specified";
        }

 

function reserveAccount(){
$reqHeaders=variablesHelper::reqHeaders();
$reqBody=variablesHelper::reqBody();
$method='post';
// $apiKey='';
$apiEndpoint='https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts';
$method="post";
	apiCall($apiEndpoint, $reqHeaders, $reqBody, $method);
}

function deactivateReservedAccount(){
	$apiEndpoint="htts://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts/{accountNumber}";
	$method="delete";
	apiCall($apiEndpoint, $reqHeaders, $reqBody, $method);
}

function getTransactionsStatus(){
	$reqHeaders=variablesHelper::reqHeaders();
    $reqBody=variablesHelper::reqBody();
	$apiEndpoint="https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts/transactions
?accountReference={accountReference}&page=0&size=10";
apiCall($apiEndpoint, $reqHeaders, $reqBody, $method);

}


//login to get authentication token
function login($string){
$authData=encodeToBase64($string);	
 $apiEndpoint="https://sandbox.monnify.com/api/v1/auth/login";
 $reqHeaders=array("Authorization: Basic ZGVtbzpwQDU1dzByZA==");
 //$reqHeaders=array("Authorization: Basic ".$authData);
 apiCall($apiEndpoint,$reqHeaders,$reqBody='',$method='post');
}

