<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Types\RepeatableType;
use DTS\eBaySDK\Finding\Types;
use DTS\eBaySDK\Finding\Enums;

use App\Traits\Utils;

trait Finding
{
    use Utils;

    public function find_completed_items(Request $request) {

        $sdk = new Sdk([
            'apiVersion' => config('ebay.compatibilityVersion'),
            'credentials' => config('ebay.production.credentials'),
            // 'sandbox'    => true,
            'Finding'    => [
                'apiVersion' => '1.13.0'
            ]
        ]);
        $service = $sdk->createFinding();

        $_request = new Types\FindCompletedItemsRequest();

        $_request->itemFilter[] = new Types\ItemFilter([
            'name'  => 'Seller',
            'value' => [$request->keyword]
        ]);
        // $_request->itemFilter[] = new Types\ItemFilter([
        //     'name'  => 'SoldItemsOnly',
        //     'value' => ['true']
        // ]);


        $_request->paginationInput = new Types\PaginationInput();
        $_request->paginationInput->entriesPerPage = 50; // result number
        $_request->paginationInput->pageNumber = 1;

        $_request->sortOrder = 'BestMatch';

        $promise = $service->findCompletedItemsAsync($_request);
        $response = $promise->wait();

        return $response;
    }

    public function find_items_advanced(Request $request) {

        $sdk = new Sdk([
            'apiVersion' => config('ebay.compatibilityVersion'),
            'credentials' => config('ebay.production.credentials'),
            // 'sandbox'    => true,
            'Finding'    => [
                'apiVersion' => '1.13.0'
            ]
        ]);
        $service = $sdk->createFinding();

        $_request = new Types\FindItemsAdvancedRequest();

        $_request->itemFilter[] = new Types\ItemFilter([
            'name'  => 'Seller',
            'value' => [$request->userid]
        ]);
        $_request->itemFilter[] = new Types\ItemFilter([
            'name'  => 'SoldListings',
            'value' => ['true']
        ]);


        // $_request->paginationInput = new Types\PaginationInput();
        // $_request->paginationInput->entriesPerPage = 50; // result number
        // $_request->paginationInput->pageNumber = 1;

        $_request->sortOrder = 'BestMatch';

        $promise = $service->findItemsAdvancedAsync($_request);
        $response = $promise->wait();

        return $response;
    }

    public function find_items_by_keywords(Request $request) {

        $sdk = new Sdk([
                        'apiVersion' => config('ebay.compatibilityVersion'),
                        'credentials'=> config('ebay.production.credentials'),
                        // 'sandbox'    => true,
                        'Finding'    => [
                            'apiVersion' => '1.13.0'
                        ]
                    ]);
        $service = $sdk->createFinding();

        $_request = new Types\FindItemsByKeywordsRequest();
        $_request->keywords = $request->keywords;
        $_request->paginationInput = new Types\PaginationInput();
        $_request->paginationInput->entriesPerPage = 50;
        $_request->paginationInput->pageNumber = 1;
        $_request->sortOrder = 'CurrentPriceHighest';

        $promise = $service->findItemsByKeywordsAsync($_request);
        $response = $promise->wait();

        return $response;

    }

    public function find_items_in_ebay_stores(Request $request)
    {

        $sdk = new Sdk([
            'apiVersion' => config('ebay.compatibilityVersion'),
            'credentials' => config('ebay.production.credentials'),
            // 'sandbox'    => true,
            'Finding'    => [
                'apiVersion' => '1.13.0'
            ]
        ]);
        $service = $sdk->createFinding();

        $_request = new Types\FindItemsIneBayStoresRequest();
        $_request->storeName = $request->storeName;

        $_request->paginationInput = new Types\PaginationInput();
        $_request->paginationInput->entriesPerPage = 25;
        $_request->paginationInput->pageNumber = 1;

        $promise = $service->findItemsIneBayStoresAsync($_request);
        $response = $promise->wait();

        return $response;
    }
}
