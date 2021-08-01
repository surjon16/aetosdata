<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\OAuth\Services;
use DTS\eBaySDK\OAuth\Types;
use DTS\eBaySDK\OAuth\Enum;

use App\Traits\Utils;

trait OAuth
{
    use Utils;

    public function get_app_token(Request $request) {

        $service = new Services\OAuthService([
            // 'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'ruName'        => config('ebay.production.ruName'),
            // 'sandbox'       => true,
        ]);

        $promise = $service->getAppTokenAsync();
        $response = $promise->wait();

        return $response;

    }

    public function get_user_token($code) {

        $service = new Services\OAuthService([
            // 'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'ruName'        => config('ebay.production.ruName')
        ]);
        $_request = new Types\GetUserTokenRestRequest();
        $_request->code = $code;

        $promise = $service->getUserTokenAsync($_request);
        $response = $promise->wait();

        return $response;
    }
}
