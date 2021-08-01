<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Shopping\Types;
use DTS\eBaySDK\Shopping\Enums;

use App\Traits\Utils;

trait Shopping
{
    use Utils;

    public function get_multiple_items(Request $request) {

        $sdk = new Sdk([
            'apiVersion' => config('ebay.compatibilityVersion'),
            'credentials' => config('ebay.production.credentials'),
            // 'sandbox'    => true,
        ]);
        $service = $sdk->createShopping();

        $_request = new Types\GetMultipleItemsRequestType();
        foreach ($request->items as $item)
            $_request->ItemID[] = $item;
        $_request->IncludeSelector = 'Details';

        $promise = $service->getMultipleItemsAsync($_request);
        $response = $promise->wait();

        return $response;
    }
    public function get_single_item(Request $request) {

        $sdk = new Sdk([
            'apiVersion' => config('ebay.compatibilityVersion'),
            'credentials' => config('ebay.production.credentials'),
            // 'sandbox'    => true,
        ]);
        $service = $sdk->createShopping();

        $_request = new Types\GetSingleItemRequestType();
        $_request->ItemID = '384203104242';
        $_request->IncludeSelector = 'Details';

        $promise = $service->getSingleItemAsync($_request);
        $response = $promise->wait();

        return $response;
    }
}
