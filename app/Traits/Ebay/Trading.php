<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Trading\Types;

use App\Traits\Utils;
use DateTime;

trait Trading
{
    use Utils;


    public function get_orders(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetOrdersRequestType();
        $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');

        $_request->NumberOfDays = 30;

        $promise = $service->getOrdersAsync($_request);
        $response = $promise->wait();

        return $response;
    }

    public function get_feedback(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
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

    public function get_sessionid(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetSessionIDRequestType();
        $_request->RuName = $request->runame;

        $promise = $service->getSessionIDAsync($_request);
        $response = $promise->wait();

        return $response;

    }

    public function get_store(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetStoreRequestType();
        $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');
        $_request->UserID = $request->userid;
        // $_request->ExportListings = true;

        $promise = $service->getStoreAsync($_request);
        $response = $promise->wait();

        return $response;

    }

    public function get_sellerlist(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
            // 'Trading'       => [
            //     'apiVersion' => '967'
            // ]
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetSellerListRequestType();
        $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');
        $_request->GranularityLevel = 'Coarse';
        $_request->UserID = $request->userid;
        $_request->StartTimeFrom = new DateTime('2021-04-23');
        $_request->StartTimeTo = new DateTime('2021-07-23');
        $_request->Pagination = new Types\PaginationType();
        $_request->Pagination->EntriesPerPage = 5;

        $promise = $service->getSellerListAsync($_request);
        $response = $promise->wait();

        return $response;

    }

    public function get_item_transactions(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
            // 'Trading'       => [
            //     'apiVersion' => '967'
            // ]
        ]);
        $service = $sdk->createTrading();

        $_request = new Types\GetItemTransactionsRequestType();
        $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');
        $_request->IncludeContainingOrder = true;
        $_request->IncludeVariations = true;
        $_request->NumberOfDays = 30;
        $_request->ItemID = '384203104242';

        $promise = $service->getItemTransactionsAsync($_request);
        $response = $promise->wait();

        return $response;

    }
}
