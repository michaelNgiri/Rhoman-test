<?php
//make an api call by passing the required variables
//required vars: apiendpoint, request headers, request body, method
function apiCall($apiEndpoint, $reqHeaders, $reqBody, $method)
{
   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   if ($method == 'post') {
      curl_setopt($ch, CURLOPT_POST,           1);
   } elseif ($method == 'delete()') {
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
   }
   curl_setopt($ch, CURLOPT_POSTFIELDS, $reqBody);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $reqHeaders);
   //var_dump($reqBody);

   $result = curl_exec($ch);
   echo $result;
}

//this function returns a base64 enceded version of a string passed to it
//accepts strings
function encodeToBase64($string)
{
   return base64_encode($string);
}



/**
 * 
 */
class variablesHelper
{

   public function reqHeaders()
   {
      return array(
         "Content-Type" => "application/json",
         "Authorization" => "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
      "
      );
   }

   public function reqBody()
   {
      return array(
         "accountReference" => "abc123",
         "accountName" => "Test Reserved Account",
         "currencyCode" => "NGN"
      );
   }
}
