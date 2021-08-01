<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Types\RepeatableType;
use DTS\eBaySDK\Marketing\Types;
use DTS\eBaySDK\Marketing\Enums;

use App\Traits\Utils;

trait Marketing
{
    use Utils;


    public function get_item_sales(Request $request) {

        $sdk = new Sdk([
            'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'siteId'        => config('ebay.siteId'),
            // 'sandbox'       => true,
        ]);
        $service = $sdk->createMarketing();

        // $_request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        // $_request->RequesterCredentials->eBayAuthToken = config('ebay.production.authToken');


        $promise = $service->getOrdersAsync($_request);
        $response = $promise->wait();

        return $response;
    }

}
