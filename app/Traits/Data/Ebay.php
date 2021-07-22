<?php

namespace App\Traits\Data;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Finding\Types;

use App\Traits\Utils;

trait Ebay
{
    use Utils;

    public function get_session_id(Request $request) {

        $ru_name = "testuser_surjon16";// config('ebay.sandbox.ruName');

        $_body = '<?xml version="1.0" encoding="utf-8" ?>';
        $_body .= '<GetSessionIDRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $_body .= "<RuName>$ru_name</RuName>";
        $_body .= '</GetSessionIDRequest>';

        $_headers = array(
            'X-EBAY-API-COMPATIBILITY-LEVEL: ' . config('ebay.compatibilityVersion'),
            'X-EBAY-API-DEV-NAME: ' . config('ebay.sandbox.credentials.devId'),
            'X-EBAY-API-APP-NAME: ' . config('ebay.sandbox.credentials.appId'),
            'X-EBAY-API-CERT-NAME: ' . config('ebay.sandbox.credentials.certId'),
            'X-EBAY-API-CALL-NAME: ' . 'GetSessionID',
            'X-EBAY-API-SITEID: ' . config('ebay.siteId'),
        );

        //initialise a CURL session
        $connection = curl_init();
        //set the server we are using (could be Sandbox or Production server)
        curl_setopt($connection, CURLOPT_URL, config('ebay.endpoints.sandbox'));

        //stop CURL from verifying the peer's certificate
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);

        //set the headers using the array of headers
        curl_setopt($connection, CURLOPT_HTTPHEADER, $_headers);

        //set method as POST
        curl_setopt($connection, CURLOPT_POST, 1);

        //set the XML body of the request
        curl_setopt($connection, CURLOPT_POSTFIELDS, $_body);

        //set it to return the transfer as a string from curl_exec
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

        //Send the Request
        $response = curl_exec($connection);

        //print $response;
        $result = simplexml_load_string($response);

        //close the connection
        curl_close($connection);

        return json_encode($result);

    }

    public function get_app_token(Request $request) {

    }

    public function get_user_token(Request $request) {

    }

    public function search_store(Request $request) {

    }

}
