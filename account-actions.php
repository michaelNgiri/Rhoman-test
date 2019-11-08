<?php
include 'functions.php';

//check which button the user clicked and
if (array_key_exists('reserve-account', $_POST)) {
    getMonnifyFeatures::reserveAccount();
} else if (array_key_exists('login', $_POST)) {
    $string = $_POST['email'] . ":" . $_POST['password'];
    getMonnifyFeatures::login($string);
} elseif (array_key_exists('deallocate-reserved-account', $_POST)) {
    getMonnifyFeatures::deallocateReservedAccount();
} elseif (array_key_exists('get-transaction-status', $_POST)) {
    getMonnifyFeatures::getTransactionsStatus();
} else {
    echo "no action specified";
}



/**
 * 
 */
class getMonnifyFeatures
{
    public function reserveAccount()
    {
        $authorization=$_POST['authorization'];
        $reqHeaders = variablesHelper::reqHeaders($authorization);
        $reqBody = variablesHelper::reqBody();
        $method = 'post';
        // $apiKey='';
        $apiEndpoint = 'https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts';
        $method = "post";
        apiCall($apiEndpoint, $reqHeaders, $reqBody, $method);
    }

    public function deallocateReservedAccount()
    {
        $authorization=$_POST['authorization'];
        $reqHeaders = variablesHelper::reqHeaders($authorization);
        $reqBody = variablesHelper::reqBody();
        $apiEndpoint = "https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts/9900725554";
        $method = "delete";
        apiCall($apiEndpoint, $reqHeaders, $reqBody, $method);
    }

    public function getTransactionsStatus()
    {
        $authorization=$_POST['authorization'];
        $reqHeaders = variablesHelper::reqHeaders($authorization);
        $reqBody = variablesHelper::reqBody();
        $apiEndpoint = "https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts/transactions?accountReference=reference12345&page=0&size=10";
        apiCall($apiEndpoint, $reqHeaders, $reqBody, $method = 'get');
    }

    public //login to get authentication token
    function login($string)
    {
        $authData = encodeToBase64($string);
        $apiEndpoint = "https://sandbox.monnify.com/api/v1/auth/login";
        $reqHeaders = array("Authorization " => "Basic ZGVtbzpwQDU1dzByZA==");
        //$reqHeaders=array("Authorization: Basic ".$authData);
        apiCall($apiEndpoint, $reqHeaders, $reqBody = '', $method = 'post');
    }
}
