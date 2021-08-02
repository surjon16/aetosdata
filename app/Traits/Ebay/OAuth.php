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
            'credentials'   => config('ebay.sandbox.credentials'),
            'ruName'        => config('ebay.sandbox.ruName'),
            'Authorization' => 'Basic ' . base64_encode(config('ebay.sandbox.credentials.appId').':'.config('ebay.sandbox.credentials.certId'))
        ]);
        $_request = new Types\GetUserTokenRestRequest();
        $_request->code = $code;
        $_request->redirect_uri = config('ebay.sandbox.ruName');

        $promise = $service->getUserTokenAsync($_request);
        $response = $promise->wait();

        return $response;
    }

    public function get_refresh_token(Request $request) {

        $service = new Services\OAuthService([
            // 'apiVersion'    => config('ebay.compatibilityVersion'),
            'credentials'   => config('ebay.production.credentials'),
            'ruName'        => config('ebay.production.ruName'),
            'Authorization' => 'Basic ' . base64_encode(config('ebay.production.credentials.appId').':'.config('ebay.production.credentials.certId'))
        ]);

        $_request = new Types\RefreshUserTokenRestRequest();
        $_request->refresh_token = 'v^1.1#i^1#r^1#p^3#f^0#I^3#t^Ul4xMF83OjExMUI5OEExQUI1OTAzMEEyOTcxQzk0MUUzNkE2QTJGXzFfMSNFXjI2MA==';
        $_request->scope =
            [
                'https://api.ebay.com/oauth/api_scope',
                'https://api.ebay.com/oauth/api_scope/sell.marketing.readonly',
                'https://api.ebay.com/oauth/api_scope/sell.marketing',
                'https://api.ebay.com/oauth/api_scope/sell.inventory.readonly',
                'https://api.ebay.com/oauth/api_scope/sell.inventory',
                'https://api.ebay.com/oauth/api_scope/sell.account.readonly',
                'https://api.ebay.com/oauth/api_scope/sell.account',
                'https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly',
                'https://api.ebay.com/oauth/api_scope/sell.fulfillment',
                'https://api.ebay.com/oauth/api_scope/sell.analytics.readonly',
                'https://api.ebay.com/oauth/api_scope/sell.finances',
                'https://api.ebay.com/oauth/api_scope/sell.payment.dispute',
                'https://api.ebay.com/oauth/api_scope/commerce.identity.readonly',
                'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription',
                'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription.readonly',
                // 'https://api.ebay.com/oauth/api_scope/buy.marketplace.insights'
            ];

        $promise = $service->refreshUserTokenAsync($_request);
        $response = $promise->wait();

        return $response;
    }
}
