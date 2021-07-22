<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use App\Traits\Utils;

trait EbayService
{
    use Finding;
    use Trading;

    public function ebay_endpoint(Request $request) {
        $hash = hash_init('sha256');

        hash_update($hash, $request->challengeCode);
        hash_update($hash, $verificationToken);
        hash_update($hash, $endpoint);

        $responseHash = hash_final($hash);
        return $responseHash;
    }
}
