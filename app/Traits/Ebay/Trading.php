<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Trading\Types;

use App\Traits\Utils;

trait Trading
{
    use Utils;

    public function get_store(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            // 'sandbox'       => true,
            'siteId' => config('ebay.siteId')
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetStoreRequestType();
        $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');
        $_request->UserID = $request->userid;

        $promise = $service->getStoreAsync($_request);
        $response = $promise->wait();

        return $response;

    }

    public function get_feedback(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            // 'sandbox'       => true,
            'siteId' => config('ebay.siteId')
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetFeedbackRequestType();
        $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');
        $_request->UserID = $request->userid;

        $promise = $service->getFeedbackAsync($_request);
        $response = $promise->wait();

        return $response;

    }
}
