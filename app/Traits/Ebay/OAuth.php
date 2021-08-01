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
            'ruName'        => config('ebay.production.ruName'),
            'Authorization' => 'Basic ' . base64_encode(config('ebay.production.credentials.appId').':'.config('ebay.production.credentials.certId'))
        ]);
        $_request = new Types\GetUserTokenRestRequest();
        $_request->code = $code;
        $_request->redirect_uri = 'John_Raymark_De-JohnRaym-aetosd-koptkmst';

        $promise = $service->getUserTokenAsync($_request);
        $response = $promise->wait();

        return $response;
    }
}
