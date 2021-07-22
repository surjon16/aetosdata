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

        $_request = new Types\FindItemsByKeywordsRequest();
        $_request->keywords = $request->keywords;
        $_request->paginationInput = new Types\PaginationInput();
        $_request->paginationInput->entriesPerPage = 25;
        $_request->paginationInput->pageNumber = 1;
        $_request->sortOrder = 'CurrentPriceHighest';

        $promise = $service->findItemsByKeywordsAsync($_request);
        $response = $promise->wait();

        return $response;

    }

}
