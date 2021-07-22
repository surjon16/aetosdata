<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Finding\Types;

use App\Traits\Utils;

trait Finding
{
    use Utils;

    public function find_items_by_keywords(Request $request) {

        $sdk = new Sdk([
                        'apiVersion' => config('ebay.compatibilityVersion'),
                        'credentials'=> config('ebay.sandbox.credentials'),
                        'sandbox'    => true,
                        'Finding'    => [
                            'apiVersion' => '1.13.0'
                        ]
                    ]);
        $service = $sdk->createFinding();

        $request = new Types\FindItemsByKeywordsRequest();
        $request->keywords = 'iphone';
        $request->paginationInput = new Types\PaginationInput();
        $request->paginationInput->entriesPerPage = 25;
        $request->paginationInput->pageNumber = 1;
        $request->sortOrder = 'CurrentPriceHighest';

        $promise = $service->findItemsByKeywordsAsync($request);
        $response = $promise->wait();

        return $response;

    }

}
