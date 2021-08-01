<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Fulfillment\Types;

use App\Traits\Utils;
use DateTime;

trait Fullfillment
{
    use Utils;

    // public function get_orders(Request $request) {

    //     $sdk = new Sdk([
    //         'apiVersion'    => config('ebay.compatibilityVersion'),
    //         'credentials'   => config('ebay.production.credentials'),
    //         'siteId'        => config('ebay.siteId'),
    //         'authorization' => config('ebay.production.authToken'),
    //         // 'sandbox'       => true,
    //     ]);
    //     $service = $sdk->createFulfillment();

    //     $_request = new Types\GetOrdersRestRequest();
    //     $promise = $service->getOrdersAsync($_request);
    //     $response = $promise->wait();

    //     return $response;
    // }

}
